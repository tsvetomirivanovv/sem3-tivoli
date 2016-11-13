<div class="col-xs-3">
    <h3>Hello, <?php echo $user_data['first_name']; ?>!</h3>
    <ul>
        <li>
            <a href="/logout.php">Log out</a>
        </li>
        <li>
            <a href="change-password.php">Change Password</a>
        </li>
        <li>
            <a href="edit-profile.php?username=<?php echo $user_data['username'];?>">Edit Profile</a>
        </li>
        <li>
            <a href="view-all-accounts.php">Users</a>
        </li>
        <li>
            <a href="profile-page.php?username=<?php echo $user_data['username'];?>">Profile</a>
        </li>
    </ul>
</div>
