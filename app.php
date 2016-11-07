<?php
    error_reporting(E_ALL);
    require 'app/core/init.php';
    $conn = getConnection();
    $result = $conn->query("SELECT * FROM users");

    print '<pre>';
    print_r(mysqli_fetch_all($result));

?>
