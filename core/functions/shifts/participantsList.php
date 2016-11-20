<?php
require '../../database/connect.php';
$conn = getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = "SELECT users.user_id, participants.shift_id,  users.first_name, users.last_name, users.phone,
		participants.date_of_booking, shifts.max_participants
	FROM users
    JOIN participants
		ON participants.user_id = users.user_id
	JOIN shifts
		ON participants.shift_id = shifts.shift_id";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $participants[] = $row;
}

$response = array('success' => true, 'participants' => $participants );
echo json_encode($response);