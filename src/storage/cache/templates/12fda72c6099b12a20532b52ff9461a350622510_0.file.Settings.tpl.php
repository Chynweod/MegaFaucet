<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:36:24
  from "/var/faucet/views/WolvenCore/Settings.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda16d8745c75_84747996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12fda72c6099b12a20532b52ff9461a350622510' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Settings.tpl',
      1 => 1531476324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda16d8745c75_84747996 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Settings</h1>

            <div class="col-xs-12 col-sm-12 col-md-6 center-block">

                <?php if (isset($_smarty_tpl->tpl_vars['changeAddressDetailsMessage']->value)) {?>
                    <div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['changeAddressDetailsMessage']->value;?>
</div>
                <?php }?>

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input class="form-control" type="text" name="address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
">
                    </div>

                    <button type="submit" class="btn btn-primary" name="change_address_details" value="true">Change Address</button>

                </form>

                <br>
                <hr>
                <br>

                <?php if (isset($_smarty_tpl->tpl_vars['changePasswordDetailsMessage']->value)) {?>
                    <div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['changePasswordDetailsMessage']->value;?>
</div>
                <?php }?>

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password (Confirm)</label>
                        <input class="form-control" type="password" name="password_repeat">
                    </div>

                    <button type="submit" class="btn btn-primary" name="change_password_details" value="true">Change Password</button>

                </form>

                <br>
                <hr>
                <br>

                <?php if (isset($_smarty_tpl->tpl_vars['changeEmailMessage']->value)) {?>
                    <div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['changeEmailMessage']->value;?>
</div>
                <?php }?>

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input class="form-control" type="text" name="email" value="<?php echo $_SESSION['user_email'];?>
">
                    </div>

                    <button type="submit" class="btn btn-primary" name="change_email_details" value="true">Change Email</button>

                </form>

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
