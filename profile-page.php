<?php
include 'core/init.php';
protect_page();
include 'views/shared/header.php';
include 'core/functions/login/profile-page.php';
?>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <?php
            include 'views/login/profile-page.php';
            include 'views/login/logged-in.php';
            ?>
        </div>
    </div>

<?php include 'views/shared/footer.php'; ?>