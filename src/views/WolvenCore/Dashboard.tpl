{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}
<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Faucet</h1>

            <div class="row">

                <div class="col-xs-12 col-sm-2">
                    {App::showAd(1)}
                </div>

                <div class="col-xs-12 col-sm-8">

                    {if isset($responseMessage)}
                        <div class="alert alert-info">
                            {$responseMessage}
                        </div>
                    {/if}

                    <form action="" method="post">

                        <div class="text-center">
                            {App::showAd(2)}
                        </div>

                        <h3 class="tpromo">Claim {$winAmt} {App::loadSiteVar('coin_abbreviation')} Every {App::loadSiteVar('faucet_time_limit')} Minutes</h3>

                        <br>

                        <div class="form-group">
                            <center>
                                {if isset($captchaCode)}
                                    {$captchaCode}
                                {/if}
                            </center>
                        </div>

                        <br>

                        <div class="text-center">
                            {App::showAd(3)}
                        </div>

                        <br>

                        <input type="submit" value="Claim From Faucet" name="claim" class="btn btn-primary btn-block">

                    </form>

                    <br>

                    <div class="text-center">
                        {App::showAd(4)}
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

                            {foreach from=$claims_registered key=keyId item=each}
                                <tr class="primary">
                                    <td>{$each.id}</td>
                                    <td>{$each.amount_credited} {App::loadSiteVar('coin_abbreviation')}</td>
                                    <td>{App::beautifyTime($each.time)}</td>
                                </tr>
                            {/foreach}

                            </tbody>
                        </table>
                    </div>

                    <br>

                    <div class="text-center">
                        {App::showAd(5)}
                    </div>

                </div>

                <div class="col-xs-12 col-sm-2">
                    {App::showAd(6)}
                </div>

            </div>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}