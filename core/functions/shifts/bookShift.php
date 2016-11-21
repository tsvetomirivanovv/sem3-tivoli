<?php
// GET DB CONNECTION
include "../../init.php";
$conn = getConnection();
// CHECK IF THERE IS ERROR
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if (isset(
    $_POST['user_id'],
    $_POST['shift_id'],
    $_POST['current_date']
)){

    $user_id = $_POST['user_id'];
    $shift_id = $_POST['shift_id'];
    $current_date = $_POST['current_date'];

    // INSERT BOOKING IN THE DB
    $query = "INSERT INTO participants (shift_id,user_id,date_of_booking) VALUES ('$shift_id','$user_id','$current_date')";
    $result = $conn->query($query);

    // GET USER EMAIL
    $query2 = "SELECT email FROM users WHERE user_id ='$user_id'";
    $result2 = $conn->query($query2);
    while ($row = mysqli_fetch_assoc($result2)) {
        $user_email = $row["email"];
    }
    $subject = "Booked Shift!";

    // GET SHIFT DETAILS AND SEND EMAIL
    $query3 = "SELECT * FROM shifts WHERE shift_id = '$shift_id'";
    $result3 = $conn->query($query3);
    while($row = mysqli_fetch_assoc($result3)){
        $shift_being_date = $row['begin'];
        $shift_title_name = $row['title'];
        $message = "You successfully booked the shfit: "."$shift_title_name"." Please be at work 5 mintues before ".$shift_being_date;
    }
    sendMail($user_email,$subject,$message);
}

