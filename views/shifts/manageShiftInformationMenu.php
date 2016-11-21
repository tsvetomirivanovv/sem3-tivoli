<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix">
            <h3 class="h3Fix">
                <span class="titleClass" style="width: 20% "> </span>
                <?php if (has_access($user_data['user_id'], 'Manager')) { ?>
                <div class="buttonsWrapper" style="float: right ">
                    <a class='cancel_shift_glyphicon cancelShiftBtn' style="float: right " data-toggle='modal' data-target='#cancelShift'></a>
                    <a class='edit_shift_glyphicon openUpdateSelectedShift' data-toggle='modal' data-target='#updateShift'>
                        <div class='glyphicon glyphicon-edit' style="float: right"></div>
                    </a>
                </div>
                <?php } ?>
                <button class="btn btn-success book-button" <?php booking_exists() ?> value="<?php echo $_SESSION ['user_id'] ?>" >Book Now</button>
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
                    <?php
                    include 'participantsList.php';
                    ?>
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
                <input type="submit" value="Confirm" class="btn btn-block btn-lg btn-default cancelSelectedShiftButton"
                       data-dismiss="modal"/>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="updateShift" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update shift</h4>
            </div>
            <div class="modal-body" >
                <form id="createShiftForm">
                <table>
                    <tr class="spaceUnder">
                        <td><label>Title*</label></td>
                        <td><input type="text" class="form-control" name="shiftTitle" id="shift-title" maxlength="200" placeholder="200 characters" required/></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><label>Begin date*</label></td>
                        <td><div class='input-group date'>
                                <input type="text" class="form-control" name="shiftBeginDate" id="shift-begin-date" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><label>End date*</label></td>
                        <td><div class='input-group date'>
                                <input type="text" class="form-control" name="shiftEndDate" id="shift-end-date" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><label>Closing date*</label></td>
                        <td><div class='input-group date'>
                                <input type="text" class="form-control" name="shiftClosingDate" id="shift-closing-date" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><label for="edit_address">Duty manager*</label></td>
                        <td><input type="text" class="form-control" name="shiftDutyManager" id="shift-duty-manager" maxlength="50" placeholder="Name of the manager" required/></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><label>Category*</label></td>
                        <td> <select  class="form-control" name="shiftCategory" id="shift-category" required>
                                <option>A-Waiter</option>
                                <option>B-Waiter</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><label for="edit_city">Maximum participants*</label></td>
                        <td><input type="number" class="form-control" name="shiftParticipants" id="shift-participants" minlength="1" maxlength="3" max="100" placeholder="1-100" required></td>
                    </tr>
                    <tr class="spaceUnder">
                        <td><label>Canceled*</label></td>
                        <td> <select  class="form-control" name="shiftCanceled" id="shift-canceled" required>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </td>
                    </tr>
                </table>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Confirm" class="btn btn-block btn-lg btn-default updateSelectedShiftBtn"
                       data-dismiss="modal"/>
            </div>
        </div>

    </div>
</div>
