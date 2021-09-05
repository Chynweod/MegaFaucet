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

global $fernico_db;

require_once(FERNICO_PATH . "/models/App.php");
require_once(FERNICO_PATH . '/models/responseTranslator.php');
require_once(FERNICO_PATH . '/models/accountModel.php');