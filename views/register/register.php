<head>
    <?php include 'views/shared/head.php'; ?>
</head>
<h1>Sign Up</h1>
<div>
    <div class="errorDiv"></div>
    <form method="post" action="" id="registerForm" enctype="multipart/form-data">
        Username:*<br>
        <input type="text" name="username" id="username" required> <span class="error"> <?php echo $usernameErr;?></span> <br><br>
        First Name:*<br>
        <input type="text" name="firstname" id="firstname" required><br><br>
        Last Name:*<br>
        <input type="text" name="lastname" id="lastname" required/><br><br>
        E-mail:*<br>
        <input type="email" name="email" id="email" required/> <span class="error"> <?php echo $emailErr;?></span> <br><br>
        Password:*<br>
        <input type="password" name="password" id="password" required/> <span class="error"> <?php echo $passwordErr;?></span><br><br>
        Verify password:*<br>
        <input type="password" name="verifyPassword" id="verifyPassword" required/><br><br>
        Phone number:*<br>
        <input type="number" name="phone" id="phone" required/><br><br>
        Address:*<br>
        <input type="text" name="address" id="address" required/><br><br>
        Zip code:*<br>
        <input type="number" name="zip" id="zip" required/><br><br>
        City:*<br>
        <input type="text" name="city" id="city" required/><br><br>
        CV:*<br>
        <input type="file" name="cvFile" id="cvFile" required> <span class="error"> <?php echo $cvErr;?></span>
        <br><br>
        Select image to upload:*<br>
        <input type="file" name="pictureFile" id="pictureFile" required> <span class="error"> <?php echo $imageErr;?></span>
        <br><br>
       <!-- <input type="submit" name="submit" value="Submit" class="submitButton" onclick="doFct()"/> -->
        <button type="submit" name="submit" value="Submit" class="submitButton">Submit</button>
    </form>

</div>


<script type="text/javascript">
        $('.submitButton').click(function () {
            $.ajax('core/functions/register/register.php', {
                type: 'POST',
                dataType: 'json',
                data: {
                    username: $('#username').val(),
                    firstname: $('#firstname').val(),
                    lastname: $('#lastname').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    verifyPassword: $('#verifyPassword').val(),
                    phone: $('#phone').val(),
                    address: $('#address').val(),
                    zip: $('#zip').val(),
                    city: $('#city').val(),
                    cvFile: $('#cvFile').val(),
                    pictureFile: $('#pictureFile').val()
                }
            })
                .done(function (response) {
                    if (response.success) {
                        $.growl.notice({title: "Success", message: response.message});
                    } else {
                        $.growl.error({title: "Error", message: response.message});
                        //location.reload().delay(5000);



                    }
                })
        });
</script>