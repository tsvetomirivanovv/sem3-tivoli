<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div style="border-radius: 10px;background: whitesmoke;">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td class="fieldCell" colspan="1" style="width: 25%;">
                        <img style="width:120px; height: 135px;" src="assets/images/<?php echo $profile_data['profile_picture']; ?>"
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
                        <span style="margin-left: 20px;"><a href="edit-profile.php"> <button name="editProf" id="<?php echo 'editThis'. $profile_data['user_id'];?>" class="btn btn-default">Edit profile</button></a></span>
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
</div>
