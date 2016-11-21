var storageID = sessionStorage.getItem("titleID");
$.ajax('core/functions/profile/permissions/is-manager.php', {
    type: 'POST',
    dataType: 'json',
})
    .done(function (response1) {
$.ajax({
    type: "POST",
    url: 'core/functions/shifts/participantsList.php',
    dataType: "json",
    data: {
        shift_id: storageID
    }
})
    .done(function (response) {
        if (response.success) {
            var participants = "";

            response.participants.forEach(function (participantData) {

                participants +=
                    "<tr id='" + participantData['user_id'] + "'>" +
                    "   <td>" + participantData['first_name'] + ' ' + participantData['last_name'] + "</td>" +
                    "   <td>" + participantData['phone'] + "</td>" +
                    "   <td>" + parseTimestampParticipants(participantData['date_of_booking']);
                if (!response1.success) {
                    participants += "</tr>";
                }else {
                    participants += "<div class='updateButtonPos'><a class='cancel_user_booking_button' type='button' data-toggle='modal' data-target='#cancelUserBooking' id='" + participantData['user_id'] + "'><span class='glyphicon glyphicon-remove'></span></a>" + "</td>" +
                                    "</tr>";
                }
            });

            $("#tableBodyParticipantsList").append(participants);
        } else {
            console.error('Participants unsuccessfully fetched');
        }
        participantsTable = $("#participantsTable").DataTable();
    });
});
$(document).on('click', '.cancel_user_booking_button', function () {
    userID = $(this).attr('id');
});

$(document).on('click', '#cancelUserBookingButton', function () {
    $.ajax('core/functions/shifts/cancel-user-booking.php', {
        type: 'POST',
        dataType: 'json',
        data: {
            user_id: userID,
            shift_id: storageID
        }
    })
        .done(function (response) {
            if (response.success) {
                var row = participantsTable.row($('tr').filter("[id=" + userID + "]"));
                row.remove().draw(false);
                $.growl.notice({title: "Success", message: response.message});
            } else {
                $.growl.error({title: "Error", message: response.message});
            }
        })
});
