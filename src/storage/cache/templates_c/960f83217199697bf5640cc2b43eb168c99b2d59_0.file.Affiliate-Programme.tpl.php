<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:36:22
  from "/var/faucet/views/WolvenCore/Affiliate-Programme.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda16d635c882_62569437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '960f83217199697bf5640cc2b43eb168c99b2d59' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Affiliate-Programme.tpl',
      1 => 1526740784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda16d635c882_62569437 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Affiliate Programme</h1>

            <div class="col-xs-12 col-sm-12 col-md-8 center-block">

                <?php if (isset($_smarty_tpl->tpl_vars['responseMessage']->value)) {?>
                    <div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['responseMessage']->value;?>
</div>
                <?php }?>

                You can earn extra cash if you refer your friends and family to our website. We offer a generous referral percentage for every claim your referred users make. Your referral link is listed below, you need to share this referral link with your audience.

                <br>
                <br>

                <pre><?php echo App::makeLink('?r=');
echo $_SESSION['user_name'];?>
</pre>

                <br>

                <b>Total Referral Earnings:</b> <?php echo $_smarty_tpl->tpl_vars['u']->value['referral_income'];?>
 <?php echo App::loadSiteVar('coin_abbreviation');?>


                <br>
                <br>
                <br>

                <div class="text-center">

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-lg btn-primary" onclick="window.location = '<?php echo App::makeLink('page/referred-users');?>
';">Referred Users</button>
                        <button type="button" class="btn btn-lg btn-primary" onclick="window.location = '<?php echo App::makeLink('page/referral-claims');?>
';">Referral Claims</button>
                    </div>

                </div>

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
