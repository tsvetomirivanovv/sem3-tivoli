<?php

require '../../database/connect.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if (isset($_POST)) {

    $id = $_POST['shift_id'];
    $title = $_POST['title'];
    $begin = $_POST['begin'];
    $end = $_POST['end'];
    $close = $_POST['close'];
    $duty_manager = $_POST['duty_manager'];
    $category = $_POST['category'];
    $max_participants = $_POST['max_participants'];
    $canceled = $_POST['canceled'];

    // BUILD QUERY
    $query = "UPDATE shifts SET title='$title', begin='$begin', end='$end', close='$close', duty_manager='$duty_manager', category='$category', max_participants=$max_participants, canceled=$canceled WHERE shift_id = '$id' ";

    //print $query;
    //die;
    // EXECUTES QUERY
    $result = $conn->query($query);

    if($result) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false);
    }


    echo json_encode($response);
}
