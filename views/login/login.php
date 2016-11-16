<div class="col-xs-3">
    <div class="login-form">
            <div class="form-group">
                <input type="text" class="form-control login-field" value="" placeholder="Username" id="login-name" name="login_name" />
                <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
                <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" name="login_pass" />
                <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <button id="loginButton" class="btn btn-primary btn-lg btn-block login-button" type="submit">Log in</button>
            <a class="login-link" type="button" data-toggle="modal" data-target="#RecoverPasswordModal">Lost your password?</a>
            <a class="login-link" href="/register.php">Sign up</a>

    </div>
</div>
<div class="modal fade" id="RecoverPasswordModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Recover</h4>
            </div>
            <div class="modal-body" >
                <div class="form-group">
                    <label>Please enter your email address:</label><br>
                    <input type="email" class="form-control" value="" placeholder="Email" id="email-address"
                           name="email_address"/>
                </div>
            </div>
            <div class="modal-footer">
                <input id="recoverButton" type="submit" value="Recover" class="btn btn-block btn-lg btn-default"
                       data-dismiss="modal"/>
            </div>
        </div>

    </div>
</div>