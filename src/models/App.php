<?php

/**
 * Fernico - Ridiculously lite PHP framework
 *
 * @author Areeb Majeed, Volcrado Holdings
 * @package Fernico
 * @copyright 2017 - Volcrado Holdings Limited
 * @license https://opensource.org/licenses/MIT MIT License
 * @link https://volcrado.com/
 *
 */

if (!defined('FERNICO')) {
    fernico_destroy();
}

class App {

    static $data = array();

    static function mysqlQueryFetchAssoc($stmt, $field) {

        global $fernico_db;

        return $fernico_db->query($stmt)->fetch_assoc()[$field];

    }

    static function sendFaucetPay($user_id = 0, $amount = 0.00000000, $referral_payment = false) {

        global $fernico_db;

        $address = ($fernico_db->query("SELECT address FROM users WHERE user_id = {$user_id}"))->fetch_assoc()['address'];

        $status = 0;

        $resp = json_decode(fernico_post("https://faucetpay.io/api/v1/send", array(
            "api_key" => App::loadSiteVar('faucetpay_api_key'),
            "to" => $address,
            "amount" => ($amount * 100000000),
            "currency" => App::loadSiteVar('coin_abbreviation'),
            "referral" => $referral_payment
        )), true);

        if ($resp['status'] == 200) {
            $status = 1;
        }

        if ($status == 1) {

            $stmt = $fernico_db->stmt_init();
            $stmt->prepare("INSERT INTO withdrawals (user_id, address, amount, status) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isdi", $user_id, $address, $amount, $status);
            $stmt->execute();
            $stmt->close();

            return $resp;

        } else {

            $status = 0;

            $stmt = $fernico_db->stmt_init();
            $stmt->prepare("INSERT INTO withdrawals (user_id, address, amount, status) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isdi", $user_id, $address, $amount, $status);
            $stmt->execute();
            $stmt->close();

            return $resp;

        }

    }

    static function getCaptcha() {

        $whichCaptcha = App::loadSiteVar('captcha_used');

        if ($whichCaptcha == 1) {

            return "<div id='captcha'></div>
                    <script>
                    var onloadCallback = function() {
                    grecaptcha.render('captcha', {
                    'sitekey': '" . App::loadSiteVar('site_key') . "',
                    'hl': 'en-GB'
                    });
                    };
                    </script>                        
                    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>";

        } elseif ($whichCaptcha == 2) {

            return "<script src='https://verifypow.com/lib/captcha.js' async></script>
            	<div class='CRLT-captcha' data-hashes='" . App::loadSiteVar('ch_target_hashes') . "' data-key='" . App::loadSiteVar('site_key') . "''>
                    <em>Loading PoW Captcha...
                    <br>
                    If it doesn't load, please disable AdBlocker!</em>
                </div>";

        } elseif ($whichCaptcha == 3) {

            return "<div id='captcha' class='h-captcha' data-sitekey='" . App::loadSiteVar('site_key') . "'></div>                  
                    <script src='https://hcaptcha.com/1/api.js' async defer></script>";

        }

    }

    static function value_gen($min, $max) {

        return random_int($min, $max - 1) + (random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX);

    }

    static function userLoggedIn() {

        if (!empty($_SESSION['user_name']) && ($_SESSION['user_logged_in'] == 1)) {

            return true;

        } else {

            return false;

        }

    }

    static function vomitLoginPageByRedirection($auth) {

        if (!$auth->UserLoggedIn()) {

            header("Location: " . fernico_getAbsURL() . "account/login/not-logged-in");
            fernico_destroy();

        }

    }

    static function beautifyTime($time = 0) {

        $currentTime = time();
        $difference = abs($currentTime - $time);

        if ($difference < 60) {
            return $difference . "s ago";
        }

        if ($difference >= 60 && $difference < 3600) {
            return round($difference / 60) . "m ago";
        }

        if ($difference >= 3600 && $difference < 86400) {
            return round($difference / 3600) . "h ago";
        }

        if ($difference >= 86400 && $difference < 2629743) {
            return round($difference / 86400) . "d ago";
        }

        if ($difference >= 2629743 && $difference < 31556926) {
            return round($difference / 2629743) . "mo ago";
        }

        return round($difference / 31556926) . "y ago";

    }

