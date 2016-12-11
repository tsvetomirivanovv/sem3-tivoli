$(document).on('submit', '#registerForm', function (e) {

    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'core/functions/register/register.php',
        data: $('form').serialize(),
        success: function () {
            $.growl.notice({title: "Success", message: "Your account was successfully created!"});
            window.setTimeout(function () {
                window.location.href = "index.php";
            }, 3000);
        },
        error: function (resp) {
            $.growl.error({title: "Failure", message: "Your account was not created!"});
        }
    });
});
