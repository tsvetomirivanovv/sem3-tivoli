<?php

require '../../database/connect.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
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
if (isset($_POST['shift_id_value'])) {

    $id = $_POST['shift_id_value'];

    // BUILD QUERY
    $query = "SELECT * FROM shifts WHERE shift_id = '$id' ";
    // EXECUTES QUERY
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $shifts[] = $row;
    }
    foreach ($shifts as $index => $shift) {
        $shifts[$index]['shift_id'] = (int)$shifts[$index]['shift_id'];
        $shifts[$index]['max_participants'] = (int)$shifts[$index]['max_participants'];
        $shifts[$index]['participants'] =  (int)getParticipantsByShiftId($shift['shift_id']);
        $shifts[$index]['participants_perc'] = (100*(int)$shifts[$index]['participants'])/(int)$shifts[$index]['max_participants'];
    }

    $response = array('success' => true, 'shifts' => $shifts);
    echo json_encode($response);
}

