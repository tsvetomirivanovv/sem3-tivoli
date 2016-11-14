<?php
    session_start();
    $root = getenv('PWD');
    error_reporting(E_ALL);
    require $root . '/database/connect.php';
    require $root . '/functions/general.php';
    require $root . '/functions/users.php';
    require $root . '/../vendor/autoload.php';

    $current_file = explode('/', $_SERVER['SCRIPT_NAME']);
    $current_file = end($current_file);

    if (logged_in()){
        $session_user_id = $_SESSION['user_id'];
        $user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email', 'phone', 'address', 'zip_code', 'city', 'cv', 'profile_picture', 'password_recover');
        if (!user_active($user_data['username'])){
            session_destroy();
            header('location: index.php');
            exit();
        }
        if ($current_file !== 'change-password.php' && $current_file !== 'logout.php' && $user_data['password_recover'] == 1){
            header('Location: change-password.php');
            exit();
        }
    }
    $errors = '';
?>
