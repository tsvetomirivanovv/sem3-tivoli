<?php
include '../../init.php';
$conn = getConnection();

// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if (isset($_POST['shift_id_value'])) {

    $id = $_POST['shift_id_value'];

    // BUILD QUERY
    $query = "SELECT * FROM shifts WHERE shift_id = '$id' ";
    // EXECUTES QUERY
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $row['participants'] =  (int)getParticipantsByShiftId($row['shift_id']);
    $row['participants_perc'] = (100*(int)$row['participants'])/(int)$row['max_participants'];

    if($row) {
        $response = array('success' => true, 'shift' => $row);
    } else {
        $response = array('success' => false);
    }
    echo json_encode($response);
}