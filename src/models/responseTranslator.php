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

class ResponseTranslator {

    static function lang($code = "") {

        $codes = array(
            'ER_CAPTCHA_INVALID' => "The captcha you entered is not valid.",
            'ER_USER_NAME_SHORT' => "The username you entered is too short.",
            'ER_USER_NAME_LONG' => "The username you entered is too long, it shouldn't be more than 16 characters.",
            'ER_USER_NAME_CONTAINS_SPECIAL_CHARACTERS' => "The username should not contain any special character.",
            'ER_PASSWORD_SHORT' => "The password should be at least 6 characters.",
            'ER_PASSWORD_LONG' => "The password cannot be more than 64 characters.",
            'ER_USER_NOT_FOUND' => "The username/password you entered is not valid.",
            'ER_PASSWORD_INCORRECT' => "The username/password you entered is not valid.",
            'ER_ACCOUNT_NOT_VERIFIED' => "You haven't confirmed your email address yet.",
            'ER_TOO_MANY_ATTEMPTS' => "Calm down! You have been trying a lot. Come back in 15 minutes.",
            'ER_EMAIL_BLANK' => "You have left the email address blank.",
            'ER_EMAIL_INVALID' => "The email address you entered is not valid.",
            'ER_PASSWORD_REPEATING_NOT_MATCHING' => "Your passwords do not match. Try again.",
            'ER_USER_ALREADY_EXISTS' => "The username you entered is already in our database.",
            'ER_EMAIL_ALREADY_EXISTS' => "The email address you entered is already in our database.",
            'ER_USER_NAME_INVALID' => "The username you entered does not exist.",
            'ER_SAME_EMAIL' => "The email you entered is same as that on your account",
            'ER_INVALID_EMAIL_CHANGE_LINK' => "The link you used is not valid.",
            'LOGIN_SUCCESS' => "You've been successfully logged in.",
            'REGISTER_SUCCESS_NO_ACTIVATION_EMAIL' => "Your account was successfully created. You may login now with the details you provided.",
            'REGISTER_SUCCESS_ACTIVATION_EMAIL_SENT' => "Your account was successfully created. Please confirm your email address before you log in. Also, check your spam/junk box if you were not able to find the confirmation link at the inbox.",
            'SUCCESS_RESET_LINK_SENT' => 'The account password reset link has been sent to your email. Also, check your spam/junk box if you were not able to find the confirmation link at the inbox.',
            'SUCCESS_ACTIVATION_EMAIL_RESENT' => 'The activation email has been resent to your email. Also, check your spam/junk box if you were not able to find the confirmation link at the inbox.',
            'SUCCESS_EMAIL_CONFIRMED' => 'Your email has been successfully confirmed. You may login now.',
            'ER_WRONG_ACTIVATION_LINK' => 'The activation link you used is not valid or has expired.',
            'SUCCESS_EMAIL_CHANGED' => 'Your email was successfully changed.',
            'IS_VALID_RESET_LINK' => '',
            'IS_NOT_VALID_RESET_LINK' => 'The reset link you used is not valid or has expired.',
            'PASSWORD_RESET_SUCCESSFUL' => 'Your password has been successfully changed.',
            'SUCCESS_EMAIL_CHANGE_EMAIL_SENT' => 'Please confirm your new email address by clicking the link sent to your inbox.',
            'USER_NOT_LOGGED_IN' => 'You are not logged-in to complete this action.',
            'PASSWORD_SUCCESSFULLY_CHANGED' => 'Your password has been changed with immediate effect.',
            'ALREADY_ACCOUNT' => 'Looks like you already have an account with us.',
            'ER_ACCOUNT_BANNED' => 'Your account has been banned at our website.'
        );

        return $codes[$code];

    }

    static function respCode($code) {

        $code = strtoupper(trim($code));
        return self::lang($code);

    }

}