<?php
include "../../init.php";
$conn = getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if(isset($_POST['shift_id'])){
$shift_id = $_POST['shift_id'];
    $query = "SELECT users.user_id, participants.shift_id,  users.first_name, users.last_name, users.phone,
		                  participants.date_of_booking
	                      FROM users
                          JOIN participants
		                    ON participants.user_id = users.user_id
	                      JOIN shifts
		                    ON participants.shift_id = shifts.shift_id and shifts.shift_id='$shift_id'";

    $result = $conn->query($query);
    while($row = $result->fetch_assoc()){
        $participants[] = $row;
    }
    $response = array('success' => true, 'participants' => $participants );
    echo json_encode($response);
} else {
    $errors[] = 'Data not provided!';
}
