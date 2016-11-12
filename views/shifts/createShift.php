<div class="clearfix">
<div class="col-xs-9">
    <div class="col-xs-12">
        <h3></h3>
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
        </table>
            <span>
                <input id="createShift" type="submit" value="Create" class="btn"/>
            </span>
        </form>
    </div>
</div>
</div>
