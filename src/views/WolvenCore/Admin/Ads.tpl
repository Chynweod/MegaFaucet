{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="page-wrapper">

    <div class="container-fluid">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Ad Slots</h1>

            <div class="col-xs-12 col-sm-12 col-md-12 center-block">

                {if isset($responseMessage) && ($responseMessage != null && $responseMessage != "")}
                    <div class="alert alert-info">
                        {$responseMessage}
                    </div>
                {/if}

                {foreach from=$items key=$k item=$v}
                    <div class="well">
                        <code>{htmlspecialchars($v.code)}</code>
                        <br>
                        <br>
                        Size: {if $v.type == 1}160x600 (Left){elseif $v.type == 2}728x90{elseif $v.type == 3}468x60 (Top){elseif $v.type == 4}468x60 (Bottom){elseif $v.type == 5}300x250{elseif $v.type == 6}160x600 (Right){/if}
                        <br>
                        <br>
                        <a href="{fernico_getAbsURL()}admin/ads?d={$v.id}">Delete</a>
                    </div>
                {/foreach}

                <br>

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <select name="size" class="form-control">
                            <option value="1">160x600 (Left)</option>
                            <option value="2">728x90</option>
                            <option value="3">468x60 (Top)</option>
                            <option value="4">468x60 (Bottom)</option>
                            <option value="5">300x250</option>
                            <option value="6">160x600 (Right)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Ad-Code</label>
                        <textarea class="form-control" name="code"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary btn-raised" value="Submit" name="submit">

                </form>

            </div>
        </div>
    </div>
</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}