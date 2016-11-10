<?php
include '../../init.php';

if (empty($_POST['email_address'])) {
    $errors[] = 'You need to enter email';
} else {
    if (isset($_POST['email_address'])) {
        if (email_exists($_POST['email_address'])) {
            recover($_POST['email_address']);
        } else {
            $errors[] = 'We couldn\'t find that email address!';
        }
    }
}

if (!empty($_POST['email_address']) && empty($errors)) {
    $result = array('success' => true, 'message' => 'We have send you a recovery link!');
} else {
    $result = array('success' => false, 'message' => output_errors($errors));
}

echo json_encode($result);
?>

