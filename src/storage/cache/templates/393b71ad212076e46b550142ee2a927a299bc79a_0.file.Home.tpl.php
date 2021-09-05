<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:07:15
  from "/var/faucet/views/WolvenCore/Admin/Home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda100339b653_59825130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '393b71ad212076e46b550142ee2a927a299bc79a' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Admin/Home.tpl',
      1 => 1532375840,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda100339b653_59825130 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Admin Dashboard</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 center-block">

                <?php if (isset($_smarty_tpl->tpl_vars['responseMessage']->value) && ($_smarty_tpl->tpl_vars['responseMessage']->value != null && $_smarty_tpl->tpl_vars['responseMessage']->value != '')) {?>
                    <div class="alert alert-info">
                        <b><?php echo $_smarty_tpl->tpl_vars['responseMessage']->value;?>
</b>
                    </div>
                <?php }?>

                <div class="btn-group btn-group-justified">
                    <a href="<?php echo fernico_getAbsURL();?>
admin/settings" class="btn btn-primary btn-sm">Settings</a>
                    <a href="<?php echo fernico_getAbsURL();?>
admin/users" class="btn btn-primary btn-sm">Users</a>
                    <a href="<?php echo fernico_getAbsURL();?>
admin/banned-users" class="btn btn-primary btn-sm">Banned Users</a>
                </div>

                <div class="btn-group btn-group-justified">
                    <a href="<?php echo fernico_getAbsURL();?>
admin/profile" class="btn btn-primary btn-sm">My Profile</a>
                    <a href="<?php echo fernico_getAbsURL();?>
admin/ads" class="btn btn-primary btn-sm">Ad Slots</a>
                </div>

            </div>

            <hr>

            <h3><b>Edit User:</b></h3>

            <?php if ($_smarty_tpl->tpl_vars['showEditSection']->value == false) {?>
                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">User ID / User Name / User Email</label>
                        <input type="text" name="user" class="form-control" maxlength="16">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="edit_user" value="true">Edit User</button>
                        </div>
                    </div>

                </form>
            <?php } else { ?>
                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">User ID</label>
                        <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['user_id'];?>
" disabled>
                    </div>

                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['user_id'];?>
">

                    <div class="form-group">
                        <label class="control-label">User Name</label>
                        <input type="text" name="user_name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['user_name'];?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">User Email</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['user_email'];?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email Verification</label>
                        <select name="user_verified" class="form-control">
                            <option value="1">Confirmed</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['editData']->value['user_verified'] == 0) {?>selected<?php }?>>Unconfirmed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Claims Made</label>
                        <input type="text" name="claims_made" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['claims_made'];?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referred Income</label>
                        <input type="text" name="referred_income" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['referred_income'];?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referral Income</label>
                        <input type="text" name="referral_income" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['referral_income'];?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referral</label>
                        <input type="text" name="referral" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['referral'];?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['editData']->value['address'];?>
">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="update_user" value="true">Save</button>
                        </div>
                    </div>

                </form>
            <?php }?>

            <hr>

            <h3><b>Delete User:</b></h3>

            <form action="" method="post">

                <div class="form-group">
                    <label class="control-label">User ID / User Name / User Email</label>
                    <input type="text" name="user" class="form-control" maxlength="16">
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" name="delete_user" value="true">Delete User</button>
                    </div>
                </div>

            </form>

            <hr>

            <h3><b>(Un)Ban User:</b></h3>

            <form action="" method="post">

                <div class="form-group">
                    <label class="control-label">User ID / User Name / User Email</label>
                    <input type="text" name="user" class="form-control" maxlength="16">
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" name="ban_unban_user" value="true">Make a Change</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

<?php ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable2."/Includes/Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
