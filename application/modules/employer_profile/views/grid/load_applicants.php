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
</style>

<!-- Review Application Modal -->
<div class="modal fade" id="view_details" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <img class="img-circle img-fluid" src="<?= base_url() ?>/assets/images/employee/profile_pic/default.png" alt="Profile pic" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-10">
                                <h6 class="p-0" id="employee_name" style="font-size: 13px; font-weight: 500;"></h6>
                                <h6 class="p-0" id="employee_title" style="font-size: 13px; font-weight: 400;"></h6>
                                <h6 class="p-0" id="employee_address" style="font-size: 13px; font-weight: 400;"></h6>
                            </div>
                        </div>

                        <h6 class="pt-3">Email Address</h6>
                        <h6 class="review_h p-2" id="employee_email" style="font-size: 13px; font-weight: 400;"></h6>
                        <h6 class="pt-3">City</h6>
                        <h6 class="review_h p-2" id="employee_city" style="font-size: 13px; font-weight: 400;"></h6>

                        <h6 class="pt-3">Resume</h6>
                        <div class="px-2">
                            <div class="resume-info">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Applicant Modal -->
<div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input name="id" id="id" value="" hidden readonly>
                    <input name="employee_id" value="" hidden readonly>
                    <input name="job_id" value="" hidden readonly>

                    <label for="name">Applicant Name</label>
                    <input type="text" class="form-control border-0" id="name" value="" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;" readonly disabled>

                    <label for="status" class="pt-3">Application Status</label>
                    <select class="form-control border-0" name="status" id="status" style="border-radius:15px; background-color: #F4F6F7;" required>
                        <option value="UNDER REVIEW">
                            Under Review
                        </option>
                        <option value="SCHEDULE FOR INTERVIEW">
                            Schedule for Interview
                        </option>
                        <option value="ACCEPTED">
                            Accepted
                        </option>
                        <option value="REJECTED">
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

<?php
$applicants = array_filter($applicants, static function ($applicant) {
    return strtoupper($applicant->status) != 'PENDING';
});

if (!empty($applicants)): ?>
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

                <?php foreach ($applicants as $applicant): ?>
                    <tr>
                        <td>
                            <a href="<?= base_url() ?>employee_profile?id=<?= $applicant->employee_id ?>" style="color:black;">
                                <?= ucwords($applicant->employeeName) ?>
                            </a>
                            <div class="d-block">
                                <a type="button" class="btn-view-applicant" style="font-size:13px;" data-toggle="modal" data-id="<?= $applicant->id ?>" data-job-id="<?= $applicant->job_id ?>" data-target="#view_details">
                                    View Details </a>
                            </div>
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
                            <button type="button" class="btn btn-edit-applicant" data-toggle="modal" data-id="<?= $applicant->id ?>" data-job-id="<?= $applicant->job_id ?>" data-target="#edit_status">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-default-info">
        <i class="fa fa-info-circle mr-1"></i> No applicants yet.
    </div>
<?php endif; ?>
