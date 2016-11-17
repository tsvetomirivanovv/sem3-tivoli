<?php

function logged_in_redirect(){
    if(logged_in()){
        header('Location: index.php');
        exit();
    }
}
function protect_page(){
    if (!logged_in()){
        header('Location: protected.php');
        exit();
    }
}

function manager_page(){
    global $user_data;
    if (!has_access($user_data['user_id'], 'Manager')){
        header('Location: index.php');
        exit();
    }
}
function array_sanitize(&$item){
    $conn = getConnection();
    $item = htmlentities(strip_tags(mysqli_real_escape_string($conn, $item)));
}
function sanitize($data){
    $conn = getConnection();
    return htmlentities(strip_tags(mysqli_real_escape_string($conn, $data)));
}
function output_errors($errors){
    $output = array();
    foreach ($errors as $error) {
        $output[] = $error . '<br>';
    }
    return implode('', $output);
}
?>

