<?php

require '../../database/connect.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


if (isset($_POST['shift_title_value'])) {

    $title = $_POST['shift_title_value'];

// BUILD QUERY
    $query = "SELECT * FROM shifts WHERE title = '$title' ";

// EXECUTES QUERY
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $shifts[] = $row;
    }

    $response = array('success' => true, 'shifts' => $shifts);
    echo json_encode($response);


}

