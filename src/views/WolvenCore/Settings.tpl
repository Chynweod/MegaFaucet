{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}
<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Settings</h1>

            <div class="col-xs-12 col-sm-12 col-md-6 center-block">

                {if isset($changeAddressDetailsMessage)}
                    <div class="alert alert-info">{$changeAddressDetailsMessage}</div>
                {/if}

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input class="form-control" type="text" name="address" value="{$address}">
                    </div>

                    <button type="submit" class="btn btn-primary" name="change_address_details" value="true">Change Address</button>

                </form>

                <br>
                <hr>
                <br>

                {if isset($changePasswordDetailsMessage)}
                    <div class="alert alert-info">{$changePasswordDetailsMessage}</div>
                {/if}

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Password (Confirm)</label>
                        <input class="form-control" type="password" name="password_repeat">
                    </div>

                    <button type="submit" class="btn btn-primary" name="change_password_details" value="true">Change Password</button>

                </form>

                <br>
                <hr>
                <br>

                {if isset($changeEmailMessage)}
                    <div class="alert alert-info">{$changeEmailMessage}</div>
                {/if}

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Email Address</label>
                        <input class="form-control" type="text" name="email" value="{$smarty.session.user_email}">
                    </div>

                    <button type="submit" class="btn btn-primary" name="change_email_details" value="true">Change Email</button>

                </form>

            </div>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}