$('form').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '',
        data: $('form').serialize(),
        success:function () {
            $(' #createShiftForm')[0].reset();
        }
    });
});


