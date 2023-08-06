<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 17px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(13px);
        -ms-transform: translateX(13px);
        transform: translateX(13px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 17px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .review_h {
        font-size: 13px;
        font-weight: 500;
        border: 1px solid black;
        border-radius: 10px;
    }

    .review_l {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border: 1px solid black;
        border-radius: 10px;
    }

    .review_l h4 {
        margin-right: 10px;
    }

    .review_l h6 {
        font-size: 13px;
        font-weight: 500;
        margin: 0;
    }

    .review_l .uploaded {
        font-weight: 400;
    }
</style>


<?php if (!empty($applicants)) { ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Applicant List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-inline py-2">
                <div class="input-group">
                    <input class="form-control form-control-sidebar" id="search_applicant" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <table id="applicants_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Status</th>
                    <th>Date Applied</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($applicants as $index => $applicant) { ?>
                    <tr>
                        <td>
                            <a href="<?= base_url() ?>employee_profile?id=<?= $applicant->employee_id ?>" style="color:black;">
                                <?= ucwords($applicant->employeeName) ?>
                            </a>
                            <a type="button" style="font-size:12px; color:#adadad;" data-toggle="modal" data-target="#view_details<?= $applicant->id ?>">
                                View Details </a>
                        </td>
                        <td>
                            <?= $applicant->job_title ?>
                        </td>
                        <!-- Application Status -->
                        <td><span class="badge badge-light"><?= $applicant->status ?></span></td>
                        <td>
                            <!-- Start Date -->
                            <?= date("m/d/y", strtotime($applicant->date_created)) ?>
                        </td>

                        <td>
                            <button type="button" class="btn" data-toggle="modal" data-target="#edit_status<?= $applicant->id ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Review Application Modal -->
                    <div class="modal fade" id="view_details<?= $applicant->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Review Applicant Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Contact Info</h6>
                                            <div class="row pt-3">
                                                <div class="col">
                                                    <div class="widget-user-header">
                                                        <div class="widget-user-image">
                                                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $applicant->employeeImage ?>" alt="User Avatar" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <h6 class="p-0" style="font-size: 13px; font-weight: 500;"> <?= ucwords($applicant->employeeName) ?></h6>
                                                    <h6 class="p-0" style="font-size: 13px; font-weight: 400;"><?= ucwords($applicant->employeeTitle) ?></h6>
                                                    <h6 class="p-0" style="font-size: 13px; font-weight: 400;"><?= $applicant->employeeAddress ?></h6>
                                                </div>
                                            </div>

                                            <h6 class="pt-3">Email Address</h6>
                                            <h6 class="review_h p-2" style="font-size: 13px; font-weight: 400;"><?= $applicant->employeeEmail ?></h6>
                                            <h6 class="pt-3">City/Province</h6>
                                            <h6 class="review_h p-2" style="font-size: 13px; font-weight: 400;"><?= $applicant->employeeCity . ', ' . $applicant->employeeProvince ?></h6>

                                            <h6 class="pt-3">Resume</h6>
                                            <div class="px-2">
                                                <div class="review_l row">
                                                    <div class="col p-2">
                                                        <a target="_blank" href="<?= base_url() ?>assets/documents/resume/<?= $applicant->employee_id ?>/<?= $applicant->resumeFileName ?>">
                                                            <div class="d-flex">
                                                                <h4><i class="fa-solid fa-file pr-1 pt-2"></i></h4>
                                                                <div class="d-block text-truncate">
                                                                    <h6><?= $applicant->resumeFileName ?></h6>
                                                                    <small><?= $applicant->resumeFileSize ?></small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Applicant Modal -->
                    <div class="modal fade" id="edit_status<?= $applicant->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input name="id" id="id" value="<?= $applicant->id ?>" hidden readonly>
                                        <input name="employee_id" value="<?= $applicant->employee_id ?>" hidden readonly>
                                        <input name="job_id" value="<?= $applicant->job_id ?>" hidden readonly>

                                        <label for="name">Applicant Name</label>
                                        <input type="text" class="form-control border-0" id="name" value="<?= ucwords($applicant->employeeName) ?>" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;" readonly disabled>

                                        <label for="status" class="pt-3">Application Status</label>
                                        <select class="form-control border-0" name="status" id="status" style="border-radius:15px; background-color: #F4F6F7;" required>
                                            <option value="UNDER REVIEW" <?= (strtoupper($applicant->status) == 'UNDER REVIEW') ? 'selected' : '' ?>>
                                                Under Review
                                            </option>
                                            <option value="SCHEDULE FOR INTERVIEW" <?= (strtoupper($applicant->status) == 'SCHEDULE FOR INTERVIEW') ? 'selected' : '' ?>>
                                                Schedule for Interview
                                            </option>
                                            <option value="ACCEPTED" <?= (strtoupper($applicant->status) == 'ACCEPTED') ? 'selected' : '' ?>>
                                                Accepted
                                            </option>
                                            <option value="REJECTED" <?= (strtoupper($applicant->status) == 'REJECTED') ? 'selected' : '' ?>>
                                                Rejected
                                            </option>
                                        </select>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info update-status">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
} else { ?>
    <div class="alert alert-default-info">
        <i class="fa fa-info-circle mr-1"></i> No applicants yet.
    </div>
<?php } ?>
