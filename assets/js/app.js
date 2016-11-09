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
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: 'core/functions/shifts/shiftCards.php',
        dataType: "json",   //expect json to be returned
    })
    .done(function (response) {
        // GET ALL THE DATA FROM THE PHP FILE AND PUTS IT INTO THE PAGE CONTAINER

        if(response.success) {
            var shifts = "";
            response.shifts.forEach(function(shiftData) {
                shifts +=   "<li style='list-style-type: none'>" +
                            "   <div style='border: groove' >" +
                            "       <div>" +
                            "           <img src='../../../../assets/images/logo.png' style='float:left;width:210px;height:150px; border-style:groove'>" +
                            "       </div>" +
                            "       <div>" +
                            "           <a href=''>Title: " + shiftData['title'] + "</a><br>" +
                            "           <label>Start date: " + shiftData['begin'] + "</label><br>" +
                            "           <label>Closing date: " + shiftData['close'] + "</label><br>" +
                            "           <label>Manager: " + shiftData['duty_manager'] + "</label><br>" +
                            "           <label>Category: " + shiftData['category'] + "</label><br>" +
                            "       </div>" +
                            "       <div style='clear:both'></div>" +
                            "   </div><br>" +
                            "</li>";
            });

            $("#shiftContainer").append(shifts);
            $("#shiftContainer").easyPaginate({
                paginateElement: 'li',
                elementsPerPage: 10,
                effect: 'climb'
            });
        } else {
            console.error('Shifts unsuccessfuly fetched');
        }
    });
});
