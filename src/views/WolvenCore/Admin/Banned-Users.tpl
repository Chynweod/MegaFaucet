{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Banned Users</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 center-block">

                {if isset($responseMessage) && ($responseMessage != null && $responseMessage != "")}
                    <div class="alert alert-info">
                        {$responseMessage}
                    </div>
                {/if}

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="sellTable">
                        <thead>
                        <tr class="success small-txt">
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Registration</th>
                            <th>Manage</th>
                        </tr>
                        </thead>
                        <tbody id="sellBody">

                        {foreach from=$items key=keyId item=eachRecord}
                            <tr id="user{$eachRecord.user_id}">
                                <td>{$eachRecord.user_id}</td>
                                <td>{$eachRecord.user_name}</td>
                                <td>{$eachRecord.user_email}</td>
                                <td>{$eachRecord.registration_datetime} / {$eachRecord.registration_ip}</td>
                                <td><a href="{fernico_getAbsURL()}admin/home?edit_user={$eachRecord.user_id}" target="_blank">Edit
                                        User</a> / <a href="{fernico_getAbsURL()}admin/home?delete_user={$eachRecord.user_id}"
                                                      target="_blank">Delete
                                        User</a> / <a href="{fernico_getAbsURL()}admin/home?ban_unban_user={$eachRecord.user_id}"
                                                      target="_blank">{if $eachRecord.account_status == 1}Ban{else}Unban{/if}
                                        User</a></td>
                            </tr>
                        {/foreach}

                        </tbody>
                    </table>
                </div>

                <div align="center">

                    {if $req_page > 1}
                        <a href="{fernico_getAbsURL()}admin/banned-users?offset={$req_page - 1}" class="btn btn-primary btn-sm">{$req_page - 1}</a>
                    {/if}

                    <a href="{fernico_getAbsURL()}admin/banned-users?offset={$req_page}" class="btn btn-primary btn-sm"><b>Current Page:</b> {$req_page}</a>

                    {if $req_page < $total_pages}
                        <a href="{fernico_getAbsURL()}admin/banned-users?offset={$req_page + 1}" class="btn btn-primary btn-sm">{$req_page + 1}</a>
                    {/if}

                </div>

            </div>
        </div>
    </div>
</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}