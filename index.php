<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Homepage - Tivoli app</title>

        <link href="../bundle/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../bundle/flat-ui/dist/css/flat-ui.min.css" rel="stylesheet">
        <link href="../bundle/growl/stylesheets/jquery.growl.css" rel="stylesheet">
        <link href="../dist/app.min.css" rel="stylesheet">
        <script src="./dist/vendor.js" charset="utf-8"></script>
        <script src="./dist/app.min.js" charset="utf-8"></script>

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
