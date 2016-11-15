<?php
   //require_once("core/functions/register/register.php");

    $passwordErr = "";
     $usernameErr ="";
     $cvErr= "";
     $imageErr= "";
     $emailErr= "";

?>
<style>
    label{
        width: 150px;
    }
    .form-control{
        width: 324px;
        display: inline;
    }
</style>
<h1>Sign Up</h1>
<div class="col-xs-12">

        <form method="post" action="register.php" id="registerForm" enctype="multipart/form-data">
            <label>Username:*</label>
                <input type="text" name="username" id="username" class="form-control" required>
                    <span class="error"> <?php echo $usernameErr;?></span> <br>
            <label>First Name:*</label>
            <input type="text" name="firstname" id="firstname" class="form-control" required><br>
            <label>Last Name:*</label>
            <input type="text" name="lastname" id="lastname" class="form-control" required/><br>
            <label>E-mail:*</label>
            <input type="email" name="email" id="email" class="form-control" required/> <span class="error"> <?php echo $emailErr;?></span> <br>
             <label>Password:*</label>
            <input type="password" name="password" id="password" class="form-control" required/> <span class="error"> <?php echo $passwordErr;?></span><br>
            <label>Verify password:*</label>
            <input type="password" name="verifyPassword" id="verifyPassword" class="form-control" required/><br>
            <label>Phone number:*</label>
            <input type="number" name="phone" id="phone" class="form-control" required/><br>
            <label>Address:*</label>
            <input type="text" name="address" id="address" class="form-control" required/><br>
            <label>Zip code:*</label>
            <input type="number" name="zip" id="zip" class="form-control" required/><br>
            <label>City:*</label>
            <input type="text" name="city" id="city" class="form-control" required/><br>
            <label>CV:*<span>(pdf | max 500KB)</span></label>
            <input type="file" name="cvFile" id="cvFile" accept="application/pdf" class="form-control" > <span class="error"> <?php echo $cvErr;?></span><br>
            Select image to upload:<span>(jpeg/png | max 500KB)</span><br>
            <input type="file" name="pictureFile" id="pictureFile" accept="image/jpeg, image/png" class="form-control"> <span class="error"> <?php echo $imageErr;?></span><br>
            <button type="submit" name="submit" value="Submit" class="submitButton btn" id="register">Submit</button><br>
        </form>

</div>

