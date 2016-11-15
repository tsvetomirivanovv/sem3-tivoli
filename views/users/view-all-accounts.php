<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix"><h3 class="h3Fix">All Users</h3></div>
        <div>
            <?php
                $user_count = user_count();
                $suffix = ($user_count != 1) ? 's' : '';
            ?>
            <div id="userCount">Tivoli Hotel &amp; Congress Center shift booking system has <?php echo user_count(); ?> registered member<?php echo $suffix; ?>.
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