{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Header.tpl"}

<div class="page-wrapper">

    <div class="container">
        <div class="col-lg-12 center-block" id="holder">

            <h1>Contact Us</h1>

            <div class="col-xs-12 col-sm-12 col-md-6 center-block">

                {if isset($responseMessage) && ($responseMessage != null && $responseMessage != "")}
                    <div class="alert alert-info">
                        {$responseMessage}
                    </div>
                {/if}

                <form action="" method="post">

                    <div class="form-group">
                        <label class="control-label">Your Name</label>
                        <input class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Your Email</label>
                        <input class="form-control" type="text" name="email_address">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Message</label>
                        <textarea name="message" class="form-control" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="contactForm" value="true">Submit</button>

                </form>

            </div>

        </div>
    </div>

</div>

{include file="{$smarty.const.FERNICO_PATH}/views/{Config::fetch("TEMPLATE_DIR")}/Includes/Footer.tpl"}