{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Profile</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 center-block">

                {if isset($responseMessage) && ($responseMessage != null && $responseMessage != "")}
                    <div class="alert alert-info">
                        {$responseMessage}
                    </div>
                {/if}

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Current Username</label>
                        <input type="text" name="" class="form-control" value="{$smarty.session.admin_user_name}" disabled>
                    </div>

                    <div class="form-group">
                        <label class="control-label">New Username</label>
                        <input type="text" name="new_user_name" class="form-control" placeholder="What should be your new username?">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Update Username" name="update_user_name">

                </form>

                <br>
                <br>

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" placeholder="What is your current password?">
                    </div>

                    <div class="form-group">
                        <label class="control-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" placeholder="What should be your new password?">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Update Password" name="update_password">

                </form>

            </div>
        </div>
    </div>
</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}