<?php
    function sendMail($to, $subject, $message) {
        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'postmaster@tivoliapp.c0dex.co';   // SMTP username
        $mail->Password = '25706daf439527e125efdb0d97c6cf26';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

        $mail->From = 'teodor@tivoliapp.c0dex.co';
        $mail->FromName = 'Tivoli App';
        $mail->addAddress($to);                 // Add a recipient

        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters

        $mail->Subject = $subject;
        $mail->Body = $message;
    }
    function recover ($email){
        $email = sanitize($email);
        $user_data = user_data(user_id_from_email($email),'user_id', 'first_name', 'username');
        $generated_password = substr(md5(rand(999, 999999)), 0, 10);
        change_password($user_data['user_id'], $generated_password);
        sendMail($email, 'Tivoli password recovery',"Hello " . $user_data['first_name'] . ",\n\nYour new password is: " . $generated_password . "\n\nTivoli Hotel & Congress Center");
    }
    function change_password($user_id, $password){
        $conn = getConnection();
        $user_id = (int)$user_id;
        $password = md5($password);
        mysqli_query($conn, "UPDATE users SET password = '$password' WHERE user_id = $user_id");
    }
    function user_count(){
        $conn = getConnection();
        return mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE active = 1"))[0];
    }
    function user_data($user_id){
        $conn = getConnection();
        $data = array();
        $user_id = (int) $user_id;
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();
        if($func_num_args > 1) {
            unset($func_get_args[0]);
        }
        $fields = '`'. implode('`,`', $func_get_args). '`';
        $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT $fields FROM users WHERE user_id = $user_id"));
        return $data;
    }
    function logged_in(){
        return (isset($_SESSION['user_id'])) ? true : false;
    }
    function user_exists($username){
        $conn = getConnection();
        $username = sanitize($username);
        $query = mysqli_query($conn,"SELECT COUNT(user_id) FROM users WHERE username = '$username'");
        $row = mysqli_fetch_assoc($query);
        return ($row['COUNT(user_id)'] == 1) ? true : false;
    }
    function email_exists($email){
        $conn = getConnection();
        $email = sanitize($email);
        $query = mysqli_query($conn,"SELECT COUNT(user_id) FROM users WHERE email = '$email'");
        $row = mysqli_fetch_assoc($query);
        return ($row['COUNT(user_id)'] == 1) ? true : false;
    }
    function user_active($username){
        $conn = getConnection();
        $username = sanitize($username);
        $query = mysqli_query($conn,"SELECT COUNT(user_id) FROM users WHERE username = '$username' AND active = 1");
        $row = mysqli_fetch_assoc($query);
        return ($row['COUNT(user_id)'] == 1) ? true : false;
    }
    function user_id_from_username($username){
        $conn = getConnection();
        $username = sanitize($username);
        $query = mysqli_query($conn,"SELECT user_id FROM users WHERE username = '$username'");
        $row = mysqli_fetch_assoc($query);
        return $row['user_id'];
    }
    function user_id_from_email($email){
        $conn = getConnection();
        $email = sanitize($email);
        $query = mysqli_query($conn,"SELECT user_id FROM users WHERE email = '$email'");
        $row = mysqli_fetch_assoc($query);
        return $row['user_id'];
    }
    function login($username, $password){
        $conn = getConnection();
        $user_id = user_id_from_username($username);
        $username = sanitize($username);
        $password = md5($password);
        $query = mysqli_query($conn,"SELECT COUNT(user_id) FROM users WHERE username = '$username' AND password = '$password'");
        $row = mysqli_fetch_assoc($query);
        return ($row['COUNT(user_id)'] == 1) ? $user_id : false;
    }
?>