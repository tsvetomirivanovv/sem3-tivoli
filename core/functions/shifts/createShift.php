<?php

// GET DB CONNECTION
require '../../database/connect.php';
$conn = getConnection();
// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
// CHECK FOR INPUT
if (isset(
    $_POST['shiftTitle'],
    $_POST['shiftBeginDate'],
    $_POST['shiftEndDate'],
    $_POST['shiftClosingDate'],
    $_POST['shiftDutyManager'],
    $_POST['shiftCategory'],
    $_POST['shiftParticipants']

)){
    // ASSIGN INPUT TO VARIABLES
    $nonSanitizedTitle = $_POST['shiftTitle'];
    $nonSanitizedDutyManager = $_POST['shiftDutyManager'];
    $nonSanitizedCategory = $_POST['shiftCategory'];

    // SANITIZE SPECIFIC VARIABLES
    $sanitizedTitle = sanitizeString($conn,$nonSanitizedTitle);
    $sanitizedDutyManager = sanitizeString($conn,$nonSanitizedDutyManager);
    $sanitizedCategory = sanitizeString($conn,$nonSanitizedCategory);

    $beginDate = $_POST['shiftBeginDate'];
    $endDate = $_POST['shiftEndDate'];
    $closingDate = $_POST['shiftClosingDate'];
    $participants = $_POST['shiftParticipants'];

    // BUILD QUERY
    $query = "INSERT INTO shifts (title,begin,end,close,duty_manager,category,max_participants) VALUES ('$sanitizedTitle', '$beginDate', '$endDate', '$closingDate', '$sanitizedDutyManager', '$sanitizedCategory', '$participants')";

    // EXECUTES QUERY
    $result = $conn->query($query);
}

// FUNCTION TO PREVENT HACKING
function sanitizeString($conn,$var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    $var = mysqli_real_escape_string($conn,$var);
    return $var;
}
