<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:36:28
  from "/var/faucet/views/WolvenCore/Includes/Header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda16dc655300_25032208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9eeb66b3f7ad9f3c391fe274fb6b01f88bfe8ae3' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Includes/Header.tpl',
      1 => 1526846188,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda16dc655300_25032208 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['pageName']->value;?>
 | <?php echo App::loadSiteVar('website_name');?>
</title>
    <link rel="stylesheet" href="<?php echo App::makeLink('font-awesome/css/font-awesome.min.css',true);?>
">
    <link rel="stylesheet" href="<?php echo App::makeLink('bootstrap/css/bootstrap.min.css',true);?>
">
    <link rel="stylesheet" href="<?php echo App::makeLink('css/evelyn-style.css',true);?>
">
    <link rel="stylesheet" href="<?php echo App::makeLink('css/evelyn-lightgreen.css',true);?>
?time=<?php echo time();?>
">
    <link rel="stylesheet" href="<?php echo App::makeLink('css/responsive.css',true);?>
">
    <link rel="stylesheet" href="<?php echo App::makeLink('css/custom.css',true);?>
?time=<?php echo time();?>
">
    <link rel="stylesheet" href="<?php echo App::makeLink('hover-css/css/hover-min.css',true);?>
">
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
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
            <a href="<?php echo fernico_getAbsURL();?>
"><span class="navbar-brand"><?php echo App::loadSiteVar('website_name');?>
</span></a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
            <div id="nav-content">

                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right" id="navbar-right-side">

                    <?php if (App::isAdmin()) {?>
                        <li><a href="<?php echo App::makeLink('admin/home');?>
" class="hvr-underline-from-center">Admin Panel</a></li>
                        <li><a href="<?php echo App::makeLink('admin/logout');?>
" class="hvr-underline-from-center">Admin Logout</a></li>
                    <?php }?>

                    <?php if (App::UserLoggedIn() == true) {?>
                        <li><a href="<?php echo App::makeLink('page/dashboard');?>
" class="hvr-underline-from-left">Faucet</a></li>
                        <li><a href="<?php echo App::makeLink('page/affiliate-programme');?>
" class="hvr-underline-from-left">Affiliate Programme</a></li>
                        <li><a href="<?php echo App::makeLink('account/settings');?>
" class="hvr-underline-from-left">Profile</a></li>
                        <li><a href="<?php echo App::makeLink('account/logout');?>
" class="hvr-underline-from-left">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo App::makeLink('account/login');?>
" class="hvr-underline-from-left">Sign In</a></li>
                        <li><a href="<?php echo App::makeLink('account/register');?>
" class="hvr-underline-from-left">Sign Up</a></li>
                        <li><a href="<?php echo App::makeLink('page/contact');?>
" class="hvr-underline-from-left">Contact Us</a></li>
                    <?php }?>

                </ul>

            </div>
        </div>

    </div>
</div><?php }
}
