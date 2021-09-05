<?php
/* Smarty version 3.1.31, created on 2019-11-24 05:59:33
  from "/var/faucet/views/WolvenCore/Error404.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5dda0e350cb787_17728800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7842c00c9f656f0563e14fd9c7bc2dc9189c5fe7' => 
    array (
      0 => '/var/faucet/views/WolvenCore/Error404.tpl',
      1 => 1526824040,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5dda0e350cb787_17728800 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable1."/Includes/Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block text-center" id="holder">

            <h1>Error 404</h1>

            The page you were requesting was not found.

        </div>
    </div>

</div>

<?php ob_start();
echo Config::fetch("TEMPLATE_DIR");
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_subTemplateRender(((string)@constant('FERNICO_PATH'))."/views/".$_prefixVariable2."/Includes/Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