    static function getAd($location = "") {


    }

    static function strposa($haystack, $needles = array(), $offset = 0) {
        $chr = array();
        foreach ($needles as $needle) {
            $res = strpos($haystack, $needle, $offset);
            if ($res !== false) {
                return true;
            }
        }
        if (empty($chr)) {
            return false;
        }
    }

    static function generateDate($syntax, $change) {
        return date($syntax, strtotime($change));
    }

    static function shortest($url = "") {

        $data = array(
            'urlToShorten' => $url
        );

        $fields_string = '';

        foreach ($data as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }

        rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.shorte.st/v1/data/url");
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_STDERR, fopen('php://stderr', 'w'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 600);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('public-api-token: ' . App::loadSiteVar('shortest_api_token'), 'X-HTTP-Method-Override: PUT'));
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $result = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if ($result['status'] == 'ok') {

            return $result['shortenedUrl'];

        }

    }

    static function verifyCaptcha() {

        $whichCaptcha = App::loadSiteVar('captcha_used');
        $secretKey = App::loadSiteVar('secret_key');

        if ($whichCaptcha == 1) {

            $response = fernico_get("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . Request::POST('g-recaptcha-response'));
            $response = json_decode($response, true);

            if ($response["success"] === true) {

                return true;

            } else {

                return false;

            }

        } elseif ($whichCaptcha == 2) {

            $response = fernico_post("https://api.crypto-loot.org/token/verify", [
                'token' => Request::POST('CRLT-captcha-token'),
                'hashes' => App::loadSiteVar('ch_target_hashes'),
                'secret' => $secretKey
            ]);

            $response = json_decode($response, true);

            if ($response["success"] === true) {

                return true;

            } else {

                return false;

            }

        } elseif ($whichCaptcha == 3) {

            $response = fernico_post("https://hcaptcha.com/siteverify", [
                'secret' => $secretKey,
                'response' => Request::POST('h-captcha-response')
            ]);

            $response = json_decode($response, true);

            if ($response["success"] === true) {

                return true;

            } else {

                return false;

            }

        } else {

            return true;

        }

    }

    static function random_float($min, $max) {
        return ($min + lcg_value() * (abs($max - $min)));
    }

    static function makeLink($path = "", $template = false) {

        if ($template == true) {
            return fernico_getAbsURL() . Config::fetch('TEMPLATE_DIR') . "/" . rtrim($path, "/");
        } else {
            return fernico_getAbsURL() . rtrim($path, "/");
        }

    }

    static function showAd($type) {

        global $fernico_db;

        $f = $fernico_db->query("SELECT code FROM ads WHERE type = {$type} ORDER BY RAND() LIMIT 1");

        if ($f->num_rows > 0.99) {

            return ($f->fetch_assoc())['code'];

        } else {

            return '';

        }

    }

    static function homeLink() {

        return fernico_getAbsURL();

    }

    static function loadSiteVar($variable) {

        global $fernico_db;

        $configData = self::$data;

        if (isset($configData[$variable])) {

            return $configData[$variable];

        } else {

            $stmt = $fernico_db->stmt_init();
            $stmt->prepare("SELECT value FROM config WHERE parameter = ?");
            $stmt->bind_param("s", $variable);
            $stmt->execute();
            $c = $stmt->get_result();
            $rows = $c->num_rows;
            $r = $c->fetch_assoc();
            $stmt->close();

            if ($rows > 0) {
                self::$data[$variable] = $r['value'];
                return $r['value'];
            }

            return '';

        }

    }

    static function destroyAdminSession() {

        global $fernico_db;

        $sessionTime = 60 * 60 * 24 * Config::fetch('SESSION_DAYS');
        $token = bin2hex(openssl_random_pseudo_bytes(64));

        $fernico_db->query("UPDATE admin_details SET token = '{$token}' WHERE user_name = '{$_SESSION['admin_user_name']}'");
        $_SESSION = array();

        setcookie('admin_token', "", time() - $sessionTime * 2, "/", Config::fetch('COOKIE_DOMAIN'));

    }

    static function isAdmin() {

        global $fernico_db;

        $token = Request::COOKIE('admin_token', true);
        $sessionTime = 60 * 60 * 24 * Config::fetch('SESSION_DAYS');

        $stmt = $fernico_db->stmt_init();
        $stmt->prepare("SELECT COUNT(id) as count, user_name FROM admin_details WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $data = $stmt->get_result();
        $stmt->close();
        $user = $data->fetch_assoc();

        if ($user['count'] > 0.99) {
            $_SESSION['admin_user_name'] = $user['user_name'];
            return true;
        }

        setcookie('admin_token', "", time() - $sessionTime * 2, "/", Config::fetch('COOKIE_DOMAIN'));
        return false;

    }

    static function setAdminRedirections() {

        if (self::isAdmin() == false) {
            header("Location: " . fernico_getAbsURL() . "admin/login");
            fernico_destroy();
        }

    }

    static function footerText() {

        $devText = ['Developed', 'Designed', 'Crafted', 'Made', 'Constructed', 'Created', 'Forged', 'Powered'];
        shuffle($devText);

        return $devText[0];

    }

    static function generatePasswordHash($input) {

        for ($x = 0; $x < 100; $x++) {
            $input = hash('sha256', $input);
        }

        return hash('sha512', $input);

    }

    static function mysqlQuery($query) {

        global $fernico_db;

        return $fernico_db->query($query);

    }

    static function grabNumericValue($string) {

        return intval(preg_replace('/[^0-9]+/', '', $string), 10);

    }

    static function contactFormSubmit() {

        $name = Request::POST('name', true);
        $email_address = Request::POST('email_address', true);
        $message = Request::POST('message', true);

        if (strlen($name) < 3) {

            return "The name you entered is too short.";

        } elseif ($email_address == "" || !filter_var($email_address, FILTER_VALIDATE_EMAIL)) {

            return "You have entered an invalid email address";

        } elseif (strlen($message) < 10) {

            return "The Message you entered is too short.";

        } else {

            $country = fernico_countryCode();
            $message = nl2br($message);

            $subject = $name . " has left a message at the contact form";
            $body = "Hello!
                    <br>
                    <br>            
                    <b>Name:</b> " . $name . "
                    <br>
                    <b>Username:</b> " . $_SESSION['user_name'] . "
                    <br>
                    <b>Email Address:</b> " . $email_address . "
                    <br>
                    <b>IP Address:</b> " . fernico_getIPAddress() . "
                    <br>
                    <b>Country:</b> " . $country . "
                    <br>
                    <br>
                    <br>
                    {$message}";

            $mail = new PHPMailer();

            if (Config::fetch('USE_SMTP')) {
                $mail->IsSMTP();
                $mail->SMTPAuth = Config::fetch('SMTP_AUTH');
                if (Config::fetch('EMAIL_SMTP_ENCRYPTION') != "" || Config::fetch('EMAIL_SMTP_ENCRYPTION') != null) {
                    $mail->SMTPSecure = Config::fetch('EMAIL_SMTP_ENCRYPTION');
                }
                $mail->Host = Config::fetch('EMAIL_SMTP_HOST');
                $mail->Username = Config::fetch('EMAIL_SMTP_USERNAME');
                $mail->Password = Config::fetch('EMAIL_SMTP_PASSWORD');
                $mail->Port = Config::fetch('EMAIL_SMTP_PORT');
            } else {
                $mail->IsMail();
            }

            $mail->AddReplyTo($email_address, $name);
            $mail->SetFrom(self::loadSiteVar('no_reply_email_address'), self::loadSiteVar('website_name'));
            $mail->Subject = $subject;
            $mail->SMTPDebug = false;
            $mail->do_debug = 0;
            $mail->MsgHTML($body);
            $mail->AddAddress(self::loadSiteVar('contact_email_address'));
            $mail->Send();
            unset($mail);

            return "We've successfully received your message. We'll be in touch very soon.";

        }

    }

    static function encryptData($data, $key) {

        return openssl_encrypt($data, "AES-256-ECB", $key);

    }

    static function decryptData($data, $key) {

        return openssl_decrypt($data, "AES-256-ECB", $key);

    }

    static function handleParticipation($rID = 0) {

        global $fernico_db;

        $address = Request::POST('address', true);

        $stmt = $fernico_db->stmt_init();
        $stmt->prepare("SELECT payment_address,paid FROM participants WHERE round_id = ? AND user_address = ?");
        $stmt->bind_param("is", $rID, $address);
        $stmt->execute();
        $data = $stmt->get_result();
        $stmt->close();
        $dataAssoc = $data->fetch_assoc();

        if ($address == "" || strlen($address) < 4) {

            return 'You have entered an invalid address. Please try again with a valid address to participate in our lottery.';

        } elseif ($data->num_rows > 0.99 && $dataAssoc['paid'] == 1) {

            return 'You have already participated in this raffle. Please wait for the other round.';

        } else {

            if ($data->num_rows > 0.99 && $dataAssoc['paid'] == 0) {

                $payment_address = $dataAssoc['payment_address'];
                $payment_amount = App::loadSiteVar('participation_cost');

            } else {

                $request = self::CoinPayments_Client("get_callback_address",
                    array("currency" => strtoupper(App::loadSiteVar('coin_abbreviation')), "ipn_url" => fernico_getAbsURL() . "page/ipn?address=" . $address . "&round=" . $rID));

                if ($request['error'] == "ok") {

                    $payment_amount = App::loadSiteVar('participation_cost');
                    $payment_address = $request['result']['address'];
                    $zero = 0;

                    $stmt = $fernico_db->stmt_init();
                    $stmt->prepare("INSERT INTO participants (round_id, user_address, payment_address, payment_amount, paid) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("issdi", $rID, $address, $payment_address, $payment_amount, $zero);
                    $stmt->execute();
                    $stmt->close();

                } else {

                    return 'We are currently experiencing some technical issues while generating your payment address. Please contact the site administrator.';

                }

            }

            return ['payment_address' => $payment_address, 'payment_amount' => $payment_amount];

        }

    }

    static function CoinPayments_Client($cmd, $req = array()) {

        $public_key = self::loadSiteVar("CoinPayments_API_Key");
        $private_key = self::loadSiteVar("CoinPayments_API_Secret");

        $req['version'] = 1;
        $req['cmd'] = $cmd;
        $req['key'] = $public_key;
        $req['format'] = 'json';

        $post_data = http_build_query($req, '', '&');

        $hmac = hash_hmac('sha512', $post_data, $private_key);

        static $ch = null;
        if ($ch === null) {
            $ch = curl_init('https://www.coinpayments.net/api.php');
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: ' . $hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        // Execute the call and close cURL handle
        $data = curl_exec($ch);
        // Parse and return data if successful.
        if ($data !== false) {
            if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
                // We are on 32-bit PHP, so use the bigint as string option. If you are using any API calls with Satoshis it is highly NOT recommended to use 32-bit PHP
                $dec = json_decode($data, true, 512, JSON_BIGINT_AS_STRING);
            } else {
                $dec = json_decode($data, true);
            }
            if ($dec !== null && count($dec)) {
                return $dec;
            } else {
                // If you are using PHP 5.5.0 or higher you can use json_last_error_msg() for a better error message
                return array('error' => 'Unable to parse JSON result (' . json_last_error() . ')');
            }
        } else {
            return array('error' => 'cURL error: ' . curl_error($ch));
        }
    }

}