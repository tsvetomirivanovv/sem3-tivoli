<?php
include 'core/init.php';
include 'views/shared/header.php';
?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php
        if (logged_in() === true){
            include 'views/shifts/createShift.php';
            include 'views/shifts/shiftCards.php';
            include 'views/login/logged-in.php';
        } else {
            include 'views/login/description.php';
            include 'views/login/login.php';
        }
        ?>
    </div>
</div>

<?php include 'views/shared/footer.php'; ?>
