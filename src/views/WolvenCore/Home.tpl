{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="homepage-cover">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10" id="homepage-cover">

                <h1>
                    A High-Paying Faucet {App::loadSiteVar('coin_name')}
                    <br>
                    For People Like You
                </h1>

                <br>

                <p>
                    {App::loadSiteVar('website_name')} is a perfect solution if you would like to earn some cash on the web with little to no efforts. Claiming here is both easy and fun. The claimed amounts are credited to your FaucetPay.io account.
                </p>

                <br>

                {if !App::userLoggedIn()}
                    <a href="{fernico_getAbsURL()}account/register" class="btn btn-lg btn-cover">Sign Up</a>
                    <a href="{fernico_getAbsURL()}account/login" class="btn btn-lg btn-cover">Sign In</a>
                {/if}

            </div>

        </div>
    </div>
</div>

<div class="ethics">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="colour1">
                <div class="ethic">

                    <i class="fa fa-user"></i>
                    <br>
                    <h3>Register &amp; Login</h3>
                    <p>Pretty simple and straightforward. First step is to register at our website using the link at the navigation bar. At this time, you'll also be asked to put on your FaucetPay.io account address. Login to your account now.</p>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="colour2">
                <div class="ethic">

                    <i class="fa fa-hand-paper-o"></i>
                    <br>
                    <h3>Pass Captcha</h3>
                    <p>The next step to claim at our website is to pass the anti-bot captcha test. This step is mandatory as there are a lot of bad guys out there who wanna rob the faucet cash pool. This helps us protect against them.</p>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" id="colour3">
                <div class="ethic">

                    <i class="fa fa-external-link"></i>
                    <br>
                    <h3>Visit Shortlink</h3>
                    <p>This is the final step. You are now required to visit the shortlink to finish your claim process. Without this step, we won't be able to earn enough cash and not be able to pay you. Shortlinks help us against fraud and malicious bots as well.</p>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid gray-bg" id="feature">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <h2 class="feature-title text-center">Last 15 Claims</h2>

            <br>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr class="success">
                        <th>Claim ID</th>
                        <th>User Name</th>
                        <th>Amount</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach from=$claims_registered key=keyId item=each}
                        <tr class="primary">
                            <td>{$each.id}</td>
                            <td>{$each.user_name}</td>
                            <td>{$each.amount_credited} {App::loadSiteVar('coin_abbreviation')}</td>
                            <td>{App::beautifyTime($each.time)}</td>
                        </tr>
                    {/foreach}

                    </tbody>
                </table>
            </div>

            <br>

            <div class="text-center">

                <a href="{fernico_getAbsURL()}account/register" class="btn btn-lg btn-primary">Sign Up</a>
                <a href="{fernico_getAbsURL()}account/login" class="btn btn-lg btn-primary">Sign In</a>

            </div>

        </div>

    </div>
</div>

<div class="ethics">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 colour1">
                <div class="ethic">

                    <i class="fa fa-users"></i>
                    <br>
                    <h3>{number_format(App::loadSiteVar('stats_Total_Users'))}</h3>
                    <p>Registered Users</p>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 colour2">
                <div class="ethic">

                    <i class="fa fa-th-list"></i>
                    <br>
                    <h3>{number_format(App::loadSiteVar('stats_Claims_Made'))}</h3>
                    <p>Claims Made</p>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 colour3">
                <div class="ethic">

                    <i class="fa fa-sort-amount-desc"></i>
                    <br>
                    <h3>{number_format(App::loadSiteVar('stats_Amount_Claimed'), 8)} BTC</h3>
                    <p>Total Amount Collected (In {App::loadSiteVar('coin_abbreviation')})</p>

                </div>
            </div>

        </div>
    </div>
</div>

{App::getAd('homepage_footer')}

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}