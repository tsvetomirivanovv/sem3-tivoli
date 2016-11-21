<div class="clearfix">
    <div class="col-xs-9" style="border: 1px solid #ccc; border-radius: 7px;">
        <div class="col-xs-12">
            <div id="userCount" style="text-align: center; margin-top: 25px;">The users below are booked for the event:</div>
            <table id="participantsTable" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th style="width: 38%;">Name</th>
                    <th style="width: 18%;">Phone</th>
                    <th style="width: 44%;">Date of booking</th>
                </tr>
                </thead>
                <tbody id="tableBodyParticipantsList">
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="cancelUserBooking" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cancel User Booking</h4>
                </div>
                <div class="modal-body">
                    <p>Do you want to cancel this user's booking?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button id="cancelUserBookingButton" type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>