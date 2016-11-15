<?php
include 'core/init.php';
protect_page();
include 'views/shared/header.php';
include 'core/functions/profile/profile-page.php';
?>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <?php
            include 'views/profile/profile-page.php';
            include 'views/login/shift-calendar.php';
            ?>
        </div>
    </div>

<?php include 'views/shared/footer.php'; ?>