<?php
include 'core/init.php';
include 'views/shared/header.php';
?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php
        if (logged_in() === true){
           header('Location: shifts.php');
        } else {
            include 'views/login/description.php';
            include 'views/login/login.php';
        }
        ?>
    </div>
</div>

<?php include 'views/shared/footer.php'; ?>
