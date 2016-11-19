<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix">
            <h3 class="h3Fix">
                <span class="titleClass" style="width: 20% "> </span>
                <a class='cancel_shift_glyphicon cancelShiftBtn' style="float: right " data-toggle='modal' data-target='#cancelShift'></a>
                <a class='edit_shift_glyphicon'  href='#'>
                    <div class='glyphicon glyphicon-edit' style="float: right"></div>
                </a>
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

<div class="modal fade" id="cancelShift" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cancel shift</h4>
            </div>
            <div class="modal-body" >
                <p>
                    Are you sure you want to cancel this shift?
                </p>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Confirm" class="btn btn-block btn-lg btn-default cancelShiftButton"
                       data-dismiss="modal"/>
            </div>
        </div>

    </div>
</div>
