<div class="col-xs-9">
    <div class="col-xs-7">
        <h3>Edit profile</h3>
        <table>
            <tr class="spaceUnder">
                <td><label for="edit_first_name">First Name*</label></td>
                <td><input type="text" class="form-control" value="<?php echo $profile_data['first_name']; ?>"
                           name="edit_first_name"
                           id="edit-first-name"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_last_name">Last Name</label></td>
                <td><input type="text" class="form-control" value="<?php echo $profile_data['last_name']; ?>"
                           name="edit_last_name"
                           id="edit-last-name"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_email">Email*</label></td>
                <td><input type="text" class="form-control" value="<?php echo $profile_data['email']; ?>"
                           name="edit_email"
                           id="edit-email"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_phone">Mobile nr*</label></td>
                <td><input type="text" class="form-control" value="<?php echo $profile_data['phone']; ?>"
                           name="edit_phone"
                           id="edit-phone"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_address">Address</label></td>
                <td><input type="text" class="form-control" value="<?php echo $profile_data['address']; ?>"
                           name="edit_address"
                           id="edit-address"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_zip_code">Zip Code</label></td>
                <td><input type="text" class="form-control" value="<?php echo $profile_data['zip_code']; ?>"
                           name="edit_zip_code"
                           id="edit-zip-code"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_city">City</label></td>
                <td><input type="text" class="form-control" value="<?php echo $profile_data['city']; ?>"
                           name="edit_city"
                           id="edit-city"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_cv">CV</label></td>
                <td><input type="file" class="form-control" name="edit_cv" id="edit-cv"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_profile_picture">Profile Picture</label></td>
                <td><input type="file" class="form-control" name="edit_profile_picture"
                           id="edit-profile-picture"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit-user-type">User status</label></td>
                <td>
                    <select class="select" id="edit-user-type" name="edit_user_type">
                        <option value="A-Waiter">A-Waiter</option>
                        <option value="B-Waiter">B-Waiter</option>
                        <option value="Manager">Manager</option>
                    </select>
                </td>
            </tr>
        </table>

        <span>
            <input id="updateAccount" type="submit" value="Update Account" class="btn"/>
            <input id="cancelUpdateAccount" type="submit" value="Cancel" class="btn"/>
        </span>
    </div>
</div>
