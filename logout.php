<?php
include 'core/init.php';
change_online_status($_SESSION['user_id'], 0);
session_start();
session_destroy();
header('location:index.php');
?>
