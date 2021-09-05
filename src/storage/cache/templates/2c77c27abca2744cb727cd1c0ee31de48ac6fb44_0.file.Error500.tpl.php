<?php
/* Smarty version 3.1.31, created on 2019-11-24 06:02:30
  from "/var/faucet/views/WolvenCore/Error500.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda0ee6f1d954_24945769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c77c27abca2744cb727cd1c0ee31de48ac6fb44' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Error500.tpl',
      1 => 1526824060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda0ee6f1d954_24945769 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block text-center" id="holder">

            <h1>Error 500</h1>

            <p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
            <p><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</p>

        </div>
    </div>

</div>

<?php ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable2."/Includes/Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
