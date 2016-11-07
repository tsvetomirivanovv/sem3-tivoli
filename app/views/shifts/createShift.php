

<form id=" createShiftForm">

    <div class="label-input-container">
        <label>Title</label>
        <input type="text" maxlength="200" name="shiftTitle" required>
    </div>

    <div class="label-input-container">
        <br><label>Begin</label>
        <input type="datetime-local" name="shiftBeginDate" required>
    </div>

    <div class="label-input-container">
        <br><label>End</label>
        <input type="datetime-local" name="shiftEndDate" required>
    </div>

    <div class="label-input-container">
        <br><label>Closing Booking</label>
        <input type="datetime-local" name="shiftClosingDate" required>
    </div>

    <div class="label-input-container">
        <br><label>Duty Manager</label>
        <input type="text" maxlength="20" name="shiftDutyManager" required>
    </div>

    <div class="label-input-container">
        <br><label>Category</label>
        <input type="text" maxlength="15" name="shiftCategory" required>
    </div>

    <div class="label-input-container">
        <br><label>Number of Participants</label>
        <input type="number" minlength="1" maxlength="3" max="100" name="shiftParticipants" required>
    </div>

    <div>
        <br><input type="submit" name="submit" value="Create">
    </div>
    
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../core/functions/shifts/shifts.js"></script>