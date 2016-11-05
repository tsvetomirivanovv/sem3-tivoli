<div class="col-xs-3">
    <div class="login-form">
        <form action="login.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control login-field" value="" placeholder="Username" name="login-name" />
            <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <div class="form-group">
            <input type="password" class="form-control login-field" value="" placeholder="Password" name="login-pass" />
            <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>

        <button class="btn btn-primary btn-lg btn-block login-button" type="submit" href="login.php">Log in</button>
        <a class="login-link" href="#">Lost your password?</a>
        </form>
    </div>
</div>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js' type='text/javascript'></script>
<script src='../assets/js/notifications/jquery.growl.js' type='text/javascript'></script>

<script type="text/javascript">

            $('.login-button').click(function() {
                $.growl.error({ title: "Error", message: '<?php print_r($errors[0]); ?>' });
            });



</script>
