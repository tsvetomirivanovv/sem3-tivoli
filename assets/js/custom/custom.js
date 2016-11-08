// 'form' - INDICATES THE TYPE OF THE HTML ELEMENT
// '#createShiftForm' - IS THE ID OF THE FORM THAT IS RESETED


$('form').on('submit', function(e){
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'core/functions/shifts/createShift.php',
        data: $('form').serialize(),
        success:function () {
            $('#createShiftForm')[0].reset();
        }
    });
});

// AJAX TO GET THE DATA FROM THE PHP AND ON SUCCESS TO PUT IT INTO THE HTML shiftContaier
$("#viewShiftsButtonID").click(function () {
    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/shiftCards.php',
        dataType: "html",   //expect html to be returned
        success: function (response) {
            // GET ALL THE DATA FROM THE PHP FILE AND PUTS IT INTO THE PAGE CONTAINER
            $("#shiftContainer").html(response);
            $("#shiftContainer").easyPaginate({

                paginateElement: 'li',
                elementsPerPage: 10,
                effect: 'climb'

            });
        }
    });
});


