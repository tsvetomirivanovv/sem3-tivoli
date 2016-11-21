<?php
include '../../init.php';
// GET DB CONNECTION
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

foreach ($shifts as $index => $shift) {
    $shifts[$index]['shift_id'] = (int)$shifts[$index]['shift_id'];
    $shifts[$index]['max_participants'] = (int)$shifts[$index]['max_participants'];
    $shifts[$index]['participants'] =  (int)getParticipantsByShiftId($shift['shift_id']);
    $shifts[$index]['participants_perc'] = (100*(int)$shifts[$index]['participants'])/(int)$shifts[$index]['max_participants'];
}

$response = array('success' => true, 'shifts' => $shifts );
echo json_encode($response);
