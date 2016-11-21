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

            // progress bar color
            var progress_bar_color = 'progress-bar-success';
            if (shiftData['participants_perc'] > 50 && shiftData['participants_perc'] <= 70) {
                progress_bar_color = 'progress-bar-warning';
            } else if (shiftData['participants_perc'] > 70) {
                progress_bar_color = 'progress-bar-danger';
            }
            var progress_bar = "<div class='mat_small mat_booked participants_count'>" + shiftData['participants'] +
                " out of " + shiftData['max_participants'] + " participants " +
                "</div>" +
                "    <div class='progress_bar_margin'> "+
                "        <div class='progress'>" +
                "            <div class='progress-bar " + progress_bar_color + "' style='width:" + shiftData['participants_perc'] + "%;'></div>"+
                "        </div>" +
                "    </div>";

            $("#shift_begin_id").append(parseTimestampParticipants(shiftData['begin']));
            $("#shift_end_id").append(parseTimestampParticipants(shiftData['end']));
            $("#shift_close_id").append(parseTimestampParticipants(shiftData['close']));
            $("#shift_manager_id").append(shiftData['duty_manager']);
            $("#shift_category_id").append(shiftData['category']);
            $("#shift_participants_booked_id").append(shiftData['participants']);
            $("#shift_participants_id").append(shiftData['max_participants']);
            $('.progressContainer').append(progress_bar);
            $('.titleClass').html(sessionStorage.getItem("titleName"));

            if(parseInt(shiftData['canceled']) === 1) {
                $('.titleClass').append("<span class='canceledShift'>(Canceled)</span>");
            } else {
                $('.cancelShiftBtn').append("<div class='glyphicon glyphicon-remove-circle cancelShiftIcon'></div>");
            }
        }
    });

