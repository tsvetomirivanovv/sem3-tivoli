<?php

    require 'app/core/init.php';

    $result = $conn->query("SELECT * FROM tmp_users");

    print '<pre>';
    print_r(mysqli_fetch_all($result));


?>
