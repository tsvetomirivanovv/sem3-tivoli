// AJAX TO GET THE DATA FROM THE PHP AND ON SUCCESS TO PUT IT INTO THE HTML shiftContaier
$("#viewShiftsButtonID").click(function () {
    $.ajax({
        type: "POST",
        url: 'http://localhost:8080/app/core/functions/shifts/shiftCards.php',
        dataType: "html",   //expect html to be returned
        success: function (response) {
            // GET ALL THE DATA FROM THE PHP FILE AND PUTS IT INTO THE PAGE CONTAINER
            $("#shiftContainer").html(response);
        }
    });
});
