<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix"><h3 class="h3Fix">Shifts</h3></div>
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#shift_information" aria-controls="shift_information" role="tab" data-toggle="tab">Shift Information</a></li>
                <li role="presentation"><a href="#shift_participants" aria-controls="shift_participants" role="tab" data-toggle="tab">Shift participants</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="shift_information">
                    <?php
                    include 'shiftDetails.php';
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="shift_participants">
                    <?php

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>