<?php

$conn = getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if(isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];
    if(user_exists($username)) {
        $user_id = user_id_from_username($username);
        $profile_status = array();
        if (user_online($user_id)) {
            $profile_status['dotColor'] = 'text-success';
            $profile_status['dotClass'] = 'fa fa-circle';
            $profile_status['isOnline'] = ' ONLINE';
        } else {
            $profile_status['dotColor'] = 'text-danger';
            $profile_status['dotClass'] = 'fa fa-circle-o';
            $profile_status['isOnline'] = ' OFFLINE';
        }
        $profile_data = user_data($user_id, 'user_id', 'username', 'first_name', 'last_name', 'email', 'phone', 'address', 'zip_code', 'city', 'cv', 'profile_picture', 'password_recover', 'type' , 'online_status');
    } else {
        echo 'Sorry, that user doesn\'t exists!';
    }
} else {
    header('Location: index.php');
    exit();
}

