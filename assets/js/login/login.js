$(document).on('click', '#loginButton', function () {
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
