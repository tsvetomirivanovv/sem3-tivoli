<?php
include 'core/init.php';
logged_in_redirect();
include 'views/shared/header.php';
?>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <?php
                include 'views/login/description.php';
                include 'views/login/login.php';
            ?>
        </div>
    </div>

<?php include 'views/shared/footer.php'; ?>