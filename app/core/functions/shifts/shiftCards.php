<?php

// GET DB CONNECTION
require '../../database/connect.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// BUILD QUERY
$query = "SELECT * FROM shifts";

// EXECUTES QUERY
$result = $conn->query($query);

// WHILE THERE ARE ROWS IN THE TABLE, FETCH THEM AND ECHO BACK HTML ELEMENTS
while ($row = $result->fetch_assoc()) {
    $shifts[] = $row;
}

$response = array('success' => true, 'shifts' => $shifts );
echo json_encode($response);
