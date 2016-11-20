<?php

function has_access($user_id, $type){
    $conn = getConnection();
    $user_id = (int)$user_id;
    $type = sanitize($type);
    $query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE user_id = '$user_id' AND type='$type'");
    $row = mysqli_fetch_assoc($query);
    return ($row['COUNT(user_id)'] == 1) ? true : false;
}
function reject_account($user_id){
    $conn = getConnection();
    mysqli_query($conn, "DELETE FROM users WHERE user_id = $user_id");
}
function approve_account($user_id){
    $conn = getConnection();
    mysqli_query($conn, "UPDATE users SET active = 1 WHERE user_id = $user_id");
}
function update_user_profile($user_id, $update_data) {

    $conn = getConnection();
    $update = array();
    array_walk($update_data, 'array_sanitize');

    foreach ($update_data as $field => $data) {
        $update[] = '`' . $field . '` = \'' . $data . '\'';
    }
    mysqli_query($conn, "UPDATE users SET " . implode(', ', $update) . " WHERE user_id  = $user_id");
}
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
    $mail->send();
}
function update_user($user_id, $update_data) {
    $conn = getConnection();
    $update = array();
    array_walk($update_data, 'array_sanitize');
    foreach ($update_data as $field => $data) {
        $update[] = '`' . $field . '` = \'' . $data . '\'';
    }
    mysqli_query($conn, "UPDATE users SET " . implode(', ', $update) . " WHERE user_id = $user_id");
}
function recover($email) {
    $email = sanitize($email);
    $user_data = user_data(user_id_from_email($email), 'user_id', 'first_name', 'username');
    $generated_password = substr(md5(rand(999, 999999)), 0, 10);
    change_password($user_data['user_id'], $generated_password);
    update_user($user_data['user_id'], array('password_recover' => '1'));
    sendMail($email, 'Tivoli password recovery', "Hello " . $user_data['first_name'] . ",\n\nYour new password is: " . $generated_password . "\n\nTivoli Hotel and Congress Center");
}
function change_password($user_id, $password) {
    $conn = getConnection();
    $user_id = (int)$user_id;
    $password = md5($password);
    mysqli_query($conn, "UPDATE users SET password = '$password', password_recover = 0 WHERE user_id = $user_id");
}
function change_online_status($user_id, $status) {
    $conn = getConnection();
    $user_id = (int)$user_id;
    $status = (int)$status;
    mysqli_query($conn, "UPDATE users SET online_status = '$status' WHERE user_id = $user_id");
}
function user_count() {
    $conn = getConnection();
    return mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE active = 1"))[0];
}
function user_not_approved() {
    $conn = getConnection();
    return mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE active = 0"))[0];
}
function user_data($user_id) {
    $conn = getConnection();
    $data = array();
    $user_id = (int)$user_id;
    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    if ($func_num_args > 1) {
        unset($func_get_args[0]);
    }
    $fields = '`' . implode('`,`', $func_get_args) . '`';
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT $fields FROM users WHERE user_id = $user_id"));
    return $data;
}
function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}
function user_exists($username) {
    $conn = getConnection();
    $username = sanitize($username);
    $query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE username = '$username'");
    $row = mysqli_fetch_assoc($query);
    return ($row['COUNT(user_id)'] == 1) ? true : false;
}
function email_exists($email) {
    $conn = getConnection();
    $email = sanitize($email);
    $query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($query);
    return ($row['COUNT(user_id)'] == 1) ? true : false;
}
function user_active($username) {
    $conn = getConnection();
    $username = sanitize($username);
    $query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE username = '$username' AND active = 1");
    $row = mysqli_fetch_assoc($query);
    return ($row['COUNT(user_id)'] == 1) ? true : false;
}
function user_id_from_username($username) {
    $conn = getConnection();
    $username = sanitize($username);
    $query = mysqli_query($conn, "SELECT user_id FROM users WHERE username = '$username'");
    $row = mysqli_fetch_assoc($query);
    return $row['user_id'];
}
function user_id_from_email($email) {
    $conn = getConnection();
    $email = sanitize($email);
    $query = mysqli_query($conn, "SELECT user_id FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($query);
    return $row['user_id'];
}
function login($username, $password) {
    $conn = getConnection();
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password);
    $query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE username = '$username' AND password = '$password'");
    $row = mysqli_fetch_assoc($query);
    return ($row['COUNT(user_id)'] == 1) ? $user_id : false;
}
function user_online($user_id) {
    $conn = getConnection();
    $user_id = sanitize($user_id);
    $query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE user_id = '$user_id' AND online_status = 1");
    $row = mysqli_fetch_assoc($query);
    return ($row['COUNT(user_id)'] == 1) ? true : false;
}

?>