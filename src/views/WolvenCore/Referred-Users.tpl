{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="page-wrapper">
    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Referred Users</h1>

            <div class="col-xs-12 col-sm-12 col-md-8 center-block">

                {if $items->num_rows < 0.99}
                    <div class="alert alert-info">
                        You have not referred any user.
                    </div>
                {else}
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr class="success">
                                <th>User Name</th>
                                <th>Referred Income</th>
                                <th>Registration Datetime</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach from=$items key=keyId item=each}
                                <tr class="primary">
                                    <td>{$each.user_name}</td>
                                    <td>{$each.referred_income} {App::loadSiteVar('coin_abbreviation')}</td>
                                    <td>{$each.registration_datetime}</td>
                                </tr>
                            {/foreach}

                            </tbody>
                        </table>
                    </div>

                    <div align="center">

                        {if $req_page > 1}
                            <a href="{App::makeLink('page/referred-users')}?offset={$req_page - 1}" class="btn btn-primary">{$req_page - 1}</a>
                        {/if}

                        <a href="{App::makeLink('page/referred-users')}?offset={$req_page}" class="btn btn-primary"><b>Current Page:</b> {$req_page}</a>

                        {if $req_page < $total_pages}
                            <a href="{App::makeLink('page/referred-users')}?offset={$req_page + 1}" class="btn btn-primary">{$req_page + 1}</a>
                        {/if}

                    </div>

                {/if}

            </div>
        </div>
    </div>
</div>

{App::getAd('homepage_footer')}

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}