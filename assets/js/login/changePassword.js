$(document).on('click', '#changePassword', function () {
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
