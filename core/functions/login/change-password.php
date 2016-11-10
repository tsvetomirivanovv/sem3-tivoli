<?php
include '../../init.php';

if (!empty($_POST)) {
    $required_fields = array('current_pass', 'new_pass', 'confirm_pass');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields)) {
            $errors[] = 'You have to fill all fields';
            break 1;
        }
    }
    if (md5($_POST['current_pass']) === $user_data['password']) {
        if (trim($_POST['new_pass']) !== trim($_POST['confirm_pass'])) {
            $errors[] = 'The passwords do not match';
        } else if (strlen($_POST['new_pass']) < 6) {
            $errors[] = 'Your password must be at least 6 characters';
        }
    } else {
        $errors[] = 'Your current password is incorrect';
    }
}

if (!empty($_POST) && empty($errors)) {
    $result = array('success' => true, 'message' => 'You successfully changed your password!');
    change_password($session_user_id, $_POST['new_pass']);
} else {
    $result = array('success' => false, 'message' => output_errors($errors));
}

echo json_encode($result);

?>