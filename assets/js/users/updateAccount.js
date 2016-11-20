$(document).on('click', '#updateAccount', function () {
    $.ajax('core/functions/profile/edit-profile.php', {
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

$(document).on('click', '#cancelUpdateAccount', function () {
    window.location.href = "index.php";
});
