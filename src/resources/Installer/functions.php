<?php

function is_valid_domain_name($domain_name) {
    return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
        && preg_match("/^.{1,253}$/", $domain_name) //overall length check
        && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)); //length of each label
}

function getURL() {

    $delimiter = '';

    if ($_GET['param']) {
        $delimiter = $_GET['param'];
    }

    if ($delimiter == "/") {
        $delimiter = "";
    }

    if ($delimiter != "") {

        $request_uri = explode($delimiter, $_SERVER['REQUEST_URI']);

    } else {

        $request_uri = array();
        $request_uri[0] = $_SERVER['REQUEST_URI'];

    }

    if (substr($request_uri[0], -1) == "/") {
        $request_uri[0] = trim($request_uri[0]);
    }

    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
        $scheme = $_SERVER['HTTP_X_FORWARDED_PROTO'];
    } else {
        $scheme = $_SERVER['REQUEST_SCHEME'];
    }

    if ($scheme == "") {

        $scheme = 'http';

        if ($_SERVER['SERVER_PORT'] != 80) {
            $scheme = 'https';
        }

    }

    $url = $scheme . "://" . $_SERVER['HTTP_HOST'] . "/";

    return $url;

}

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . "/" . $object)) {
                    rrmdir($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        rmdir($dir);
    }
}


function cleanInput($input) {

    $search = array(
        '@<script[^>]*?>.*?</script>@si',
        '@<[\/\!]*?[^<>]*?>@si',
        '@<style[^>]*?>.*?</style>@siU',
        '@<![\s\S]*?--[ \t\n\r]*>@'
    );

    $wipe = array(

        "+union+",
        "%20union%20",
        "/union/*",
        ' union '

    );

    $output = preg_replace($search, '', $input);
    $output = str_replace($wipe, '', $output);

    return addslashes(trim($output));

}

function vomitHeader() {

    echo '<!DOCTYPE html>
    <html lang="en-us">
    <head>
    <meta charset="utf-8">
    <title>Installer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">
    </head>
    <body>
    <style>
    body {
        padding: 3%;
        max-width: 70%;
    }
    .form-group {
        padding-bottom: 20px;
    }
    .form-group .control-label {
        display: block;
        font-family: "Raleway", sans-serif;
        font-weight: bold;
        padding-bottom: 5px;
    }   
    .form-group input {
        min-height: 40px;
        min-width: 100%; 
        padding-left: 10px;      
        padding-right: 10px;      
    }   
     #submit {
        padding: 20px 50px 20px 50px;
        background: #21b799;
        color: white;
        border: none;
        outline: none;
        font-family: "Raleway", sans-serif;
        font-weight: bold;
        margin-top: 15px;
        cursor: pointer;
     }    
     #requirements {
        padding-bottom: 15px;   
        font-family: "Raleway", sans-serif;  
     }
     .alert {
        padding: 30px;
        font-family: "Raleway", sans-serif;
        color: white;
        background: #21b799;
     }
    </style>';

}

function fetch_content($url) {

    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;

}

function vomitFooter() {
    echo '</body>
    </html>';
}

function generatePasswordHash($input) {

    for ($x = 0; $x < 100; $x++) {

        $input = hash('sha256', $input);

    }

    return hash('sha512', $input);

}