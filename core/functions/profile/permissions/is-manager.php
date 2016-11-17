<?php
include '../../../init.php';

function is_manager($user_id, $type){
    $conn = getConnection();
    $user_id = (int)$user_id;
    $type = sanitize($type);
    $query = mysqli_query($conn, "SELECT COUNT(user_id) FROM users WHERE user_id = '$user_id' AND type='$type'");
    $row = mysqli_fetch_assoc($query);
    return ($row['COUNT(user_id)'] == 1) ? true : false;
}
if (is_manager($user_data['user_id'], 'Manager')){
    $result = array('success' => true);
}else {
    $result = array('success' => false);
}
echo json_encode($result);