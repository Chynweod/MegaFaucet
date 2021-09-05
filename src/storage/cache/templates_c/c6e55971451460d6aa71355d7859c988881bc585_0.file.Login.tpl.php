<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:36:01
  from "/var/faucet/views/WolvenCore/Login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda16c1d1bcf4_07293219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6e55971451460d6aa71355d7859c988881bc585' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Login.tpl',
      1 => 1526714632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda16c1d1bcf4_07293219 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Login</h1>

            <div class="col-xs-12 col-sm-12 col-md-6 center-block">

                <?php if (isset($_smarty_tpl->tpl_vars['responseMessage']->value)) {?>
                    <div class="alert alert-info">
                        <?php echo $_smarty_tpl->tpl_vars['responseMessage']->value;?>

                    </div>
                <?php }?>

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" name="user_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="checkbox white-checkbox">
                            <label>
                                <input type="checkbox" name="remember_me" value="1" class="margin-fix-checkbox"> Stay Logged In
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php if (isset($_smarty_tpl->tpl_vars['captchaCode']->value)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['captchaCode']->value;?>

                        <?php }?>
                    </div>

                    <input type="submit" value="Login Securely" name="login" class="btn btn-primary">

                </form>

                <br>

                <p class="mb0">
                    <b><a href="<?php echo App::makeLink('account/reset-password');?>
">Reset Password</a></b> / <b><a href="<?php echo App::makeLink('account/resend-email');?>
">Resend Activation Email</a></b>
                </p>

            </div>

        </div>
    </div>

</div>

<?php ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable2."/Includes/Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
