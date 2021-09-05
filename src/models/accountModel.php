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

// Nothing strengthens authority so much as silence.

if (!defined('FERNICO')) {
    fernico_destroy();
}

class Account {

    static function loginHandler($authMod) {

        if (Request::POST('login') AND Request::POST('user_name') AND Request::POST('password')) {

            $response = $authMod->login(Request::POST('user_name'), Request::POST('password'));

            if ($response == 'LOGIN_SUCCESS') {

                return true;

            } else {

                return ResponseTranslator::respCode($response);

            }

        }

    }

    static function registerHandler($authMod) {

        if (Request::POST('register')) {

            $address = Request::POST('address');

            $resp = json_decode(fernico_post("https://faucethub.io/api/v1/send", array(
                "api_key" => App::loadSiteVar('faucet_hub_api_key'),
                "address " => $address,
                "currency" => App::loadSiteVar('coin_abbreviation')
            )), true);

            if ($resp['status'] == 456) {
                $notValid = 0;
            }

            if (!Request::POST('tos_agree')) {

                return "You need to agree with our terms and conditions to proceed with the registration process.";

            } elseif (Request::POST('email') != Request::POST('email_repeat')) {

                return "Your email addresses do not match. Please resubmit the form with valid information.";

            } elseif (isset($notValid)) {

                return "It seems that you are not registered with FaucetHub.io. In that case, we recommend that you register at FaucetHub.io first and then register an account here. Your address needs to be linked with a FaucetHub account before you can register here.";

            } else {

                $response = $authMod->register(Request::POST('user_name'), Request::POST('email'), Request::POST('password'), Request::POST('password_repeat'));
                return ResponseTranslator::respCode($response);

            }

        }

    }

    static function resetPasswordHandler($authMod) {

        if (Request::POST('reset_password')) {

            $response = $authMod->sendPasswordResetEmail(Request::POST('user_name'));

            return ResponseTranslator::respCode($response);

        }

    }

    static function resendEmailHandler($authMod) {

        if (Request::POST('resend_email')) {

            $response = $authMod->resendActivationEmail(Request::POST('user_name'));

            return ResponseTranslator::respCode($response);

        }

    }

    static function confirmEmailHandler($authMod, $hash) {

        $response = $authMod->confirmEmail($hash);

        return ResponseTranslator::respCode($response);

    }

    static function confirmEmailChangeHandler($authMod, $hash) {

        $response = $authMod->confirmEmailChange($hash);

        return ResponseTranslator::respCode($response);

    }

    static function confirmPasswordChangeHandler($authMod, $hash) {

        if (Request::POST('password') AND Request::POST('password_repeat')) {

            $response = $authMod->setNewPassword($hash, Request::POST('password'), Request::POST('password_repeat'));

            if ($response == 'PASSWORD_RESET_SUCCESSFUL') {

                return true;

            } else {

                return ResponseTranslator::respCode($response);

            }

        }

    }

    static function changeEmailHandler($authMod) {

        $resp = $authMod->changeEmail(Request::POST('email'));
        return ResponseTranslator::respCode($resp);

    }

    static function changePasswordHandler($authMod) {

        $resp = $authMod->changePassword(Request::POST('password'), Request::POST('password_repeat'));
        return ResponseTranslator::respCode($resp);

    }

}