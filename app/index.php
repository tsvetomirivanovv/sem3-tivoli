<?php
    include 'core/init.php';
    include 'views/shared/index-header.php';
?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php
        if (logged_in() === true){
            include 'views/shifts/shifts.php';
            include 'views/login/logged-in.php';
        } else {
            include 'views/login/description.php';
            include 'views/login/login.php';
        }
        ?>
    </div>

</div>

<?php include 'views/shared/index-footer.php'; ?>
