<?php
include '../../init.php';

if(isset($_POST['account_id'])){
    reject_account($_POST['account_id']);
} else {
    $errors[] = 'Data not provided!';
}
if (!empty($_POST) && empty($errors)) {
    $result = array('success' => true, 'message' => 'User rejected successfully!');
} else {
    $result = array('success' => false, 'message' => output_errors($errors));
}

echo json_encode($result);

?>