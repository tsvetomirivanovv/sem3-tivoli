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
                           class="form-control registerfield formControlChange" required>
                    <span class="error"> <?php echo $usernameErr; ?></span> <br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">First Name:*</label>
                    <input type="text" name="firstname" id="firstname"
                           class="form-control registerfield formControlChange" required><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">Last Name:*</label>
                    <input type="text" name="lastname" id="lastname"
                           class="form-control registerfield formControlChange" required/><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">E-mail:*</label>
                    <input type="email" name="email" id="email"
                           class="form-control registerfield formControlChange" required/>
                    <span class="error"> <?php echo $emailErr; ?></span> <br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">Password:*</label>
                    <input type="password" name="password" id="password"
                           class="form-control registerfield formControlChange" required/>
                    <span class="error"> <?php echo $passwordErr; ?></span><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">Verify password:*</label>
                    <input type="password" name="verifyPassword" id="verifyPassword"
                           class="form-control registerfield formControlChange" required/><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">Phone number:*</label>
                    <input type="number" name="phone" id="phone"
                           class="form-control registerfield formControlChange" required/><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">Address:*</label>
                    <input type="text" name="address" id="address"
                           class="form-control registerfield formControlChange" required/><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">Zip code:*</label>
                    <input type="number" name="zip" id="zip"
                           class="form-control registerfield formControlChange" required/><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle">City:*</label>
                    <input type="text" name="city" id="city"
                           class="form-control registerfield formControlChange" required/><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle" data-toggle="tooltip" data-placement="top"
                           title=".pdf | max 10MB">CV:*</label>
                    <div  class="form-control inputUploader">
                        <script type="text/javascript" src="//api.filestackapi.com/filestack.js"></script>
                            <input  type="filepicker" name="upload_cv" id="upload-cv" data-fp-button-text="Choose file"
                                   data-fp-button-class="customUploader" data-fp-apikey="AdqLfcsUSRWZiP8XVuUgAz" data-fp-maxSize="10485760"
                                   data-fp-extension=".pdf" data-fp-container="modal" data-fp-services="COMPUTER"
                                   onchange="getFileLink(event.fpfile.url, 'upload-cv')" required>
                            <p class="fileName" id="upload-cv-link">
                                <?php if (isset($profile_data['cv'])) {
                                    ?>
                                    <a href="<?php echo $profile_data['cv'];?>" target="_blank">
                                        <?php echo $profile_data['username'] . " - CV.pdf";?>
                                    </a>
                                    <?php
                                } else {
                                    echo 'No file chosen';
                                } ?>
                        </p></div><br>
                    <div class="clearfix"></div>
                    <label class="labelStyle" data-toggle="tooltip" data-placement="top" title=".jpeg/.png | max 800x600">
                        Profile picture:</label>
                    <div class="form-control inputUploader">
                        <input  type="filepicker" name="upload_picture" id="upload-picture" data-fp-button-text="Choose file"
                                data-fp-button-class="customUploader" data-fp-apikey="AdqLfcsUSRWZiP8XVuUgAz"
                                data-fp-mimetypes="image/*" data-fp-image-max="800, 600"
                                data-fp-container="modal" data-fp-services="COMPUTER"
                                onchange="getFileLink(event.fpfile.url, 'upload-profile-picture')">
                        <p class="fileName" id="upload-profile-picture-link">
                            <?php if (isset($profile_data['profile_picture'])) {
                                ?>
                                <a href="<?php echo $profile_data['profile_picture'];?>" target="_blank">
                                    <?php echo $profile_data['username'] . " - avatar";?>
                                </a>
                                <?php
                            } else {
                                echo 'No file chosen';
                            } ?>
                    </p></div><br>
                    <button type="submit" name="submit" value="Submit" class="submitButton btn registerButtonFloat"
                            id="register">Submit
                    </button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
