<?php
include '../../../init.php';

if (has_access($user_data['user_id'], 'Manager')){
    $result = array('success' => true);
}else {
    $result = array('success' => false);
}
echo json_encode($result);