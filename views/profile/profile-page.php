<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div style="border-radius: 10px;background: whitesmoke;">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td class="fieldCell" colspan="1" style="width: 25%;">
                        <img style="width:120px; height: 135px;" src="<?php echo $profile_data['profile_picture']; ?>"
                             alt="<?php echo $profile_data['first_name'] . ' ' . $profile_data['last_name']; ?>"
                             title="<?php echo $profile_data['first_name'] . ' ' . $profile_data['last_name']; ?>"
                             class="img-thumbnail">
                    </td>
                    <td class="fieldCell" colspan="2" style="width: 75%;"><h3><?php echo $profile_data['first_name'] . ' ' . $profile_data['last_name']; ?></h3></td>
                </tr>
                <tr>
                    <td class="fieldCell" colspan="2"
                        style="width: 100%;background-color: #ecf0f1;border-radius: 5px; ">
                        <span class="<?php echo $profile_status['dotColor'];?> profile_status"><span class="<?php echo $profile_status['dotClass'];?>"></span><?php echo $profile_status['isOnline'];?></span>
                        <span style="margin-left: 20px;"><a href="edit-profile.php?username=<?php echo $profile_data['username'];?>"> <button name="editProf" class="btn btn-default">Edit profile</button></a></span>
                        <span style="margin-left: 20px;"><a type="button" data-toggle="modal" data-target="#changePasswordModal"> <button name="editProf" class="btn btn-default">Change password</button></a></span>
                        <span style="margin-left: 20px;"><a href="<?php echo $profile_data['cv'];?>" target="_blank"> <button name="viewCV" class="btn btn-default">CV</button></a></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <div class="col-sm-9">
                <div><table class="table table-hover">
                    <tbody>
                    <tr>
                        <td class="titleCell" style="width: 25%;">
                            <label for="email_l">Email</label>
                        </td>
                        <td id="email_l" class="fieldCell" style="width: 75%;"><?php echo $profile_data['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="titleCell" style="width: 25%;">
                            <label for="phone_l">Mobile nr</label>
                        </td>
                        <td id="phone_l" class="fieldCell" style="width: 75%;"><?php echo $profile_data['phone']; ?></td>
                    </tr>
                    <tr>
                        <td class="titleCell" style="width: 25%;">
                            <label for="address_l">Address</label>
                        </td>
                        <td id="address_l" class="fieldCell" style="width: 75%;"><?php echo $profile_data['address']; ?></td>
                    </tr>
                    <tr>
                        <td class="titleCell" style="width: 25%;">
                            <label for="code_l">Zip code</label>
                        </td>
                        <td id="code_l" class="fieldCell" style="width: 75%;"><?php echo $profile_data['zip_code']; ?></td>
                    </tr>
                    <tr>
                        <td class="titleCell" style="width: 25%;">
                            <label for="city_l">City</label>
                        </td>
                        <td id="city_l" class="fieldCell" style="width: 75%;"><?php echo $profile_data['city']; ?></td>
                    </tr>
                    <tr>
                        <td class="titleCell" style="width: 25%;">
                            <label for="status_l">User Status</label>
                        </td>
                        <td id="status_l" class="fieldCell" style="width: 75%;"><?php echo $profile_data['type']; ?></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changePasswordModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <div class="modal-body" >
                    <div class="form-group">
                        <input type="password" class="form-control" value="" placeholder="Current Password"
                               id="current-pass"
                               name="current-pass" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" value="" placeholder="New Password" id="new-pass"
                               name="new-pass"/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" value="" placeholder="Confirm Password"
                               id="confirm-pass"
                               name="confirm-pass" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="changePassword" type="submit" data-dismiss="modal" value="Change Password"
                           class="btn btn-block btn-lg btn-default" />
                </div>
            </div>
        </div>
    </div>
</div>
