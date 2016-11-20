$('#registerForm').on('submit', function (e) {
    // $(document).on('click', '#changePassword', function () {

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
            console.log($('#usernameErr').val());

            $("#registerForm").append($('#username').val());
        }
    });
});
