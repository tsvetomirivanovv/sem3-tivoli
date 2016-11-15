<?php

require '../../database/connect.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


if (isset($_POST['shift_id_value'])) {

    $id = $_POST['shift_id_value'];

// BUILD QUERY
    $query = "SELECT * FROM shifts WHERE shift_id = '$id' ";

// EXECUTES QUERY
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $shifts[] = $row;
    }

    $response = array('success' => true, 'shifts' => $shifts);
    echo json_encode($response);


}

