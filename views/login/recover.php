<div class="col-xs-9">
    <h3>Recover</h3>
    <div class="col-xs-4">
        <div class="form-group">
            <label>Please enter your email address:</label><br>
            <input type="email" class="form-control" value="" placeholder="Email" id="email-address"
                   name="email_address"/>
        </div>
        <input id="recoverButton" type="submit" value="Recover" class="btn btn-block btn-lg btn-default"/>
    </div>
</div>

<script type="text/javascript">

    $('#recoverButton').click(function () {
        $.ajax('core/functions/login/recover.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                email_address: $('#email-address').val()
            }
        })
            .done(function (response) {
                if (response.success) {
                    $.growl.notice({title: "Success", message: response.message});
                    window.setTimeout(function () {
                        window.location.href  = "index.php";
                    }, 5000);
                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
</script>