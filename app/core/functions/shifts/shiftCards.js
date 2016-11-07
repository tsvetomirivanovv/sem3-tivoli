// AJAX TO GET THE DATA FROM THE PHP AND ON SUCCESS TO PUT IT INTO THE HTML shiftContaier
$("#viewShiftsButtonID").click(function () {
    $.ajax({
        type: "POST",
        url: '',
        dataType: "html",   //expect html to be returned
        success: function (response) {
            // GET ALL THE DATA FROM THE PHP FILE AND PUTS IT INTO THE PAGE CONTAINER
            $("#shiftContainer").html(response);
            $("#shiftContainer").easyPaginate({

                paginateElement: 'li',
                elementsPerPage: 4,
                effect: 'climb'

            });
        }
    });
});

