<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:35:59
  from "/var/faucet/views/WolvenCore/Register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda16bfd509d1_65764635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1dd5c2a9061da2774eba73ee57b02086985cc55d' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Register.tpl',
      1 => 1531471282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda16bfd509d1_65764635 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Register</h1>

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
                        <label class="control-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email (Repeat)</label>
                        <input type="email" name="email_repeat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password (Repeat)</label>
                        <input type="password" name="password_repeat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Payment Address (Faucet.ly)</label>
                        <input type="text" name="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="checkbox white-checkbox">
                            <label>
                                <input type="checkbox" name="tos_agree" value="1" class="margin-fix-checkbox"> I Agree With <b><a href="<?php echo App::makeLink('page/terms-service');?>
" target="_blank">Terms of Service</a></b>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php if (isset($_smarty_tpl->tpl_vars['captchaCode']->value)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['captchaCode']->value;?>

                        <?php }?>
                    </div>

                    <input type="submit" value="Register Securely" name="register" class="btn btn-primary">

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
