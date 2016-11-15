function timeLeadingZeros(value) {
    if (value < 10) {
        return '0' + value;
    } else {
        return value;
    }
}
function parseTimestamp(date) {
    var now = new Date(date);
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var day = days[now.getDay()];
    var month = months[now.getMonth()];
    var h = now.getHours();
    var m = now.getMinutes();

    return day + ", " + now.getDate() + ". " + month + " " + now.getFullYear() + " - " + timeLeadingZeros(now.getHours()) + ":" + timeLeadingZeros(now.getMinutes());
}
$(document).ready(function () {
    // AJAX TO GET THE DATA FROM THE PHP AND ON SUCCESS TO PUT IT INTO THE HTML shiftContaier
    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/shiftCards.php',
        dataType: "json",   //expect json to be returned
    })
        .done(function (response) {
            // GET ALL THE DATA FROM THE PHP FILE AND PUTS IT INTO THE PAGE CONTAINER

            if (response.success) {
                var shifts = "";
                var evenOdd = 1;
                response.shifts.forEach(function (shiftData) {

                    var bgStyle;
                    if (evenOdd % 2 == 1) {
                        bgStyle = 'mat_single_odd';
                    } else bgStyle = '';
                    evenOdd++;

                    shifts += "<li style='list-style-type: none'>" +
                        "   <div class='mat_single_event_holder " + bgStyle + "'>" +
                        "       <div class='mat_single_event_holder_inner'>" +
                        "           <div class='mat_event_image'>" +
                        "               <div class='mat_event_image_inner'>" +
                        "                   <a title='" + shiftData['title'] + "' href='#'>" +
                        "                       <img src='../../assets/images/logo.png' border='0'>" +
                        "                   </a>" +
                        "               </div>" +
                        "           </div>" +
                        "       <div class='mat_event_content'>" +
                        "           <div class='mat_event_content_inner'>" +
                        "               <h4 class='h4_shift_link'><a class='a_link_title_color' href='#'>" + shiftData['title'] + "</a></h4>" +
                        "                   <div class='mat_event_location'>" +
                        "                       <strong><a class='a_link_tivoli_location' href='#'>Tivoli Hotel &amp; Congress Center</a> " + parseTimestamp(shiftData['begin']) + "</strong>" +
                        "                   </div>" +
                        "                   <div class='mat_small mat_booked participants_count'> 3 out of " + shiftData['participants'] + " participants  </div>" +
                        "                       <div class='progress_bar_margin'>" +
                        "                           <div class='progress'>" +
                        "                               <div class='progress-bar' style='width: 45%;'></div>" +
                        "                           </div>" +
                        "                       </div>" +
                        "                       <span class='mat_small mat_booked closing_date col-xs-10'>Closing date: " + parseTimestamp(shiftData['close']) + "</span>" +
                        "                           <div class='mat_event_infoline duty_manager col-xs-8'>" +
                        "                               <span class='mat_small'>" +
                        "                               <span>Duty manager: " + shiftData['duty_manager'] + " - </span>Category: " + shiftData['category'] + " </span>" +
                        "                           </div>" +
                        "                       <a class='edit_shift_glyphicon' href='#'>" +
                        "                           <div class='glyphicon glyphicon-edit'></div>" +
                        "                       </a>" +
                        "                       <a class='cancel_shift_glyphicon' href='#'>" +
                        "                           <div class='glyphicon glyphicon-remove-circle'></div>" +
                        "                       </a>" +
                        "                   </div>" +
                        "               </div>" +
                        "                   <div style='clear:both'></div>" +
                        "       </div>" +
                        "   </div>" +
                        "</li>"

                });

                $("#shiftContainer").append(shifts);
                $("#shiftContainer").easyPaginate({
                    paginateElement: 'li',
                    elementsPerPage: 3,
                    effect: 'climb',
                    firstButton: false,
                    prevButtonText: 'Prev',
                    nextButtonText: 'Next',
                    lastButton: false

                });
            } else {
                console.error('Shifts unsuccessfully fetched');
            }
        });
    // 'form' - INDICATES THE TYPE OF THE HTML ELEMENT
    // '#createShiftForm' - IS THE ID OF THE FORM THAT IS RESETED
    $('#createShiftForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'core/functions/shifts/createShift.php',
            data: $('form').serialize(),
            success: function () {
                $('#createShiftForm')[0].reset();
                $.growl.notice({title: "Success", message: "You successfully created the shift!"});
            }
        });
    });

    $('#loginButton').click(function () {
        $.ajax('core/functions/login/login.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                login_name: $('#login-name').val(),
                login_pass: $('#login-pass').val()
            }
        })
            .done(function (response) {
                if (response.success) {
                    $.growl.notice({title: "Success", message: response.message});
                    // delay with 5s to let the notification be displayed
                    window.setTimeout(function () {
                        window.location.href = "";
                    }, 3000);
                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
    $('#changePassword').click(function () {
        $.ajax('core/functions/login/change-password.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                current_pass: $('#current-pass').val(),
                new_pass: $('#new-pass').val(),
                confirm_pass: $('#confirm-pass').val()
            }
        })
            .done(function (response) {
                if (response.success) {
                    $.growl.notice({title: "Success", message: response.message});
                    window.setTimeout(function () {
                        window.location.href = "index.php";
                    }, 5000);
                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
    $('#recoverButton').click(function () {
        $.ajax('core/functions/login/recover.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                email_address: $('#email-address').val()
            }
        })
            .done(function (response) {
                if (response.success) {
                    $.growl.notice({title: "Success", message: response.message});
                    window.setTimeout(function () {
                        window.location.href = "index.php";
                    }, 5000);
                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
    $('#updateAccount').click(function () {
        $.ajax('core/functions/login/edit-profile.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                edit_first_name: $('#edit-first-name').val(),
                edit_last_name: $('#edit-last-name').val(),
                edit_email: $('#edit-email').val(),
                edit_phone: $('#edit-phone').val(),
                edit_address: $('#edit-address').val(),
                edit_zip_code: $('#edit-zip-code').val(),
                edit_city: $('#edit-city').val(),
                edit_cv: $('#edit-cv').val(),
                edit_profile_picture: $('#edit-profile-picture').val(),
                edit_user_type: $('#edit-user-type').val()
            }
        })
            .done(function (response) {
                if (response.success) {
                    $.growl.notice({title: "Success", message: response.message});
                    window.setTimeout(function () {
                        window.location.href = "index.php";
                    }, 5000);
                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
    $('#cancelUpdateAccount').click(function () {
        window.location.href = "index.php";
    });

        $.ajax({
            type: "POST",
            url: 'core/functions/login/approve-accounts.php',
            dataType: "json",
        })
            .done(function (response) {
                if (response.success) {
                    var approve_accounts = '';
                    response.accounts.forEach(function (accountData) {
                        approve_accounts += '<tr id="' + accountData['user_id'] + '">' +
                            '   <th>' +
                            '       <div>' +
                            '           <span>' +
                            '               <a href="profile-page.php?username=' + accountData['username'] + '">' +
                            '                   <img class="avatarSize" src="' + accountData['profile_picture'] + '">' +
                            '               </a>' +
                            '           </span>' +
                            '       </div>' +
                            '   </th>' +
                            '   <td> ' + accountData['first_name'] + ' ' + accountData['last_name'] + '</td>' +
                            '   <td>' + accountData['email'] + '</td>' +
                            '   <td><span><a class="cvLink" href="' + accountData['cv'] + '" target="_blank">CV</a></span>' +
                            '       <div class="updateButtonPos"><a class="approve_button" type="button" data-toggle="modal" data-target="#approveUserModal" id="' + accountData['user_id'] + '"><span class="glyphicon glyphicon-ok" style="margin-right: 15px;"></span></a>' +
                            '       <div class="updateButtonPos"><a class="reject_button" type="button" data-toggle="modal" data-target="#rejectUserModal" id="' + accountData['user_id'] + '"><span class="glyphicon glyphicon-remove" style="margin-right: 15px;"></span></a>' +
                            '   </td>' +
                            '</tr>';
                    });
                    $("#tableBodyApprove").append(approve_accounts);

                } else {
                    console.error('Accounts unsuccessfully fetched');
                }
                approveTable = $('#approveTable').DataTable();
            });


    $(document).on('click', '.approve_button', function () {
        storageAccountId = $(this).attr('id');
    });
    $(document).on('click', '.reject_button','.reject_button', function () {
        accountId = $(this).attr('id');
    });
    $('#approveButton').click( function () {
        $.ajax('core/functions/login/approve.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                account_id: storageAccountId
            }
        })
            .done(function (response) {
                if (response.success) {
                    var row = approveTable.row($('tr').filter("[id=" +storageAccountId + "]"));
                    row.remove().draw(false);
                    updateUserCount();
                    $.growl.notice({title: "Success", message: response.message});
                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
    $('#rejectUserModal').click( function () {
        $.ajax('core/functions/profile/reject-user.php', {
            type: 'POST',
            dataType: 'json',
            data: {
                account_id: accountId
            }
        })
            .done(function (response) {
                if (response.success) {
                    var row = approveTable.row($('tr').filter("[id=" +accountId + "]"));
                    row.remove().draw(false);
                    updateUserCount();
                    $.growl.notice({title: "Success", message: response.message});

                } else {
                    $.growl.error({title: "Error", message: response.message});
                }
            })
    });
    $.ajax({
        type: "POST",
        url: 'core/functions/login/view-all-accounts.php',
        dataType: "json",
    })
        .done(function (response) {
            if (response.success) {
                var accounts = '';
                response.accounts.forEach(function (accountData) {
                    accounts += '<tr>' +
                        '   <th>' +
                        '       <div>' +
                        '           <span>' +
                        '               <a href="profile-page.php?username=' + accountData['username'] + '">' +
                        '                   <img class="avatarSize" src="' + accountData['profile_picture'] + '">' +
                        '               </a>' +
                        '           </span>' +
                        '       </div>' +
                        '   </th>' +
                        '   <td> ' + accountData['first_name'] + ' ' + accountData['last_name'] + '</td>' +
                        '   <td>' + accountData['email'] + '</td>' +
                        '   <td><span class="' + accountData['dotColor'] + '"><span class="' + accountData['dotClass'] + '"></span>' + accountData['isOnline'] + '</span>' +
                        '       <a href="edit-profile.php?username=' + accountData['username'] + '"><span class="glyphicon glyphicon-edit updateButtonPos"></span></a>' +
                        '   </td>' +
                        '</tr>';
                });
                $("#tableBody").append(accounts);

            } else {
                console.error('Accounts unsuccessfully fetched');
            }
            $('#usersTable').DataTable();
        });



});

function getFileLink(url, elementId) {
    var inputId = '#' + elementId;
    var linkId = '#' + elementId + '-link';
    $(inputId).val(url);
    $(linkId).text(url);
}
function updateUserCount() {
    var x = $('#userCount').text();
    var temp = x.match(/\d+/g)[0];
    var new_count = temp - 1;
    var suffix = '';
    if (new_count != 1){
        suffix = 's';
    }
    // I hate myself doing this ...
    $('#userCount').text("Tivoli Hotel & Congress Center shift booking system has " + new_count + " pending member" + suffix + ".");
    //x.replace(/\d+/g, new_count); - not working?
}