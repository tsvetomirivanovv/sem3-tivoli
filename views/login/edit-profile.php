<div class="col-xs-9">
    <div class="col-xs-7">
        <h3>Edit profile</h3>
        <table>
            <tr class="spaceUnder">
                <td><label for="edit_first_name">First Name*</label></td>
                <td><input type="text" class="form-control" value="<?php echo $user_data['first_name']; ?>"
                           name="edit_first_name"
                           id="edit-first-name"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_last_name">Last Name</label></td>
                <td><input type="text" class="form-control" value="<?php echo $user_data['last_name']; ?>"
                           name="edit_last_name"
                           id="edit-last-name"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_email">Email*</label></td>
                <td><input type="text" class="form-control" value="<?php echo $user_data['email']; ?>"
                           name="edit_email"
                           id="edit-email"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_phone">Mobile nr*</label></td>
                <td><input type="text" class="form-control" value="<?php echo $user_data['phone']; ?>"
                           name="edit_phone"
                           id="edit-phone"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_address">Address</label></td>
                <td><input type="text" class="form-control" value="<?php echo $user_data['address']; ?>"
                           name="edit_address"
                           id="edit-address"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_zip_code">Zip Code</label></td>
                <td><input type="text" class="form-control" value="<?php echo $user_data['zip_code']; ?>"
                           name="edit_zip_code"
                           id="edit-zip-code"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_city">City</label></td>
                <td><input type="text" class="form-control" value="<?php echo $user_data['city']; ?>"
                           name="edit_city"
                           id="edit-city"/></td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_cv">CV</label></td>
                <td>
                    <div class="form-control">
                        <script type="text/javascript" src="//api.filestackapi.com/filestack.js"></script>
                        <input type="filepicker" name="edit_cv" id="edit-cv" data-fp-button-text="Choose file" data-fp-button-class="customUploader" data-fp-apikey="AdqLfcsUSRWZiP8XVuUgAz" data-fp-mimetypes="*/*" data-fp-container="modal" data-fp-services="COMPUTER" onchange="getFileLink(event.fpfile.url, 'edit-cv')">
                        <p class="fileName" id="edit-cv-link">
                            <?php if(isset($user_data['cv'])) { echo $user_data['cv']; } else { echo 'No file chosen'; } ?>
                        </p>
                    </div>
                </td>
            </tr>
            <tr class="spaceUnder">
                <td><label for="edit_profile_picture">Profile Picture</label></td>
                <td> <div class="form-control">
                           <input type="filepicker" name="edit_profile_picture" id="edit-profile-picture" data-fp-button-text="Choose file" data-fp-button-class="customUploader" data-fp-apikey="AdqLfcsUSRWZiP8XVuUgAz" data-fp-mimetypes="image/*" data-fp-container="modal" data-fp-services="COMPUTER" onchange="getFileLink(event.fpfile.url, 'edit-profile-picture')">
                           <p class="fileName" id="edit-profile-picture-link">
                               <?php if(isset($user_data['profile_picture'])) { echo $user_data['profile_picture']; } else { echo 'No file chosen'; } ?>
                           </p>
                       </div>
                </td>
            </tr>
            <tr class="spaceUnder">
                <td><label>User status</label></td>
                <td><i>(You are not authorized to change status.)</i></td>
            </tr>
        </table>
        <span>
            <input id="updateAccount" type="submit" value="Update Account" class="btn"/>
            <input id="cancelUpdateAccount" type="submit" value="Cancel" class="btn"/>
        </span>
    </div>
    <div class="col-xs-4">
        <img class="profilePicture" src="<?php echo $user_data['profile_picture']; ?>" alt="" />
    </div>
</div>
