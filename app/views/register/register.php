
<h1>Sign Up</h1>
<div>
    <form action="register.php" method="post" >
        First Name:*<br>
        <label>
            <input type="text" name="first-name">
        </label><br><br>
        Last Name:*<br>
        <label>
            <input type="text" name="lastname"/>
        </label><br><br>
        E-mail:*<br>
        <label>
            <input type="email" name="email"/>
        </label><br><br>
        Password:*<br>
        <label for="Password"></label><input type="password" name="password" id="Password" /><br><br>
        Verify password:*<br>
        <label>
            <input type="password" name="verify-password"/>
        </label><br><br>
        Phone number:*<br>
        <label>
            <input type="number" name="phone"/>
        </label><br><br>
        Address:*<br>
        <label>
            <input type="text" name="address"/>
        </label><br><br>
        Zip code:*<br>
        <label>
            <input type="number" name="zip"/>
        </label><br><br>
        City:*<br>
        <label>
            <input type="text" name="city"/>
        </label><br><br>
        CV:*<br>
        <br><br>
        <!--        <form action="test.php" method="post" enctype="multipart/form-data">-->
        <!--            Select image to upload:-->
        <!--            <input type="file" name="fileToUpload" id="fileToUpload">-->
        <!--            <input type="submit" value="Upload Image" name="submit">
                   </form>
        -->
        <br><br>
        <button type="submit" name="registerButton"  href="register.php" >Submit</button>
    </form>
</div>