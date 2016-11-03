<?php
    function logged_in(){
        return (isset($_SESSION['user_id'])) ? true : false;
    }
    function user_exists($username){
        $conn = db();
        $username = sanitize($username);
        $query = mysqli_query($conn,"SELECT COUNT(user_id) FROM users WHERE username = '$username'");
        $row = mysqli_fetch_assoc($query);
        return ($row['COUNT(user_id)'] == 1) ? true : false;
    }
    function user_active($username){
        $conn = db();
        $username = sanitize($username);
        $query = mysqli_query($conn,"SELECT COUNT(user_id) FROM users WHERE username = '$username' AND active = 1");
        $row = mysqli_fetch_assoc($query);
        return ($row['COUNT(user_id)'] == 1) ? true : false;
    }
    function user_id_from_username($username){
        $conn = db();
        $username = sanitize($username);
        $query = mysqli_query($conn,"SELECT user_id FROM users WHERE username = '$username'");
        $row = mysqli_fetch_assoc($query);
        return $row['user_id'];
    }
    function login($username, $password){
        $conn = db();
        $user_id = user_id_from_username($username);
        $username = sanitize($username);
        $password = md5($password);
        $query = mysqli_query($conn,"SELECT COUNT(user_id) FROM users WHERE username = '$username' AND password = '$password'");
        $row = mysqli_fetch_assoc($query);
        return ($row['COUNT(user_id)'] == 1) ? $user_id : false;
    }
?>