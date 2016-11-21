
$(document).on('click', '.book-button', function(e) {

    var user_id = $(this).attr('value');
    var currentDate = new Date().toISOString();
    var storageID = sessionStorage.getItem("titleID");
    $('.book-button').removeAttr("style").hide();
    $.ajax({
        type: 'POST',
        url: 'core/functions/shifts/bookShift.php',
        data: {
            user_id: user_id,
            shift_id: storageID,
            current_date: currentDate
        },
        success: function () {
            $.growl.notice({title: "Success", message: "You successfully booked this shift!"});
        }
    });
});

