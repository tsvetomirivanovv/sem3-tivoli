<?php
include '../../init.php';
$conn = getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = "SELECT * FROM users WHERE active = 1";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {

    if (user_online($row['user_id'])) {
        $row['dotColor'] = 'text-success';
        $row['dotClass'] = 'fa fa-circle';
        $row['isOnline'] = ' ONLINE';
        $accounts[] = $row;
    } else {
        $row['dotColor'] = 'text-danger';
        $row['dotClass'] = 'fa fa-circle-o';
        $row['isOnline'] = ' OFFLINE';
        $accounts[] = $row;
    }
}

$response = array('success' => true, 'accounts' => $accounts);

echo json_encode($response);