<?php
/*if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}*/
    error_reporting(E_ALL);
    require 'app/core/init.php';

    $result = $conn->query("SELECT * FROM users");

    print '<pre>';
    print_r(mysqli_fetch_all($result));

?>
