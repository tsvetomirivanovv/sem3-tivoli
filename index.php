<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Homepage - Tivoli app</title>

        <link href="../vendor/Flat-UI/dist/css/flat-ui.min.css" rel="stylesheet">
        <link href="../vendor/Flat-UI/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>

        <?php require 'views/shared/menu.php'; ?>

        <!-- CONTENT -->
        <div class="container">
            <div class="row">

                <h2>content</h2>

                <?php
                    $loggedin = false;

                    if($loggedin) {
                        require 'views/shifts/shifts.php';
                    } else {
                        require 'views/login/login.php';
                    }
                ?>

                <div class="col-xs-3">
                    <h2>sidebar</h2>

                    <?php

                        require 'core/init.php';

                        $result = $conn->query("SELECT * FROM tmp_users");

                        print '<pre>';
                        print_r(mysqli_fetch_all($result));


                    ?>
                </div>
            </div>
        </div>

        <!-- footer -->
        <!-- <div class="container">
            <div class="row">

            </div>
        </div> -->
    </body>
</html>
