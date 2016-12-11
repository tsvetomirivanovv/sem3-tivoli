$(document).on('click', '#recoverButton', function () {
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
