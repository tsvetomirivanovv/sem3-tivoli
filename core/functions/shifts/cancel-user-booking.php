<?php
include '../../init.php';

if(isset($_POST['user_id']) && isset($_POST['shift_id'])){
    cancel_user_booking($_POST['user_id'], $_POST['shift_id']);
} else {
    $errors[] = 'Data not provided!';
}
if (!empty($_POST) && empty($errors)) {
    $result = array('success' => true, 'message' => 'You successfully canceled the user booking!');
} else {
    $result = array('success' => false, 'message' => output_errors($errors));
}

echo json_encode($result);

?>