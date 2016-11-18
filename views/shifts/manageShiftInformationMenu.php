<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix">
            <h3 class="h3Fix">
                <span class="titleClass" style="width: 20% "> </span>
                <?php if (has_access($user_data['user_id'], 'Manager')) { ?>
                <a class='cancel_shift_glyphicon' style="float: right " href='#'>
                    <div class='glyphicon glyphicon-remove-circle'></div>
                </a>
                <a class='edit_shift_glyphicon'  href='#'>
                    <div class='glyphicon glyphicon-edit' style="float: right"></div>
                </a>
                <?php } ?>
                <button class="btn btn-success book-button" style="float: right">Book Now</button>
            </h3>
        </div>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#shift_information" aria-controls="shift_information" role="tab" data-toggle="tab">Shift Information</a></li>
                <li role="presentation"><a href="#shift_participants" aria-controls="shift_participants" role="tab" data-toggle="tab">Shift participants</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="shift_information">
                    <?php
                    include 'shiftDetails.php';
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="shift_participants">
                </div>
            </div>
        </div>
    </div>
</div>

