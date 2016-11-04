$('form').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'http://localhost:8080/app/core/functions/shifts/createShift.php',
        data: $('form').serialize(),
        success:function () {
            $('#myForm')[0].reset();
        }
    });
});


