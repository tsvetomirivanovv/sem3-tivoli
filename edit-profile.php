<?php
include 'core/init.php';
protect_page();
if(isset($_GET['username']) && !empty($_GET['username'])) {
    $username = $_GET['username'];
    if(user_exists($username)) {
        $user_id = user_id_from_username($username);
        $profile_data = user_data($user_id, 'user_id', 'username', 'first_name', 'last_name', 'email', 'phone', 'address', 'zip_code', 'city', 'cv', 'profile_picture', 'password_recover', 'type' , 'online_status');
    } else {
        // TODO
        /* Change protect_page() to accept a parameter so that you can pass an error message. */
        echo 'Sorry, that user doesn\'t exists!';
    }
} else {
    header('Location: index.php');
    exit();
}
include 'views/shared/header.php';
?>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <?php
            include 'views/profile/edit-profile.php';
            include 'views/login/logged-in.php';
            ?>
        </div>
    </div>

<?php include 'views/shared/footer.php'; ?>