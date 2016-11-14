<?php
include '../../init.php';

if (!empty($_POST)) {
    $required_fields = array('edit_first_name', 'edit_email', 'edit_phone');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields)) {
            $errors[] = 'You have to fill all fields marked with *';
            break 1;
        }
    }

    if (!filter_var($_POST['edit_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email address is required.';
    } else if (email_exists($_POST['edit_email']) && $user_data['email'] !== $_POST['edit_email']) {
        $errors[] = 'Sorry, the email \'' . $_POST['edit_email'] . '\' is already in use';
    }
}
if (!empty($_POST) && empty($errors)) {
    $update_data = array(
        'first_name' => $_POST['edit_first_name'],
        'last_name' => $_POST['edit_last_name'],
        'email' => $_POST['edit_email'],
        'phone' => $_POST['edit_phone'],
        'address' => $_POST['edit_address'],
        'zip_code' => $_POST['edit_zip_code'],
        'city' => $_POST['edit_city'],
        'type' => $_POST['edit_user_type']
    );
    if(!empty($_POST['edit_cv'])){
        $update_data['cv'] = $_POST['edit_cv'];
    }
    if (!empty($_POST['edit_profile_picture'])){
        $update_data['profile_picture'] = $_POST['edit_profile_picture'];
    }
    $result = array('success' => true, 'message' => 'You successfully updated your account!');
    update_user_profile($update_data);
} else {
    $result = array('success' => false, 'message' => output_errors($errors));
}
echo json_encode($result);
?>