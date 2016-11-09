<?php
include '../../init.php';

if (!empty($_POST)) {
    $username = $_POST['login_name'];
    $password = $_POST['login_pass'];
    if (empty($username)) {
        $errors = 'You need to enter a username';
    } else if (empty($password)) {
        $errors = 'You need to enter a password';
    } else if (!user_exists($username)) {
        $errors = 'Username not found';
    } else if (!user_active($username)) {
        $errors = 'You haven\'t activated your account';
    } else {
        $login = login($username, $password);
        if (!$login) {
            $errors = 'That username/password combination is incorrect';
        } else {
            $_SESSION['user_id'] = $login;
        }
    }
} else {
    $errors = 'No data received';
}

if(strlen($errors)) {
    $result = array('success' => false, 'message' => $errors);
} else {
    $result = array('success' => true, 'message' => 'You successfuly logged in!');
}

echo json_encode($result);

?>
