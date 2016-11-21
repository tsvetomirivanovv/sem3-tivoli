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
            response.shifts.forEach(function (shiftData) {
                shift_begin_id = shiftData['begin'];
                shift_end_id = shiftData['end'];
                shift_close_id = shiftData['close'];
                shift_manager_id = shiftData['duty_manager'];
                shift_category_id = shiftData['category'];
                shift_participants_booked = shiftData['participants'];
                shift_participants_id = shiftData['max_participants'];
                shift_progress_perc = shiftData['participants_perc'];
                shift_cancelled = shiftData['canceled'];
                // progress bar color
                var progress_bar_color = 'progress-bar-success';
                if (shiftData['participants_perc'] > 50 && shiftData['participants_perc'] <= 70) {
                    progress_bar_color = 'progress-bar-warning';
                } else if (shiftData['participants_perc'] > 70) {
                    progress_bar_color = 'progress-bar-danger';
                }

                progress_bar = "<div class='mat_small mat_booked participants_count'>" + shiftData['participants'] +
                    " out of " + shiftData['max_participants'] + " participants " +
                    "</div>" +
                    "    <div class='progress_bar_margin'> "+
                    "        <div class='progress'>" +
                    "            <div class='progress-bar " + progress_bar_color + "' style='width:" + shift_progress_perc + "%;'></div>"+
                    "        </div>" +
                    "    </div>";

            });
            $("#shift_begin_id").append(shift_begin_id);
            $("#shift_end_id").append(shift_end_id);
            $("#shift_close_id").append(shift_close_id);
            $("#shift_manager_id").append(shift_manager_id);
            $("#shift_category_id").append(shift_category_id);
            $("#shift_participants_booked_id").append(shift_participants_booked);
            $("#shift_participants_id").append(shift_participants_id);
            $('.progressContainer').append(progress_bar);
            $('.titleClass').html(sessionStorage.getItem("titleName"));

            if(parseInt(shift_cancelled) === 1) {
                $('.titleClass').append("<span class='canceledShift'>(Canceled)</span>");
            } else {
                $('.cancelShiftBtn').append("<div class='glyphicon glyphicon-remove-circle cancelShiftIcon'></div>");
            }
        }
    });

