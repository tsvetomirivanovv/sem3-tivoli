<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix"><h3 class="h3Fix">Approve users</h3></div>
        <div>
            <?php
            $user_not_approved = user_not_approved();
            $suffix = ($user_not_approved != 1) ? 's' : '';
            ?>
            <div id="userCount">Tivoli Hotel &amp; Congress Center shift booking system has <?php echo user_not_approved(); ?> pending member<?php echo $suffix; ?>.
            </div>
        </div>
        <table id="approveTable" class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="row" style="width: 13%;"></th>
                <th style="width: 20%;">Name</th>
                <th style="width: 25%;">E-mail</th>
                <th style="width: 20%;">CV</th>
            </tr>
            </thead>
            <tbody id="tableBodyApprove">
            </tbody>
        </table>
    </div>
</div>