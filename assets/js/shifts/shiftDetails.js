// WHEN CLICK ON TITLE, SET SESSION STORAGE TITLE AND ID VAR
$(document).on('click', '.a_link_title_color', function () {
    var titleID = $(this).attr('id');
    var titleName = $(this).text();
    sessionStorage.setItem("titleID", titleID);
    sessionStorage.setItem("titleName", titleName)
});

// VAR TO RETRIEVE SES. STORAGE ID
var storageID = sessionStorage.getItem("titleID");

$.ajax({
    type: "POST",
    url: 'core/functions/shifts/shiftDetails.php',
    dataType: "json",
    data: {
        shift_id_value: storageID
    }
})
.done(function (response) {
    if (response.success) {
        var shiftData = response.shift;

        $("#shift_begin_id").append(shiftData['begin']);
        $("#shift_end_id").append(shiftData['end']);
        $("#shift_close_id").append(shiftData['close']);
        $("#shift_organizer_id").append("Alex Petersen");
        $("#shift_manager_id").append(shiftData['duty_manager']);
        $("#shift_category_id").append(shiftData['category']);
        $("#shift_participants_id").append(shiftData['max_participants']);
        $('.titleClass').html(sessionStorage.getItem("titleName"));

        if(parseInt(shiftData['canceled']) === 1) {
            $('.titleClass').append("<span class='canceledShift'>(Canceled)</span>");
        } else {
            $('.cancelShiftBtn').append("<div class='glyphicon glyphicon-remove-circle cancelShiftIcon'></div>");
        }
    }
});
