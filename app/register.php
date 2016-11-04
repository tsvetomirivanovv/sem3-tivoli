<?php
$passwordErr = $usernameErr ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require 'C:\xampp\htdocs\TivoliApp\app\core\database\connect.php';

// CHECK IF THERE IS ERROR
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    if (isset($_POST)){
        $username = $_POST['username'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verify_password = $_POST['verify-password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];

        $active = 0;
        $sql = "SELECT username FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($password != $verify_password){
            $passwordErr = "Password not the same";
        }
        else if (strlen($password) >=20 || strlen($password) <= 5){
            $passwordErr = "Password should contain minimum 5 characters and maximum 20";
        }

        else if ($result->num_rows > 0) {
            $usernameErr = "Name already used";
        }
        else{
            $sql = "INSERT INTO users VALUES (NULL , '$username', '$password', '$first_name', '$last_name', '$email', '$phone', '$address', '$zip', '$city', 0, 0, '$active')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
} else {
    echo "0 results";
}
?>


<h1>Sign Up</h1>
<div>
    <form method="post" action="" id="registerForm">
        Username:*<br>
        <input type="text" name="username" > <span class="error">* <?php echo $usernameErr;?></span> <br><br>
        First Name:*<br>
        <input type="text" name="firstname" ><br><br>
        Last Name:*<br>
        <input type="text" name="lastname" /><br><br>
        E-mail:*<br>
        <input type="email" name="email" /><br><br>
        Password:*<br>
        <input type="password" name="password" id="Password" /> <span class="error">* <?php echo $passwordErr;?></span><br><br>
        Verify password:*<br>
        <input type="password" name="verify-password" /><br><br>
        Phone number:*<br>
        <input type="number" name="phone" /><br><br>
        Address:*<br>
        <input type="text" name="address" /><br><br>
        Zip code:*<br>
        <input type="number" name="zip" /><br><br>
        City:*<br>
        <input type="text" name="city" /><br><br>
        <!--CV:*<br>
        <br><br>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:<br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
        </form>
        <br><br>-->
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>

