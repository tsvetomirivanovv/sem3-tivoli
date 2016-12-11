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

if (isset(
    $_POST['shift_id_value'],
    $_POST['current_time_value']
)) {
    session_start();
    $_SESSION['shift_session_id'] = $_POST['shift_id_value'];
    $_SESSION['current_time_value'] = $_POST['current_time_value'];
}


function booking_exists(){
    $conn = getConnection();
    $shift_id = $_SESSION['shift_session_id'];
    $user_id = $_SESSION['user_id'];
    $currentTime = $_SESSION['current_time_value'];

    // CHECK IF THE CURRENT DATE IS PAST THE CLOSING DATE
    $query2 = "SELECT close FROM shifts WHERE shift_id = '$shift_id'";
    $result2 = $conn->query($query2);
    while ($row = mysqli_fetch_assoc($result2)) {
        $closeDate = $row["close"];
        if (strtotime($currentTime)>strtotime($closeDate)){
            $canBook = false;
        } else {
            $canBook = true;
        }
    }

    // CHECK IF BOOKIG EXISTS AND IF THE CURRENT DATE IS PAST CLOSING DATE
    $query = "SELECT * FROM participants WHERE shift_id = '$shift_id' AND user_id = '$user_id' ";
    $result = $conn->query($query);
    if($result->num_rows == 0 && $canBook==true){
        echo "style=\"float:right\"";
    } else {
        echo "style=\"float:right; display: none\"";
    }
}

?>

