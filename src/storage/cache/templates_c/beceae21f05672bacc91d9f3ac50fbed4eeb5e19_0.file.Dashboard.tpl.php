<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:36:28
  from "/var/faucet/views/WolvenCore/Dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda16dc646553_22472377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'beceae21f05672bacc91d9f3ac50fbed4eeb5e19' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Dashboard.tpl',
      1 => 1532414036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda16dc646553_22472377 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Faucet</h1>

            <div class="row">

                <div class="col-xs-12 col-sm-2">
                    <?php echo App::showAd(1);?>

                </div>

                <div class="col-xs-12 col-sm-8">

                    <?php if (isset($_smarty_tpl->tpl_vars['responseMessage']->value)) {?>
                        <div class="alert alert-info">
                            <?php echo $_smarty_tpl->tpl_vars['responseMessage']->value;?>

                        </div>
                    <?php }?>

                    <form action="" method="post">

                        <div class="text-center">
                            <?php echo App::showAd(2);?>

                        </div>

                        <h3 class="tpromo">Claim <?php echo $_smarty_tpl->tpl_vars['winAmt']->value;?>
 <?php echo App::loadSiteVar('coin_abbreviation');?>
 Every <?php echo App::loadSiteVar('faucet_time_limit');?>
 Minutes</h3>

                        <br>

                        <div class="form-group">
                            <center>
                                <?php if (isset($_smarty_tpl->tpl_vars['captchaCode']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['captchaCode']->value;?>

                                <?php }?>
                            </center>
                        </div>

                        <br>

                        <div class="text-center">
                            <?php echo App::showAd(3);?>

                        </div>

                        <br>

                        <input type="submit" value="Claim From Faucet" name="claim" class="btn btn-primary btn-block">

                    </form>

                    <br>

                    <div class="text-center">
                        <?php echo App::showAd(4);?>

                    </div>

                    <br>
                    <hr>

                    <h2 class="feature-title text-center">Last 100 Claims By You</h2>

                    <br>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr class="success">
                                <th>Claim ID</th>
                                <th>Amount</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['claims_registered']->value, 'each', false, 'keyId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['keyId']->value => $_smarty_tpl->tpl_vars['each']->value) {
?>
                                <tr class="primary">
                                    <td><?php echo $_smarty_tpl->tpl_vars['each']->value['id'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['each']->value['amount_credited'];?>
 <?php echo App::loadSiteVar('coin_abbreviation');?>
</td>
                                    <td><?php echo App::beautifyTime($_smarty_tpl->tpl_vars['each']->value['time']);?>
</td>
                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


                            </tbody>
                        </table>
                    </div>

                    <br>

                    <div class="text-center">
                        <?php echo App::showAd(5);?>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-2">
                    <?php echo App::showAd(6);?>

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
