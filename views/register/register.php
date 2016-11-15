<?php

$passwordErr = "";
$usernameErr = "";
$cvErr = "";
$imageErr = "";
$emailErr = "";

?>
<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="clearfix">
            <div class="page-header headerFix"><h3 class="h3Fix">Sign up</h3></div>
            <div class="col-xs-12" id="registerForm">

                <form method="post" action="register.php" id="registerForm" enctype="multipart/form-data">
                    <label class="labelStyle">Username:*</label>
                    <input type="text" name="username" id="username"
                           class="form-control registerfield inputStyle formControlChange" required>
                    <span class="error"> <?php echo $usernameErr; ?></span> <br>
                    <label class="labelStyle">First Name:*</label>
                    <input type="text" name="firstname" id="firstname"
                           class="form-control registerfield inputStyle formControlChange" required><br>
                    <label class="labelStyle">Last Name:*</label>
                    <input type="text" name="lastname" id="lastname"
                           class="form-control registerfield inputStyle formControlChange" required/><br>
                    <label class="labelStyle">E-mail:*</label>
                    <input type="email" name="email" id="email"
                           class="form-control registerfield inputStyle formControlChange" required/>
                    <span class="error"> <?php echo $emailErr; ?></span> <br>
                    <label class="labelStyle">Password:*</label>
                    <input type="password" name="password" id="password"
                           class="form-control registerfield inputStyle formControlChange" required/>
                    <span class="error"> <?php echo $passwordErr; ?></span><br>
                    <label class="labelStyle">Verify password:*</label>
                    <input type="password" name="verifyPassword" id="verifyPassword"
                           class="form-control registerfield inputStyle formControlChange" required/><br>
                    <label class="labelStyle">Phone number:*</label>
                    <input type="number" name="phone" id="phone"
                           class="form-control registerfield inputStyle formControlChange" required/><br>
                    <label class="labelStyle">Address:*</label>
                    <input type="text" name="address" id="address"
                           class="form-control registerfield inputStyle formControlChange" required/><br>
                    <label class="labelStyle">Zip code:*</label>
                    <input type="number" name="zip" id="zip"
                           class="form-control registerfield inputStyle formControlChange" required/><br>
                    <label class="labelStyle">City:*</label>
                    <input type="text" name="city" id="city"
                           class="form-control registerfield inputStyle formControlChange" required/><br>
                    <label class="labelStyle" data-toggle="tooltip" data-placement="top"
                           title="pdf | max 500KB">CV:*</label>
                    <input type="file" name="cvFile" id="cvFile" accept="application/pdf" style="display: inline;"
                           class="form-control registerfield inputStyle formControlChange">
                    <span class="error"> <?php echo $cvErr; ?></span><br>
                    <label class="labelStyle" data-toggle="tooltip" data-placement="top" title="jpeg/png | max 500KB">
                        Profile picture:</label>
                    <input type="file" name="pictureFile" id="pictureFile" accept="image/jpeg, image/png"
                           style="display: inline;" class="form-control registerfield inputStyle formControlChange ">
                    <span class="error"> <?php echo $imageErr; ?></span><br>
                    <button type="submit" name="submit" value="Submit" class="submitButton btn registerButtonFloat"
                            id="register">Submit
                    </button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
