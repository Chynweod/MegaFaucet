{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}
<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Affiliate Programme</h1>

            <div class="col-xs-12 col-sm-12 col-md-8 center-block">

                {if isset($responseMessage)}
                    <div class="alert alert-info">{$responseMessage}</div>
                {/if}

                You can earn extra cash if you refer your friends and family to our website. We offer a generous referral percentage for every claim your referred users make. Your referral link is listed below, you need to share this referral link with your audience.

                <br>
                <br>

                <pre>{App::makeLink('?r=')}{$smarty.session.user_name}</pre>

                <br>

                <b>Total Referral Earnings:</b> {$u.referral_income} {App::loadSiteVar('coin_abbreviation')}

                <br>
                <br>
                <br>

                <div class="text-center">

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-lg btn-primary" onclick="window.location = '{App::makeLink('page/referred-users')}';">Referred Users</button>
                        <button type="button" class="btn btn-lg btn-primary" onclick="window.location = '{App::makeLink('page/referral-claims')}';">Referral Claims</button>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}