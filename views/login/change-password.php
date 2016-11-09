<div class="col-xs-9">
    <h3>Change Password</h3>
    <div class="col-xs-4">
        <div class="form-group">
            <input type="password" class="form-control" value="" placeholder="Current Password" id="current-pass"
                   name="current-pass"/>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" value="" placeholder="New Password" id="new-pass"
                   name="new-pass"/>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" value="" placeholder="Confirm Password" id="confirm-pass"
                   name="confirm-pass"/>

        </div>
        <input type="submit" value="Change Password" class="btn btn-block btn-lg btn-default"/>

    </div>
</div>

<script type="text/javascript">

    $('.btn-default').click(function () {
        $.ajax('core/functions/login/change-password.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                current_pass: $('#current-pass').val(),
                new_pass: $('#new-pass').val(),
                confirm_pass: $('#confirm-pass').val()
            }
        })
            .done(function (response) {
                if (response.success) {
                    $.growl.notice({title: "Success", message: response.message});
                    window.location.href = "change-password.php?success";
                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
</script>