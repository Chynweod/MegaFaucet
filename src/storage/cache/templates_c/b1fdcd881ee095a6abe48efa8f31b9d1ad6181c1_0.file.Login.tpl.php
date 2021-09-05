<?php
/* Smarty version 3.1.31, created on 2019-11-24 05:55:11
  from "/var/faucet/views/WolvenCore/Admin/Login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda0d2f5c6888_19562998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1fdcd881ee095a6abe48efa8f31b9d1ad6181c1' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Admin/Login.tpl',
      1 => 1526824844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda0d2f5c6888_19562998 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Admin Login</h1>

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
                        <?php if (isset($_smarty_tpl->tpl_vars['captchaCode']->value)) {?>
                            <?php echo $_smarty_tpl->tpl_vars['captchaCode']->value;?>

                        <?php }?>
                    </div>

                    <input type="submit" value="Login to Admin Panel" name="login" class="btn btn-primary">

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
