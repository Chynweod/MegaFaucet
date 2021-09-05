{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}
<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Admin Dashboard</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 center-block">

                {if isset($responseMessage) && ($responseMessage != null && $responseMessage != "")}
                    <div class="alert alert-info">
                        <b>{$responseMessage}</b>
                    </div>
                {/if}

                <div class="btn-group btn-group-justified">
                    <a href="{fernico_getAbsURL()}admin/settings" class="btn btn-primary btn-sm">Settings</a>
                    <a href="{fernico_getAbsURL()}admin/users" class="btn btn-primary btn-sm">Users</a>
                    <a href="{fernico_getAbsURL()}admin/banned-users" class="btn btn-primary btn-sm">Banned Users</a>
                </div>

                <div class="btn-group btn-group-justified">
                    <a href="{fernico_getAbsURL()}admin/profile" class="btn btn-primary btn-sm">My Profile</a>
                    <a href="{fernico_getAbsURL()}admin/ads" class="btn btn-primary btn-sm">Ad Slots</a>
                </div>

            </div>

            <hr>

            <h3><b>Edit User:</b></h3>

            {if $showEditSection == false}
                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">User ID / User Name / User Email</label>
                        <input type="text" name="user" class="form-control" maxlength="16">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="edit_user" value="true">Edit User</button>
                        </div>
                    </div>

                </form>
            {else}
                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">User ID</label>
                        <input type="text" class="form-control" value="{$editData.user_id}" disabled>
                    </div>

                    <input type="hidden" name="user_id" class="form-control" value="{$editData.user_id}">

                    <div class="form-group">
                        <label class="control-label">User Name</label>
                        <input type="text" name="user_name" class="form-control" value="{$editData.user_name}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">User Email</label>
                        <input type="text" name="user_email" class="form-control" value="{$editData.user_email}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Email Verification</label>
                        <select name="user_verified" class="form-control">
                            <option value="1">Confirmed</option>
                            <option value="0" {if $editData.user_verified == 0}selected{/if}>Unconfirmed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Claims Made</label>
                        <input type="text" name="claims_made" class="form-control" value="{$editData.claims_made}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referred Income</label>
                        <input type="text" name="referred_income" class="form-control" value="{$editData.referred_income}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referral Income</label>
                        <input type="text" name="referral_income" class="form-control" value="{$editData.referral_income}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Referral</label>
                        <input type="text" name="referral" class="form-control" value="{$editData.referral}">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{$editData.address}">
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" name="update_user" value="true">Save</button>
                        </div>
                    </div>

                </form>
            {/if}

            <hr>

            <h3><b>Delete User:</b></h3>

            <form action="" method="post">

                <div class="form-group">
                    <label class="control-label">User ID / User Name / User Email</label>
                    <input type="text" name="user" class="form-control" maxlength="16">
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" name="delete_user" value="true">Delete User</button>
                    </div>
                </div>

            </form>

            <hr>

            <h3><b>(Un)Ban User:</b></h3>

            <form action="" method="post">

                <div class="form-group">
                    <label class="control-label">User ID / User Name / User Email</label>
                    <input type="text" name="user" class="form-control" maxlength="16">
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary" name="ban_unban_user" value="true">Make a Change</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}