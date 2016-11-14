<div class="col-xs-9">
    <div class="jumbotron jumboFix">
        <div class="page-header headerFix"><h3 class="h3Fix">Shifts</h3></div>
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#all_Shifts" aria-controls="all_Sifts" role="tab" data-toggle="tab">All shifts</a></li>
                <li role="presentation"><a href="#my_Shifts" aria-controls="my_Shifts" role="tab" data-toggle="tab">My shift(s)</a></li>
                <li role="presentation"><a href="#create_Shift" aria-controls="create_Shift" role="tab" data-toggle="tab">Create shift</a></li>
                <li role="presentation"><a href="#my_Offer" aria-controls="my_Offer" role="tab" data-toggle="tab">My offer(s)</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="all_Shifts">
                    <?php
                    include 'shiftCards.php';
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="my_Shifts">
                    <?php

                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="create_Shift">
                    <?php
                    include 'createShift.php';
                    ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="my_Offer">
                    <?php

                    ?>
                </div>
            </div>

        </div>
    </div>
</div>