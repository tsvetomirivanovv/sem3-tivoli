<?php

require '../../database/connect.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_POST['shift_id'])) {

    $id = $_POST['shift_id'];

    // BUILD QUERY
    $query = "UPDATE shifts set canceled = 1 WHERE shift_id = '$id' ";
    // EXECUTES QUERY
    $result = $conn->query($query);

    if($result) {
        $response = array('success' => true, 'message' => 'The shift has been canceled successfully!');
    }
} else {
    $response = array('success' => false, 'message' => 'Something went wrong!');
}

echo json_encode($response);
