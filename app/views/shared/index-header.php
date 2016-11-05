<!DOCTYPE html>
<html>
<?php include 'views/shared/head.php'; ?>
<body>

<?php include 'views/shared/menu.php'; ?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php include 'views/site-description/description.php'; ?>
        <?php
        if (logged_in() === true){
            include 'views/login/logged-in.php';
        }else {
            include 'views/login/login.php';
        }
        ?>

    </div>
</div>

