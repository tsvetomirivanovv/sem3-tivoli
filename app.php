<?php
    error_reporting(E_ALL);
    require 'app/core/init.php';

    $result = $conn->query("SELECT * FROM users");

    print '<pre>';
    print_r(mysqli_fetch_all($result));

?>
