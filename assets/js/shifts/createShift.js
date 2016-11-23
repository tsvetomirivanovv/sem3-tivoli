// 'form' - INDICATES THE TYPE OF THE HTML ELEMENT
// '#createShiftForm' - IS THE ID OF THE FORM THAT IS RESETED
$(document).on('submit', '#createShiftForm', function (e) {

    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'core/functions/shifts/createShift.php',
        data: $('form').serialize(),
        success: function () {
            $('#createShiftForm')[0].reset();
            $.growl.notice({title: "Success", message: "You successfully created the shift!"});
        }
    });
});

$(document).ready(function () {

    $('.date').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide: true
    });

});
