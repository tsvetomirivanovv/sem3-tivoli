<?php
    session_start();
    error_reporting(E_ALL);
    require 'core/database/connect.php';
    require 'core/functions/general.php';
    require 'core/functions/users.php';

    if (logged_in()){
        $session_user_id = $_SESSION['user_id'];
        $user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email', 'phone', 'address', 'zip_code', 'city', 'cv', 'profile_picture');
        if (!user_active($user_data['username'])){
            session_destroy();
            header('location: index.php');
            exit();
        }
    }
    $errors = '';
