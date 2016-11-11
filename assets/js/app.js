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
                response.shifts.forEach(function (shiftData) {
                    shifts += "<li style='list-style-type: none'>" +
                        "   <div style='border: groove' >" +
                        "       <div>" +
                        "           <img src='../../../../assets/images/logo.png' style='float:left;width:210px;height:150px; border-style:groove'>" +
                        "       </div>" +
                        "       <div>" +
                        "           <a href=''>Title: " + shiftData['title'] + "</a><br>" +
                        "           <label>Start date: " + shiftData['begin'] + "</label><br>" +
                        "           <label>Closing date: " + shiftData['close'] + "</label><br>" +
                        "           <label>Manager: " + shiftData['duty_manager'] + "</label><br>" +
                        "           <label>Category: " + shiftData['category'] + "</label><br>" +
                        "       </div>" +
                        "       <div style='clear:both'></div>" +
                        "   </div><br>" +
                        "</li>";
                });

                $("#shiftContainer").append(shifts);
                $("#shiftContainer").easyPaginate({
                    paginateElement: 'li',
                    elementsPerPage: 10,
                    effect: 'climb'
                });
            } else {
                console.error('Shifts unsuccessfuly fetched');
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
                edit_profile_picture: $('#edit-profile-picture').val()
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

    $(function () {
        $('.date').datetimepicker({
             format: 'YYYY-MM-DD hh:mm',
             sideBySide: true
        });
    });

});
