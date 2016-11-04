<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Homepage - Tivoli app</title>

        <link href="../../vendor/Flat-UI/dist/css/flat-ui.min.css" rel="stylesheet">
        <link href="../../vendor/Flat-UI/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>

        <?php require 'views/shared/menu.php'; ?>

        <!-- CONTENT -->
        <div class="container">
            <div class="row">

                <?php
                    $loggedin = false;

                    if($loggedin) {
                        require 'views/shifts/shiftCards.php';
                    } else {
                        require 'views/login/login.php';
                    }
                ?>

                <div class="col-xs-3">
                    sidebar
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
