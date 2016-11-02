<form method="post" action="createShift.php">

    <div class="label-input-container">
        <label>Title</label>
        <input type="text" maxlength="25" name="shiftTitle">
    </div>

    <div class="label-input-container">
        <br><label>Begin</label>
        <input type="text" name="shiftBeginDate">
    </div>

    <div class="label-input-container">
        <br><label>End</label>
        <input type="datetime-local" name="shiftEndDate">
    </div>

    <div class="label-input-container">
        <br><label>Closing Booking</label>
        <input type="datetime-local" name="shiftClosingDate">
    </div>

    <div class="label-input-container">
        <br><label>Duty Manager</label>
        <input type="text" maxlength="20" name="shiftDutyManager">
    </div>

    <div class="label-input-container">
        <br><label>Category</label>
        <input type="text" maxlength="15" name="shiftCategory">
    </div>

    <div class="label-input-container">
        <br><label>Number of Participants</label>
        <input type="number" max="60" name="shiftParticipants">
    </div>

    <div class="submit">
        <br><input type="submit" value="Create">
    </div>
    
</form>