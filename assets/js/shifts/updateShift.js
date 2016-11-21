/*====================================================
------------------Update shift cards------------------
=====================================================*/

$(document).on('click', '.openUpdateShift', function(e) {
    clearUpdateModalValues();

    selectedShiftToUpdate = parseInt(e.target.offsetParent.getElementsByClassName('shiftId')[0].getAttribute('id'));

    fetchShiftDataModal(selectedShiftToUpdate);
});

$(document).on('click', '.updateShiftBtn', function(e) {
    var isSelected = 0;

    if($("#shift-canceled option:selected").val() === "Yes") {
        isSelected = 1;
    }

    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/updateShift.php',
        dataType: "json",
        data: {
            shift_id: selectedShiftToUpdate,
            title: $('#shift-title').val(),
            begin: $("#shift-begin-date").val(),
            end: $("#shift-end-date").val(),
            close: $("#shift-closing-date").val(),
            duty_manager: $("#shift-duty-manager").val(),
            max_participants: $("#shift-participants").val(),
            category: $('#shift-category option:selected').val(),
            canceled: isSelected
        }
    })
        .done(function (response) {
            if(response.success) {
                var id = '#' + selectedShiftToUpdate;
                var e = $(id).parents('.mat_event_content')[0];
                var title = e.getElementsByClassName('shiftId');
                var beginDate = e.getElementsByClassName('beginDate');
                var endDate = e.getElementsByClassName('endDate');
                var closeDate = e.getElementsByClassName('closeDate');
                var maxPart = e.getElementsByClassName('maxPart');
                var dutyMngr = e.getElementsByClassName('dutyMngr');
                var category = e.getElementsByClassName('category');
                var canceledLabel = e.getElementsByClassName('canceledShift');
                var cancelBtn = e.getElementsByClassName('cancel_shift');
                var cancelBtnWrapper = e.getElementsByClassName('buttonsWrapper');
                var cancelBtnElement = `<a class='cancel_shift_glyphicon cancel_shift' data-toggle='modal' data-target='#cancelShift'>
                                                <div class='glyphicon glyphicon-remove-circle'></div>
                                            </a>`;

                $(title).html($('#shift-title').val());
                $(beginDate).html(parseTimestamp($("#shift-begin-date").val()));
                $(endDate).html(parseTimestamp($("#shift-end-date").val()));
                $(closeDate).html(parseTimestamp($("#shift-closing-date").val()));
                $(maxPart).html($("#shift-participants").val());
                $(dutyMngr).html($("#shift-duty-manager").val());
                $(category).html($('#shift-category option:selected').val());

                if(canceledLabel.length) {
                    if(!isSelected) {
                        $(canceledLabel).remove();
                        $(cancelBtnWrapper).append(cancelBtnElement);
                    }
                } else {
                    if(isSelected) {
                        $(title).append("<span class='canceledShift'>(Canceled)</span>");
                        $(cancelBtn).remove();
                    } else if (!cancelBtn.length) {
                        $(cancelBtnWrapper).append(cancelBtnElement);
                    }
                }

                $.growl.notice({title: "Success", message: response.message});
            } else {
                $.growl.error({title: "Error", message: response.message});
            }


        });
});

/*====================================================
------------------Update selected shift---------------
=====================================================*/

$(document).on('click', '.openUpdateSelectedShift', function(e) {
    clearUpdateModalValues();

    selectedShiftToUpdate = parseInt(sessionStorage.getItem('titleID'));

    fetchShiftDataModal(selectedShiftToUpdate);

});

$(document).on('click', '.updateSelectedShiftBtn', function(e) {
    var isSelected = 0;

    if($("#shift-canceled option:selected").val() === "Yes") {
        isSelected = 1;
    }

    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/updateShift.php',
        dataType: "json",
        data: {
            shift_id: selectedShiftToUpdate,
            title: $('#shift-title').val(),
            begin: $("#shift-begin-date").val(),
            end: $("#shift-end-date").val(),
            close: $("#shift-closing-date").val(),
            duty_manager: $("#shift-duty-manager").val(),
            max_participants: $("#shift-participants").val(),
            category: $('#shift-category option:selected').val(),
            canceled: isSelected
        }
    })
    .done(function (response) {
        if(response.success) {
            var canceledLabel = $('.canceledShift');
            var cancelBtn = $('.cancelShiftIcon');
            var cancelBtnWrapper = $('.cancelShiftBtn');

            sessionStorage.setItem("titleName", $('#shift-title').val());
            $('.titleClass').html($('#shift-title').val());
            $('#shift_begin_id').html(parseTimestampParticipants($("#shift-begin-date").val()));
            $('#shift_end_id').html(parseTimestampParticipants($("#shift-end-date").val()));
            $('#shift_close_id').html(parseTimestampParticipants($("#shift-closing-date").val()));
            $('#shift_participants_id').html($("#shift-participants").val());
            $('#shift_manager_id').html($("#shift-duty-manager").val());
            $('#shift_category_id').html($('#shift-category option:selected').val());

            if(canceledLabel.length) {
                if(!isSelected) {
                    $(canceledLabel).remove();
                    $(cancelBtnWrapper).append(`<div class="glyphicon glyphicon-remove-circle cancelShiftIcon"></div>`);
                } else {
                    $('.titleClass').append("<span class='canceledShift'>(Canceled)</span>");
                }
            } else {
                if(isSelected) {
                    $('.titleClass').append("<span class='canceledShift'>(Canceled)</span>");
                    $(cancelBtn).remove();
                } else if (!cancelBtn.length) {
                    $(cancelBtnWrapper).append(`<div class="glyphicon glyphicon-remove-circle cancelShiftIcon"></div>`);
                }
            }
            $.growl.notice({title: "Success", message: response.message});
        } else {
            $.growl.error({title: "Error", message: response.message});
        }
    });
});

// Clear input fields when open updateShift modal.
function clearUpdateModalValues() {
    $('#shift-title').val('');
    $("#shift-begin-date").val('');
    $("#shift-end-date").val('');
    $("#shift-closing-date").val('');
    $("#shift-duty-manager").val('');
    $("#shift-participants").val('');
    $('#shift-category option:eq(0)').prop('selected', true);
}

// Call /shiftDetails endpoint and fetch shift data into modal
function fetchShiftDataModal(id) {
    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/shiftDetails.php',
        dataType: "json",
        data: {
            shift_id_value: id
        }
    })
    .done(function (response) {
        if (response.success) {
            var shiftData = response.shift;

            $('#shift-title').val(shiftData['title']);
            $("#shift-begin-date").val(shiftData['begin']);
            $("#shift-end-date").val(shiftData['end']);
            $("#shift-closing-date").val(shiftData['close']);
            $("#shift-duty-manager").val(shiftData['duty_manager']);
            $("#shift-participants").val(shiftData['max_participants']);

            if(shiftData['category'] === "A-Waiter") {
                $('#shift-category option:eq(0)').prop('selected', true);
            } else {
                $('#shift-category option:eq(1)').prop('selected', true);
            }

            if(shiftData['canceled'] === "1") {
                $('#shift-canceled option:eq(0)').prop('selected', true);
            } else {
                $('#shift-canceled option:eq(1)').prop('selected', true);
            }
        }
    });
}
