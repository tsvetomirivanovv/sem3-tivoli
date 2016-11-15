<?php
include '../../init.php';
$conn = getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = "SELECT * FROM users WHERE active = 0";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $accounts[] = $row;
}

$response = array('success' => true, 'accounts' => $accounts);

echo json_encode($response);