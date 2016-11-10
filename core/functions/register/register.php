<?php
function doFct()
{
    $passwordErr = "";
    $usernameErr = "";
    $cvErr = "";
    $imageErr = "";
    $emailErr = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../../init.php';
        $conn = getConnection();
// CHECK IF THERE IS ERROR
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        if (isset($_POST)) {
//upload CV
            $cvFileOk = 1;
            $cvFile = $_FILES["cvFile"];
            if ($cvFile["error"] !== UPLOAD_ERR_OK) {
                $cvErr = "An error occurred while uploading your CV";
                $cvFileOk = 0;
            }
            // Check file size
            if ($_FILES["cvFile"]["size"] > 500000) {
                $cvErr = "Your CV file is too large.";
                $cvFileOk = 0;
            }
            /*$cvType = exif_imagetype($_FILES["pictureFile"]["tmp_name"]);
            $allowed = array(FILETYPE_PDF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
            if (!in_array($cvType, $allowed) && !empty($cvFile)) {
                $cvErr = "File type is not permitted";
                $pictureFileOk = 0;
            }*/
            $cvName = preg_replace("/[^A-Z0-9._-]/i", "_", $cvFile["name"]);
            // preserve file from temporary directory
            $success = move_uploaded_file($cvFile["tmp_name"], $_POST['username'] . $cvName);
            $cvName = $_POST['username'] . $cvName;
            if (!$success) {
                $cvErr = "Unable to save your CV file";
                $cvFileOk = 0;
            }
            if ($cvFileOk == 1) {
                //echo "Uploaded file saved as " . $cvName. ".</p>";
                $cvFileOk = 1;
            }
//upload picture
            $pictureFileOk = 1;
            $pictureFile = $_FILES["pictureFile"];
            if ($pictureFile["error"] !== UPLOAD_ERR_OK) {
                $imageErr = "An error occurred while uploading your picture";
                $pictureFileOk = 0;
            }
            // Check file size max 500KB
            if ($_FILES["pictureFile"]["size"] > 500000) {
                $imageErr = "Your picture file is too large";
                $pictureFileOk = 0;
            }
            $fileType = exif_imagetype($_FILES["pictureFile"]["tmp_name"]);
            $allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
            if (!in_array($fileType, $allowed) && !empty($pictureFile)) {
                $imageErr = "File type is not permitted";
                $pictureFileOk = 0;
            }
            $pictureName = preg_replace("/[^A-Z0-9._-]/i", "_", $pictureFile["name"]);
            // preserve file from temporary directory
            $success = move_uploaded_file($pictureFile["tmp_name"], $_POST['username'] . $pictureName);
            $pictureName = $_POST['username'] . $pictureName;
            if (!$success) {
                $imageErr = "Unable to save your picture";
                $pictureFileOk = 0;
            }
            if ($pictureFileOk == 1) {
                //echo "<p>Uploaded file saved as " . $pictureName . ".</p>";
                $pictureFileOk = 1;
            }

            $username = $_POST['username'];
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verifyPassword = $_POST['verifyPassword'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $zip = $_POST['zip'];
            $city = $_POST['city'];

            $active = 0;
            $conn = getConnection();
            $sql = "SELECT username FROM users WHERE username='$username'";

            $result = $conn->query($sql);

            $emailSql = "SELECT email FROM users WHERE email='$email'";
            $emailResult = $conn->query($emailSql);

            $connectionOk = 1;
            if ($password != $verifyPassword) {
                $passwordErr = "Password not the same";
                $connectionOk = 0;
            }
            if (strlen($password) >= 20 || strlen($password) <= 5) {
                $passwordErr = "Password should contain minimum 5 characters and maximum 15";
                $connectionOk = 0;
            }
            if ($result->num_rows > 0) {
                $usernameErr = "Name already used";
                $connectionOk = 0;
            }
            if ($emailResult->num_rows > 0) {
                $emailErr = "Email already used";
                $connectionOk = 0;
            }

            if ($connectionOk == 1 && $cvFileOk == 1 && $pictureFileOk == 1) {
                $sql = "INSERT INTO users (username, password, first_name, last_name, email, phone, address, zip_code, city, cv, profile_picture, active) VALUES ('$username', '" . MD5($password) . "', '$first_name', '$last_name', '$email', '$phone', '$address', '$zip', '$city', '$cvName', '$pictureName', $active)";
                if ($conn->query($sql) === TRUE) {
                    //echo "New record created successfully";
                    $result = array('success' => true, 'message' => 'Account created!');
                } else {
                    //echo "New record failed!";
                    //$result = array('success' => false, 'message' => $passwordErr . $usernameErr . $cvErr . $imageErr . $emailErr);
                    $result = $passwordErr . $usernameErr . $cvErr . $imageErr . $emailErr;
                }
            } else {
                //echo "Account not created. Please complete the required fields.";
                $result = array('success' => false, 'message' => $passwordErr);

                /*$error =
                    "<div class='err'>" .
                    "$passwordErr" .
                    "</div>";

                $passwordErr.appendTo(".errorDiv");*/
            }
            echo json_encode($result);
        }
    }
}
?>