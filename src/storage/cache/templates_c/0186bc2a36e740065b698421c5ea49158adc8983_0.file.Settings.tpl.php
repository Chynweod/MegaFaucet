<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:08:05
  from "/var/faucet/views/WolvenCore/Admin/Settings.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda1035a7e022_92530523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0186bc2a36e740065b698421c5ea49158adc8983' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Admin/Settings.tpl',
      1 => 1574572075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda1035a7e022_92530523 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Settings</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 center-block">

                <?php if (isset($_smarty_tpl->tpl_vars['responseMessage']->value) && ($_smarty_tpl->tpl_vars['responseMessage']->value != null && $_smarty_tpl->tpl_vars['responseMessage']->value != '')) {?>
                    <div class="alert alert-info">
                        <?php echo $_smarty_tpl->tpl_vars['responseMessage']->value;?>

                    </div>
                <?php }?>

                <form method="post" action="">

                    <div class="form-group">
                        <label class="control-label">Website Name</label>
                        <input type="text" name="website_name" class="form-control" value="<?php echo App::loadSiteVar('website_name');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Website Homepage Title</label>
                        <input type="text" name="website_homepage_title" class="form-control" value="<?php echo App::loadSiteVar('website_homepage_title');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Administrator Contact Email Address</label>
                        <input type="text" name="contact_email_address" class="form-control" value="<?php echo App::loadSiteVar('contact_email_address');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Site No-Reply Email Address</label>
                        <input type="text" name="no_reply_email_address" class="form-control" value="<?php echo App::loadSiteVar('no_reply_email_address');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email Confirmation</label>
                        <select name="email_confirmation" class="form-control">
                            <option value="true">True</option>
                            <option value="false" <?php if (App::loadSiteVar('email_confirmation') == 'false') {?>selected<?php }?>>False</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Use SMTP</label>
                        <select name="use_smtp" class="form-control">
                            <option value="true">True</option>
                            <option value="false" <?php if (App::loadSiteVar('use_smtp') == 'false') {?>selected<?php }?>>False</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Authentication</label>
                        <select name="smtp_auth" class="form-control">
                            <option value="true">True</option>
                            <option value="false" <?php if (App::loadSiteVar('smtp_auth') == 'false') {?>selected<?php }?>>False</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Encryption Scheme (Usually, 'ssl')</label>
                        <input type="text" name="email_smtp_encryption" class="form-control" value="<?php echo App::loadSiteVar('email_smtp_encryption');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Host</label>
                        <input type="text" name="email_smtp_host" class="form-control" value="<?php echo App::loadSiteVar('email_smtp_host');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Username</label>
                        <input type="text" name="email_smtp_username" class="form-control" value="<?php echo App::loadSiteVar('email_smtp_username');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Password</label>
                        <input type="text" name="email_smtp_password" class="form-control" value="<?php echo App::loadSiteVar('email_smtp_password');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Port</label>
                        <input type="text" name="email_smtp_port" class="form-control" value="<?php echo App::loadSiteVar('email_smtp_port');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Coin</label>
                        <select name="coin_information" class="form-control">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['coins']->value, 'r', false, 'keyId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keyId']->value => $_smarty_tpl->tpl_vars['r']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['acronym'];?>
-<?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
" <?php if (App::loadSiteVar('coin_abbreviation') == $_smarty_tpl->tpl_vars['r']->value['acronym']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['r']->value['acronym'];?>
)</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referral Reward (In Percentage)</label>
                        <input type="text" name="referral_percentage" class="form-control" value="<?php echo App::loadSiteVar('referral_percentage');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Faucet Reward (In Decimal)</label>
                        <input type="text" name="faucet_reward" class="form-control" value="<?php echo App::loadSiteVar('faucet_reward');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Faucet Timelimit (In Minutes, Users Would be Able to Claim Every X Minutes)</label>
                        <input type="text" name="faucet_time_limit" class="form-control" value="<?php echo App::loadSiteVar('faucet_time_limit');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Captcha Preference</label>
                        <select name="captcha_used" class="form-control">
                            <option value="1">ReCaptcha</option>
                            <option value="2" <?php if (App::loadSiteVar('captcha_used') == '2') {?>selected<?php }?>>CryptoLoot</option>
                            <option value="3" <?php if (App::loadSiteVar('captcha_used') == '3') {?>selected<?php }?>>hCaptcha</option>
                            <option value="4" <?php if (App::loadSiteVar('captcha_used') == '4') {?>selected<?php }?>>None</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Captcha Site Key</label>
                        <input type="text" name="site_key" class="form-control" value="<?php echo App::loadSiteVar('site_key');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Captcha Secret Key</label>
                        <input type="text" name="secret_key" class="form-control" value="<?php echo App::loadSiteVar('secret_key');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">CryptoLoot Target Hashes (Multiple of 256; E.g: 256, 512, 1024)</label>
                        <input type="text" name="ch_target_hashes" class="form-control" value="<?php echo App::loadSiteVar('ch_target_hashes');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Shortlink Preference</label>
                        <select name="shortlink_preference" class="form-control">
                            <option value="0">None</option>
                            <option value="1">Ouo.io</option>
                            <option value="2" <?php if (App::loadSiteVar('shortlink_preference') == '2') {?>selected<?php }?>>Shorte.st</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ouo API Key</label>
                        <input type="text" name="ouo_api_key" class="form-control" value="<?php echo App::loadSiteVar('ouo_api_key');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Shortest API Token</label>
                        <input type="text" name="shortest_api_token" class="form-control" value="<?php echo App::loadSiteVar('shortest_api_token');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">FaucetPay.io API Key</label>
                        <input type="text" name="faucetpay_api_key" class="form-control" value="<?php echo App::loadSiteVar('faucetpay_api_key');?>
">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Anti Ad-Blocker</label>
                        <select name="anti_ad_blocker" class="form-control">
                            <option value="1">Enabled</option>
                            <option value="2" <?php if (App::loadSiteVar('anti_ad_blocker') == '2') {?>selected<?php }?>>Disabled</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update" value="true">Update Settings</button>

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
