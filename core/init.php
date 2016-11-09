<?php
    session_start();
    error_reporting(E_ALL);
    require 'database/connect.php';
    require('phpmailer/PHPMailerAutoload.php');
    require 'functions/general.php';
    require 'functions/users.php';


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
