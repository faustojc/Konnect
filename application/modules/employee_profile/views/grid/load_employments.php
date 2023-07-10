<?php
$ci = &get_instance();
if (!empty($details)) {
    foreach ($details as $key => $value) {
        $employer = $value['employer'];
        $employment = $value['employment'];

        ?>
        <div class="card-body card-widget widget-user-2">
            <div class="card-body">
                <div id="content">
                    <input type="text" class="form-control" id="employmentID" value="<?= @$employment->ID ?>" hidden>
                    <input type="text" class="form-control" id="employerID" value="<?= @$employment->employer_id ?>" hidden>
                    <input type="text" class="form-control" id="employeeID" value="<?= @$employment->employee_id ?>" hidden>
                    <button type="button" class="edit_btn btn-tool edit-employment" data-toggle="modal" data-target="#emp<?= $key ?>">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="delete_btn btn-tool" id="delete_employment" data-id="<?= @$employment->ID ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="emp<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?= $key ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal<?= $key ?>">Update Employment</h5>
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

                                    <div class="row p-3">
                                        <div class="col-md-4">
                                            <label for="statusEmp">Status</label>
                                            <input type="text" class="form-control" id="statusEmp" value="<?= @$employment->status ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ratingEmp">Rating</label>
                                            <input type="number" class="form-control" id="ratingEmp" value="<?= @$employment->rating ?>">
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center">
                                            <label for="show_status">
                                                <input type="checkbox" name="inputCheck" id="show_status" value="<?= $employment->show_status ?>"
                                                    <?php if ($employment->show_status == 1): ?>
                                                        checked
                                                    <?php endif; ?>
                                                />
                                                Show Status
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="edit_employment">Save edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="employment">
                        <h5><?= ucwords(@$employer->employer_name) ?></h5>
                        <h6><?= ucwords(@$employment->position) ?> </h6>
                        <p><?= $employment->start_date ?> to <?= $employment->end_date ?></p>
                        <?php if ($employment->show_status == 1): ?>
                            <p class="status"><?= ucwords(@$employment->status) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    ?>
    <div>
        <center>
            <h6 style="color:red">No Data Found.</h6>
        </center>
    </div>
    <?php

}
?>
<style>
    .edit_btn,
    .delete_btn {
        float: right;
        border: none;
    }

</style>