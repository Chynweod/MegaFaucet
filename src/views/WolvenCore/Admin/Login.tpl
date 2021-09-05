{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}
<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Admin Login</h1>

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
                        <label class="control-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        {if isset($captchaCode)}
                            {$captchaCode}
                        {/if}
                    </div>

                    <input type="submit" value="Login to Admin Panel" name="login" class="btn btn-primary">

                </form>

            </div>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}