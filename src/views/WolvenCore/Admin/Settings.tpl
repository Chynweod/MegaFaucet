{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Settings</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 center-block">

                {if isset($responseMessage) && ($responseMessage != null && $responseMessage != "")}
                    <div class="alert alert-info">
                        {$responseMessage}
                    </div>
                {/if}

                <form method="post" action="">

                    <div class="form-group">
                        <label class="control-label">Website Name</label>
                        <input type="text" name="website_name" class="form-control" value="{App::loadSiteVar('website_name')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Website Homepage Title</label>
                        <input type="text" name="website_homepage_title" class="form-control" value="{App::loadSiteVar('website_homepage_title')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Administrator Contact Email Address</label>
                        <input type="text" name="contact_email_address" class="form-control" value="{App::loadSiteVar('contact_email_address')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Site No-Reply Email Address</label>
                        <input type="text" name="no_reply_email_address" class="form-control" value="{App::loadSiteVar('no_reply_email_address')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email Confirmation</label>
                        <select name="email_confirmation" class="form-control">
                            <option value="true">True</option>
                            <option value="false" {if App::loadSiteVar('email_confirmation') == 'false'}selected{/if}>False</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Use SMTP</label>
                        <select name="use_smtp" class="form-control">
                            <option value="true">True</option>
                            <option value="false" {if App::loadSiteVar('use_smtp') == 'false'}selected{/if}>False</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Authentication</label>
                        <select name="smtp_auth" class="form-control">
                            <option value="true">True</option>
                            <option value="false" {if App::loadSiteVar('smtp_auth') == 'false'}selected{/if}>False</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Encryption Scheme (Usually, 'ssl')</label>
                        <input type="text" name="email_smtp_encryption" class="form-control" value="{App::loadSiteVar('email_smtp_encryption')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Host</label>
                        <input type="text" name="email_smtp_host" class="form-control" value="{App::loadSiteVar('email_smtp_host')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Username</label>
                        <input type="text" name="email_smtp_username" class="form-control" value="{App::loadSiteVar('email_smtp_username')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Password</label>
                        <input type="text" name="email_smtp_password" class="form-control" value="{App::loadSiteVar('email_smtp_password')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">SMTP Port</label>
                        <input type="text" name="email_smtp_port" class="form-control" value="{App::loadSiteVar('email_smtp_port')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Coin</label>
                        <select name="coin_information" class="form-control">
                            {foreach from=$coins key=keyId item=$r}
                                <option value="{$r.acronym}-{$r.name}" {if App::loadSiteVar('coin_abbreviation') == $r.acronym}selected{/if}>{$r.name} ({$r.acronym})</option>
                            {/foreach}
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referral Reward (In Percentage)</label>
                        <input type="text" name="referral_percentage" class="form-control" value="{App::loadSiteVar('referral_percentage')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Faucet Reward (In Decimal)</label>
                        <input type="text" name="faucet_reward" class="form-control" value="{App::loadSiteVar('faucet_reward')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Faucet Timelimit (In Minutes, Users Would be Able to Claim Every X Minutes)</label>
                        <input type="text" name="faucet_time_limit" class="form-control" value="{App::loadSiteVar('faucet_time_limit')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Captcha Preference</label>
                        <select name="captcha_used" class="form-control">
                            <option value="1">ReCaptcha</option>
                            <option value="2" {if App::loadSiteVar('captcha_used') == '2'}selected{/if}>CryptoLoot</option>
                            <option value="3" {if App::loadSiteVar('captcha_used') == '3'}selected{/if}>hCaptcha</option>
                            <option value="4" {if App::loadSiteVar('captcha_used') == '4'}selected{/if}>None</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Captcha Site Key</label>
                        <input type="text" name="site_key" class="form-control" value="{App::loadSiteVar('site_key')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Captcha Secret Key</label>
                        <input type="text" name="secret_key" class="form-control" value="{App::loadSiteVar('secret_key')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">CryptoLoot Target Hashes (Multiple of 256; E.g: 256, 512, 1024)</label>
                        <input type="text" name="ch_target_hashes" class="form-control" value="{App::loadSiteVar('ch_target_hashes')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Shortlink Preference</label>
                        <select name="shortlink_preference" class="form-control">
                            <option value="0">None</option>
                            <option value="1" {if App::loadSiteVar('shortlink_preference') == '1'}selected{/if}>Ouo.io</option>
                            <option value="2" {if App::loadSiteVar('shortlink_preference') == '2'}selected{/if}>Shorte.st</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ouo API Key</label>
                        <input type="text" name="ouo_api_key" class="form-control" value="{App::loadSiteVar('ouo_api_key')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Shortest API Token</label>
                        <input type="text" name="shortest_api_token" class="form-control" value="{App::loadSiteVar('shortest_api_token')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">FaucetPay.io API Key</label>
                        <input type="text" name="faucetpay_api_key" class="form-control" value="{App::loadSiteVar('faucetpay_api_key')}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Anti Ad-Blocker</label>
                        <select name="anti_ad_blocker" class="form-control">
                            <option value="1">Enabled</option>
                            <option value="2" {if App::loadSiteVar('anti_ad_blocker') == '2'}selected{/if}>Disabled</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update" value="true">Update Settings</button>

                </form>

            </div>
        </div>
    </div>
</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}