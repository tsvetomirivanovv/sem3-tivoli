<div class="col-xs-9">
    <div class="jumbotron" id="jumbo">
        <div class="page-header" id="map"><h3 id="usersH3">All Users</h3></div>
        <div class="col-sm-9">
            <?php
                $user_count = user_count();
                $suffix = ($user_count != 1) ? 's' : '';
            ?>
            <div id="userCount">Tivoli Hotel &amp; Congress Center shift booking system has <?php echo user_count(); ?>
                registered member<?php echo $suffix; ?>.
            </div>
        </div>
        <table id="usersTable" class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="row" style="width: 13%;"></th>
                <th style="width: 20%;">Name</th>
                <th style="width: 25%;">E-mail</th>
                <th style="width: 20%;">Status</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            </tbody>
        </table>
    </div>
</div>