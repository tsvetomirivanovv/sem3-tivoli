<?php
include 'manageShiftMenu.php';
?>

<!--<form id="createShiftForm">-->
<!--    <div class="label-input-container">-->
<!--        <label>Title</label>-->
<!--        <input type="text" maxlength="200" name="shiftTitle" required>-->
<!--    </div>-->
<!--    <div class="label-input-container">-->
<!--        <br><label>Begin</label>-->
<!--        <input type="datetime-local" name="shiftBeginDate" required>-->
<!--    </div>-->
<!--    <div class="label-input-container">-->
<!--        <br><label>End</label>-->
<!--        <input type="datetime-local" name="shiftEndDate" required>-->
<!--    </div>-->
<!--    <div class="label-input-container">-->
<!--        <br><label>Closing Booking</label>-->
<!--        <input type="datetime-local" name="shiftClosingDate" required>-->
<!--    </div>-->
<!--    <div class="label-input-container">-->
<!--        <br><label>Duty Manager</label>-->
<!--        <input type="text" maxlength="20" name="shiftDutyManager" required>-->
<!--    </div>-->
<!--    <div class="label-input-container">-->
<!--        <br><label>Category</label>-->
<!--        <input type="text" maxlength="15" name="shiftCategory" required>-->
<!--    </div>-->
<!--    <div class="label-input-container">-->
<!--        <br><label>Number of Participants</label>-->
<!--        <input type="number" minlength="1" maxlength="3" max="100" name="shiftParticipants" required>-->
<!--    </div>-->
<!--    <div>-->
<!--        <br><input type="submit" name="submit" value="Create">-->
<!--    </div>-->
<!--</form>-->

<form id="createShiftForm">

    <div class="form-group row">
        <label class="col-xs-2 text-center">Title:*</label>
        <div class="col-xs-2">
            <input class="form-control" type="text" placeholder="200 characters" name="shiftTitle" required ">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xs-2 text-center">Begin date:*</label>
        <div class="col-xs-2">
            <div class='input-group date' id='datetimepickerBegin'>
                <input class="form-control" type="text" name="ShiftBeginDate" required />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xs-2 text-center">End date:*</label>
        <div class="col-xs-2">
            <div class='input-group date' id='datetimepickerEnd'>
                <input class="form-control" type="text" name="ShiftEndDate" required />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xs-2 text-center">Closing booking date:*</label>
        <div class="col-xs-2">
            <div class='input-group date' id='datetimepickerClosing'>
                <input class="form-control" type="text" name="ShiftClosingDate" required />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xs-2 text-center">Duty manager:*</label>
        <div class="col-xs-2">
            <input class="form-control" type="text" placeholder="Name of the manager" name="shiftDutyManager"  required ">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xs-2 text-center">Category:*</label>
        <div class="col-xs-2">
            <select class="form-control" name="shiftCategory">
                <option>A-Waiter</option>
                <option>B-Waiter</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xs-2 text-center">Maximum participants:*</label>
        <div class="col-xs-2">
            <input class="form-control" type="number" minlength="1" maxlength="3" max="100" placeholder="1-100" name="shiftParticipants"  required ">
        </div>
    </div>

    <div>
        <div class="col-xs-2 text-center">
            <input class="btn btn-default btn-wide " type="submit" name="submit" value="Create">
        </div>
    </div>

</form>
