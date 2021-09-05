<?php

define("FERNICO_PATH", str_replace("/resources/Installer", "", __DIR__));
define("FERNICO", true);

require_once(FERNICO_PATH . '/config/config.php');
require_once('functions.php');

define("SITE_URL", getURL());

if (defined("SCRIPT_INSTALLED")) {

    rrmdir(FERNICO_PATH . "/resources/Installer");
    header("Location: " . SITE_URL);
    exit();

} else {

    $pageName = "Script Installer";

    $php_version = PHP_VERSION;
    $status = 1;

    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        $php_version_status = '<span style="color:red;">Incompatible</span>';
        $status = 0;
    } elseif (version_compare(PHP_VERSION, '5.5.0', '<')) {
        $php_version_status = '<span style="color:orange;">Compatible</span>';
    } else {
        $php_version_status = '<span style="color:green;">OK</span>';
    }

    $filename = FERNICO_PATH . '/config';

    if (is_writable($filename)) {
        $writable = '<span style="color:green;">Writable</span>';
    } else {
        $writable = '<span style="color:red;">Insufficient Permission</span>';
        $status = 0;
    }

    $filename = FERNICO_PATH . '/resources';

    if (is_writable($filename)) {
        $writable2 = '<span style="color:green;">Writable</span>';
    } else {
        $writable2 = '<span style="color:red;">Insufficient Permission</span>';
        $status = 0;
    }

    $filename = FERNICO_PATH . '/storage';

    if (is_writable($filename)) {
        $writable3 = '<span style="color:green;">Writable</span>';
    } else {
        $writable3 = '<span style="color:red;">Insufficient Permission</span>';
        $status = 0;
    }

    if (function_exists('mb_strtolower')) {
        $mbstring = '<span style="color:green;">Installed</span>';
    } else {
        $mbstring = '<span style="color:red;">Not Installed</span>';
        $status = 0;
    }

    if (function_exists('curl_exec')) {
        $curl = '<span style="color:green;">Installed</span>';
    } else {
        $curl = '<span style="color:red;">Not Installed</span>';
        $status = 0;
    }

    if (function_exists('mysqli_stmt_get_result')) {
        $mysqlnd = '<span style="color:green;">Installed</span>';
    } else {
        $mysqlnd = '<span style="color:red;">Not Installed</span>';
        $status = 0;
    }

    vomitHeader();

    ?>

    <div id="requirements">

    <span style="font-size:135%;"><b>PHP Version</b> &mdash; <?php echo $php_version; ?> &mdash; <b><?php echo $php_version_status; ?></b></span>
    <br>
    <span style="font-size:135%;"><b>Write Permission #1</b> &mdash; config &mdash; <b><?php echo $writable; ?></b></span>
    <br>
    <span style="font-size:135%;"><b>Write Permission #2</b> &mdash; resources &mdash; <b><?php echo $writable2; ?></b></span>
    <br>
    <span style="font-size:135%;"><b>Write Permission #3</b> &mdash; storage &mdash; <b><?php echo $writable3; ?></b></span>
    <br>
    <span style="font-size:135%;"><b>mb_string</b> &mdash; Availability &mdash; <b><?php echo $mbstring; ?></b></span>
    <br>
    <span style="font-size:135%;"><b>Curl (PHP)</b> &mdash; Availability &mdash; <b><?php echo $curl; ?></b></span>
    <br>
    <span style="font-size:135%;"><b>MySQL Native Driver</b> &mdash; Availability &mdash; <b><?php echo $mysqlnd; ?></b></span>

    <br>
    <br>

    <?php if ($status == 0) { ?>

        <p style="font-size:125%;"><b>Looks like one or more things required for the script to function properly are not available. Please use the above information to advance.</b></p>

    <?php } else { ?>

        <?php

        $scheme = "http";

        if (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') {
            $scheme = "https";
        }

        $website_url_prepared = cleanInput(SITE_URL);
        $domain_prepared = cleanInput($_SERVER['HTTP_HOST']);

        if (isset($_POST['submit'])) {

            $domain = cleanInput($_POST['domain']);
            $contact_email = cleanInput($_POST['contact_email']);

            $db_host = cleanInput($_POST['db_host']);
            $db_user = cleanInput($_POST['db_user']);
            $db_pass = cleanInput($_POST['db_pass']);
            $db_name = cleanInput($_POST['db_name']);

            $user_name = cleanInput($_POST['user_name']);
            $password = cleanInput($_POST['password']);

            if (!is_valid_domain_name($domain)) {

                echo '<div class="alert alert-danger">
                        The <b>Website Domain</b> is not valid.
                        </div>';

            } elseif (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {

                echo '<div class="alert alert-danger">
                    The <b>Contact Email</b> is not a valid email.
                    </div>';

            } elseif ($db_host == "") {

                echo '<div class="alert alert-danger">
                    The <b>DB Host</b> is not valid.
                    </div>';

            } elseif ($db_user == "") {

                echo '<div class="alert alert-danger">
                        The <b>DB User</b> is not valid.
                        </div>';

            } elseif ($db_pass == "") {

                echo '<div class="alert alert-danger">
                    The <b>DB Pass</b> is not valid.
                    </div>';

            } elseif ($db_name == "") {

                echo '<div class="alert alert-danger">
                        The <b>DB Name</b> is not valid.
                        </div>';

            } elseif ($user_name == "") {

                echo '<div class="alert alert-danger">
                        The <b>Username</b> is not valid.
                        </div>';

            } elseif (strlen($user_name) > 16) {

                echo '<div class="alert alert-danger">
                    The <b>Username</b> length is limited to 16 characters.
                    </div>';

            } elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user_name)) {

                echo '<div class="alert alert-danger">
                The <b>Username</b> cannot contain special characters.
                </div>';

            } elseif ($password == "") {

                echo '<div class="alert alert-danger">
                The <b>Password</b> has been left blank.
                </div>';

            } else {

                $con = mysqli_connect($db_host, $db_user, $db_pass);

                if (!$con) {

                    echo '<div class="alert alert-danger">
                        The <b>Database</b> connection details are not valid.
                        </div>';

                } else {

                    mysqli_query($con, "CREATE DATABASE IF NOT EXISTS " . $db_name);

                    mysqli_select_db($con, $db_name);
                    mysqli_query($con, "USE " . $db_name);

                    $templine = "";
                    $lines = file(FERNICO_PATH . "/resources/Installer/sql.txt");

                    foreach ($lines as $line) {

                        if (substr($line, 0, 2) == '--' || $line == '') {
                            continue;
                        }

                        $templine .= $line;

                        if (substr(trim($line), -1, 1) == ';') {
                            mysqli_query($con, $templine);
                            $templine = '';
                        }

                    }

                    $password_hash = generatePasswordHash($password);
                    $noReplyEmail = "no.reply@" . $domain;
                    $date = date("Y-m-d H:i:s");
                    $cookie_domain = "." . $domain;

                    mysqli_query($con, "INSERT INTO admin_details (user_name,password) VALUES ('{$user_name}','{$password_hash}')");
                    mysqli_query($con, "UPDATE config SET value = '{$noReplyEmail}' WHERE name = 'no_reply_email_address'");
                    mysqli_query($con, "UPDATE config SET value = '{$contact_email}' WHERE name = 'contact_email_address'");

                    $cookie_hash = hash("sha256", time() . time() . time() . uniqid() . uniqid() . mt_rand());

                    $content = '<?php

if (!defined(\'FERNICO\')) {
    fernico_destroy();
}

define("SCRIPT_INSTALLED", true);

$fernico_db_settings = array(
    "DATABASE_HOST" => "' . $db_host . '",
    "DATABASE_NAME" => "' . $db_name . '",
    "DATABASE_USER" => "' . $db_user . '",
    "DATABASE_PASSWORD" => "' . $db_pass . '"
);

$fernico_misc_settings = array(
    "COOKIE_DOMAIN" => "' . $cookie_domain . '",
    "COOKIE_SECRET" => "' . sha1(time() . mt_Rand() . uniqid()) . '",
    "WEBSITE_URL" => ""
);

/*
 * Please do not edit below this line unless you know what you\'re doing. We do not recommend editing any below setting without appropriate knowledge.
 * The configuration settings should only be changed on the suggestion of Volcrado engineers.
 *
 */

$fernico_core_settings = array(
    "CONNECT_TO_DATABASE" => true,
    "DEFAULT_CONTROLLER" => "homeIndex",
    "DEFAULT_ACTION" => "home",
    "ERROR_REPORTING" => false,
    "ERROR_LOG_DATABASE" => false,
    "TEMPLATE_DIR" => "WolvenCore",
    "TEMPLATE_COMPILED_DIR" => FERNICO_PATH . \'/storage/cache/templates_c\',
    "SESSION_NAME" => \'wolven_core_session\',
    "SECURE" => false,
    "HTTP_ONLY" => true,
    "SESSION_DAYS" => 30,
    "CONFIRMATION_CONTROLLER" => "account",
    "CONFIRMATION_ACTION" => "confirm_account",
    "RESET_PASSWORD_ACTION" => "confirm_password_change",
    "CHANGE_EMAIL_CONTROLLER" => "account",
    "CHANGE_EMAIL_ACTION" => "confirm_email_change"
);

/*
 * NOTE: To add your own custom settings (maybe, for a plugin or some controller), you need to create an array before this line of comment.
 * The array you created should have a prefix of \'fernico_\' and a suffix of \'_settings\' (for example, $fernico_site_settings), otherwise it won\'t be callable from the Config class.
 *
 * Do not edit beyond this line unless you know what you\'re doing.
 * Combining all arrays together to form one global array.
 * To access these settings, use the Config static class. For instance, $template_dir = Config::fetch("TEMPLATE_DIR");
 */

$ignore = array(
    \'GLOBALS\',
    \'_FILES\',
    \'_COOKIE\',
    \'_POST\',
    \'_GET\',
    \'_SERVER\',
    \'_ENV\',
    \'ignore\',
    \'php_errormsg\',
    \'HTTP_RAW_POST_DATA\',
    \'http_response_header\',
    \'argc\',
    \'argv\',
    \'ignore\'
);

$all_settings_found = array_diff_key(get_defined_vars() + array_flip($ignore), array_flip($ignore));
$global_fernico_settings = array();

foreach ($all_settings_found as $key => $value) {

    if (substr($key, 0, 8) === \'fernico_\' && substr($key, -9) === \'_settings\') {

        $global_fernico_settings = array_merge($global_fernico_settings, $value);

    }

}

?>';

                    file_put_contents(FERNICO_PATH . "/config/config.php", $content);

                    echo '<div class="alert alert - success">
                            The script has been <b>successfully installed</b>. Redirecting you to admin login in 15 seconds.
                          </div>';

                    echo '<script>

                        window.setTimeout(function() {
                        window.location = "' . SITE_URL . 'admin/login";
                        }, 15000);

                        </script>';

                    rmdir(FERNICO_PATH . "/resources/installer");

                }

            }

        } else {

            ?>

            </div>

            <form action="" method="post">

                <div class="form-group">
                    <label class="control-label">Website Domain:</label>
                    <input type="text" name="domain" class="form-control" value="<?php echo $domain_prepared; ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">Contact Email:</label>
                    <input type="text" name="contact_email" class="form-control" placeholder="jane.austen@poets.com">
                </div>

                <br>
                <br>

                <div class="form-group">
                    <label class="control-label">Database Host:</label>
                    <input type="text" name="db_host" class="form-control" value="localhost">
                </div>

                <div class="form-group">
                    <label class="control-label">Database User:</label>
                    <input type="text" name="db_user" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Database Password:</label>
                    <input type="password" name="db_pass" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Database Name:</label>
                    <input type="text" name="db_name" class="form-control">
                </div>

                <br>
                <br>

                <div class="form-group">
                    <label class="control-label">Desired Username:</label>
                    <input type="text" name="user_name" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Desired Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input type="submit" name="submit" value="Install Script" id="submit">

            </form>

            <?php

        }

        vomitFooter();

    }

}

?>