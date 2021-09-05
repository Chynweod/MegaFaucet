{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}
<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Register</h1>

            <div class="col-xs-12 col-sm-12 col-md-6 center-block">

                {if isset($responseMessage)}
                    <div class="alert alert-info">
                        {$responseMessage}
                    </div>
                {/if}

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" name="user_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email (Repeat)</label>
                        <input type="email" name="email_repeat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password (Repeat)</label>
                        <input type="password" name="password_repeat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Payment Address (FaucetPay.io)</label>
                        <input type="text" name="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="checkbox white-checkbox">
                            <label>
                                <input type="checkbox" name="tos_agree" value="1" class="margin-fix-checkbox"> I Agree With <b><a href="{App::makeLink('page/terms-service')}" target="_blank">Terms of Service</a></b>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {if isset($captchaCode)}
                            {$captchaCode}
                        {/if}
                    </div>

                    <input type="submit" value="Register Securely" name="register" class="btn btn-primary">

                </form>

                <br>

                <p class="mb0">
                    <b><a href="{App::makeLink('account/reset-password')}">Reset Password</a></b> / <b><a href="{App::makeLink('account/resend-email')}">Resend Activation Email</a></b>
                </p>

            </div>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}