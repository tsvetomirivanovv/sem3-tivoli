<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix"><h3 class="h3Fix">Approve users</h3></div>
        <div>
            <?php
            $user_not_approved = user_not_approved();
            $suffix = ($user_not_approved != 1) ? 's' : '';
            ?>
            <div id="userCount">Tivoli Hotel &amp; Congress Center shift booking system has <span id="pendingUsers"><?php echo user_not_approved(); ?></span> pending member<span id="suffix_id"><?php echo $suffix; ?></span>.
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
    <div class="modal fade" id="approveUserModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Approve User</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to approve this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button id="approveButton" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="rejectUserModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reject User</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to reject this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button id="rejectButton" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                </div>
            </div>

        </div>
    </div>
</div>
