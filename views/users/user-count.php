<div class="col-xs-3">
    <h2>Users</h2>
    <?php
    $user_count = user_count();
    $suffix = ($user_count != 1) ? 's' : '';
    ?>
    We currently have <?php echo user_count();?> registered user<?php echo $suffix; ?>.
</div>