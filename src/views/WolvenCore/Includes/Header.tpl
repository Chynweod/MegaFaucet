<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8">
    <title>{$pageName} | {App::loadSiteVar('website_name')}</title>
    <link rel="stylesheet" href="{App::makeLink('font-awesome/css/font-awesome.min.css', true)}">
    <link rel="stylesheet" href="{App::makeLink('bootstrap/css/bootstrap.min.css', true)}">
    <link rel="stylesheet" href="{App::makeLink('css/evelyn-style.css', true)}">
    <link rel="stylesheet" href="{App::makeLink('css/evelyn-lightgreen.css', true)}?time={time()}">
    <link rel="stylesheet" href="{App::makeLink('css/responsive.css', true)}">
    <link rel="stylesheet" href="{App::makeLink('css/custom.css', true)}?time={time()}">
    <link rel="stylesheet" href="{App::makeLink('hover-css/css/hover-min.css', true)}">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header" id="navbar-notice">
            <a href="{fernico_getAbsURL()}"><span class="navbar-brand">{App::loadSiteVar('website_name')}</span></a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
            <div id="nav-content">

                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right" id="navbar-right-side">

                    {if App::isAdmin()}
                        <li><a href="{App::makeLink('admin/home')}" class="hvr-underline-from-center">Admin Panel</a></li>
                        <li><a href="{App::makeLink('admin/logout')}" class="hvr-underline-from-center">Admin Logout</a></li>
                    {/if}

                    {if App::UserLoggedIn() == true}
                        <li><a href="{App::makeLink('page/dashboard')}" class="hvr-underline-from-left">Faucet</a></li>
                        <li><a href="{App::makeLink('page/affiliate-programme')}" class="hvr-underline-from-left">Affiliate Programme</a></li>
                        <li><a href="{App::makeLink('account/settings')}" class="hvr-underline-from-left">Profile</a></li>
                        <li><a href="{App::makeLink('account/logout')}" class="hvr-underline-from-left">Logout</a></li>
                    {else}
                        <li><a href="{App::makeLink('account/login')}" class="hvr-underline-from-left">Sign In</a></li>
                        <li><a href="{App::makeLink('account/register')}" class="hvr-underline-from-left">Sign Up</a></li>
                        <li><a href="{App::makeLink('page/contact')}" class="hvr-underline-from-left">Contact Us</a></li>
                    {/if}

                </ul>

            </div>
        </div>

    </div>
</div>