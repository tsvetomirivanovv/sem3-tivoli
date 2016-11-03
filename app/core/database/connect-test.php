<?php
    function db () {
        static $conn;
        if ($conn === NULL) {
            $conn = mysqli_connect ("us-cdbr-iron-east-04.cleardb.net", "b425f6afed6ada", "26949b50", "heroku_0aa5c6c86caaf55");
        }
        return $conn;
    }
?>
