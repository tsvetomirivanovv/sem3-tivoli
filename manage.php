<?php
include 'core/init.php';
protect_page();
manager_page();
include 'views/shared/header.php';
?>

<!-- CONTENT -->
<div class="container">
    <div class="row">
        <?php
        if (logged_in() === true){
            include 'views/profile/approve-accounts.php';
            include 'views/shifts/shift-calendar.php';
        } else {
            include 'views/login/description.php';
            include 'views/login/login.php';
        }
        ?>
    </div>
</div>

<?php include 'views/shared/footer.php'; ?>
