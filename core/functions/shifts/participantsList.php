<?php
require '../../database/connect.php';
$conn = getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = "SELECT * FROM participants";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $participants[] = $row;
}

$response = array('success' => true, 'participants' => $participants );
echo json_encode($response);