<?php

// GET DB CONNECTION
require '../../database/connect.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset($_POST['user_id'])) {

    $user_id = $_POST['user_id'];
}

$query = "SELECT * FROM shifts WHERE shift_id IN (SELECT shift_id FROM participants WHERE user_id = '$user_id')";

// EXECUTES QUERY
$result = $conn->query($query);

// WHILE THERE ARE ROWS IN THE TABLE, FETCH THEM AND ECHO BACK HTML ELEMENTS
while ($row = $result->fetch_assoc()) {
    $shifts[] = $row;
}

foreach ($shifts as $index => $shift) {
    $shifts[$index]['shift_id'] = (int)$shifts[$index]['shift_id'];
    $shifts[$index]['max_participants'] = (int)$shifts[$index]['max_participants'];
    $shifts[$index]['participants'] =  (int)getParticipantsByShiftId($shift['shift_id']);
    $shifts[$index]['participants_perc'] = (100*(int)$shifts[$index]['participants'])/(int)$shifts[$index]['max_participants'];
}

function getParticipantsByShiftId($id) {
    $conn = getConnection();

    // BUILD QUERY
    $query = "SELECT count(*) AS participants FROM participants WHERE shift_id = " . $id . " ";

    // EXECUTES QUERY
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['participants'];
}

$response = array('success' => true, 'shifts' => $shifts );
echo json_encode($response);

