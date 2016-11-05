<div class="col-xs-3">
    <div class="login-form">
            <div class="form-group">
                <input type="text" class="form-control login-field" value="" placeholder="Username" id="login-name" name="login-name" />
                <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
                <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" name="login-pass" />
                <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <button class="btn btn-primary btn-lg btn-block login-button" type="submit">Log in</button>
            <a class="login-link" href="#">Lost your password?</a>
    </div>
</div>

<script type="text/javascript">

    $('.login-button').click(function() {
        $.growl.error({ title: "Error", message: "<?php print_r($errors[0]); ?>" });
    });
</script>
