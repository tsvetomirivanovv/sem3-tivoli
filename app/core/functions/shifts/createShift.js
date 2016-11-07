// 'form' - INDICATES THE TYPE OF THE HTML ELEMENT
// '#createShiftForm' - IS THE ID OF THE FORM THAT IS RESETED


$('form').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '',
        data: $('form').serialize(),
        success:function () {
            $('#createShiftForm')[0].reset();
        }
    });
});


