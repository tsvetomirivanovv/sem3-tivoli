/*====================================================
------------------Cancel shift cards------------------
=====================================================*/

$('body').on('click', '.cancel_shift', function(e) {
    selectedShiftToCancel = parseInt(e.target.offsetParent.getElementsByClassName('shiftId')[0].getAttribute('id'));
});

$('body').on('click', '.cancelShiftButton', function(e) {
    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/cancelShift.php',
        dataType: "json",
        data: {
            shift_id: selectedShiftToCancel
        }
    })
    .done(function (response) {
        if (response.success) {
            var id = '#' + selectedShiftToCancel;
            // Add cancel label next to the title
            $(id).append("<span class='canceledShift'>(Canceled)</span>");
            // Remove 'Cancel' button
            $(id).parents('.mat_event_content')[0].getElementsByClassName('cancel_shift')[0].remove();
            $.growl.notice({title: "Success", message: response.message});
        } else {
            $.growl.error({title: "Error", message: response.message});
        }
    });
});

/*====================================================
------------------Cancel selected shift---------------
=====================================================*/

$('body').on('click', '.cancelSelectedShiftButton', function(e) {
    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/cancelShift.php',
        dataType: "json",
        data: {
            shift_id: parseInt(sessionStorage.getItem('titleID'))
        }
    })
    .done(function (response) {
        if (response.success) {
            // Add cancel label next to the title
            $('.titleClass').append("<span class='canceledShift'>(Canceled)</span>");
            // Remove 'Cancel' button
            $('.cancelShiftIcon').remove();
            $.growl.notice({title: "Success", message: response.message});
        } else {
            $.growl.error({title: "Error", message: response.message});
        }
    });
});
