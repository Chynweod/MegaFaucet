{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block text-center" id="holder">

            <h1>Error 500</h1>

            <p>{$message}</p>
            <p>{$error_message}</p>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}