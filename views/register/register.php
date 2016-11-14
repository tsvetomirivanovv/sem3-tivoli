<?php
    require_once("core/functions/register/register.php");

?>
<h1>Sign Up</h1>
<div>

    <form method="post" action="register.php" id="registerForm" enctype="multipart/form-data">
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
        CV: <span>(pdf | max 500KB)</span>*<br>
        <input type="file" name="cvFile" id="cvFile" accept="application/pdf" required> <span class="error"> <?php echo $cvErr;?></span>
        <br><br>
        Select image to upload: <span>(jpeg/png | max 500KB)</span><br>
        <input type="file" name="pictureFile" id="pictureFile" accept="image/jpeg, image/png" > <span class="error"> <?php echo $imageErr;?></span>
        <br><br>
        <button type="submit" name="submit" value="Submit" class="submitButton">Submit</button>
    </form>

</div>

