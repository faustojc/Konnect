<?php
$ci = &get_instance();
if (!empty($employments)) {
    for ($i = 0; $i < count($employments['employers']); ++$i) {
        $employer = $employments['employers'][$i];
        $employment = $employments['employments'][$i];

        ?>
        <div class="card-body card-widget widget-user-2 py-0">
            <div class="row">
                <div class="col-10">
                    <input type="text" class="form-control" id="employmentID" value="<?= @$employment->ID ?>" hidden>
                    <input type="text" class="form-control" id="employerID" value="<?= @$employment->employer_id ?>" hidden>
                    <input type="text" class="form-control" id="employeeID" value="<?= @$employment->employee_id ?>" hidden>
                    <ul class="timeline">
                        <li>
                            <h5 style="font-size: 18px; font-weight: 650;">
                                <?= ucwords(@$employer->employer_name) ?>
                            </h5>
                            <h6 style="margin-bottom:0px; font-size: 16px;">
                                <?= ucwords(@$employment->position) ?>
                            </h6>
                            <p class="text-muted" style="margin:0px;">
                                <?= date("M Y", strtotime(@$employment->start_date)) ?> to
                                <?= date("M Y", strtotime(@$employment->end_date)) ?>
                            </p>
                            <?php if ($employment->show_status == 1): ?>
                                <p class="status" style="margin:0px;">
                                    <?= ucwords(@$employment->status) ?>
                                </p>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>

                <div class="col-2 text-right">
                    <button class="delete_btn btn-tool" id="delete_employment" data-id="<?= @$employment->ID ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button type="button" class="edit_btn btn-tool edit-employment" data-toggle="modal" data-target="#emp<?= $i ?>">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </div>
            </div>
            &nbsp;

            <!-- Modal -->
            <div class="modal fade" id="emp<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?= $i ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal<?= $i ?>">Update Employment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="needs-validation">
                            <input type="text" class="form-control" id="employmentID" value="<?= @$employment->ID ?>" hidden>
                            <input type="text" class="form-control" id="employerID" value="<?= @$employment->employer_id ?>" hidden>
                            <input type="text" class="form-control" id="employeeID" value="<?= @$employment->employee_id ?>" hidden>
                            <div class="row p-3">
                                <div class="col-md">
                                    <label for="employer_name">Employer Name</label>
                                    <input type="text" class="form-control" id="employer_name" value="<?= ucwords(@$employer->employer_name) ?>" disabled>
                                </div>
                            </div>

                            <div class="row p-3">
                                <div class="col-md">
                                    <label for="positionEmp">Position</label>
                                    <input type="text" class="form-control" id="positionEmp" value="<?= @$employment->position ?>">
                                </div>
                            </div>

                            <div class="row p-3">
                                <div class="col-md-6">
                                    <label for="startDate">Start Date</label>
                                    <input type="date" id="startDate" name="start_date" value="<?= date('Y-m-d', strtotime(@$employment->start_date)) ?>" style="width:200px;">
                                </div>

                                <div class="col-md-6">
                                    <label for="endDate">End Date</label>
                                    <input type="date" id="endDate" name="end_date" value="<?= date('Y-m-d', strtotime(@$employment->end_date)) ?>" style="width:200px;">
                                </div>
                            </div>

                            <div class="row pt-3 px-3">
                                <div class="col-md-6">
                                    <label for="statusEmp">Status</label>
                                    <input type="text" class="form-control" id="statusEmp" value="<?= @$employment->status ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="ratingEmp">Rating</label>
                                    <input type="number" class="form-control" id="ratingEmp" value="<?= @$employment->rating ?>">
                                </div>
                            </div>

                            <div class="row pb-2 px-4">
                                <div class="d-flex align-items-center">
                                    <label for="show_status" style="font-weight: normal; font-size: 15px;">
                                        <input type="checkbox" name="inputCheck" id="show_status" value="<?= $employment->show_status ?>" <?php if ($employment->show_status == 1): ?> checked <?php endif; ?> />
                                        Show Status
                                    </label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info" id="edit_employment" data-dismiss="modal">Save edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    ?>
    <div class="d-flex flex-column flex-grow-1 px-2 py-2">
        <div class="d-flex align-items-center mb-1">
            <h5 class=" ml-1"><i class="fa-solid fa-pen-to-square "></i> Add Employment</h5>
        </div>
        <div class="d-flex flex-column flex-grow-1">
            <p class="fs-14">Share your professional experience to establish credibility for potential employers.</p>
            <!-- <button type="button" class="btn btn-light rounded-pill edit-summary" style="border-width: 2px" data-toggle="modal" data-target="#modalAddEmp">Add Employment</button> -->
        </div>
    </div>
<?php

}
?>
<style>
    .edit_btn,
    .delete_btn {
        padding-top: 2px;
        border: none;
    }

    ul.timeline {
        list-style-type: none;
        position: relative;
        margin: 0;
    }

    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 143%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 0;
        padding-left: 50px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #17a2b8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>