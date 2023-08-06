<?php
$formattedTimeDiff = formatTime($job->date_posted);

jobpost_update_modal($job, 'job_modal' . $job->id);
?>
<style>
    .alert.alert-secondary {
        color: #313131;
        border: none;
        background-color: #D9D9D9;
    }

    .review_h {
        font-size: 13px;
        font-weight: 500;
        border: 1px solid black;
        border-radius: 10px;
        ;
        /* You can change the color and width of the border here */
        padding: 5px;
        /* Adjust the padding as needed */
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
<!-- Review Application Modal -->

<div class="modal fade" id="view_details" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                            <div class="col-md-1">
                                <div class="widget-user-header">
                                    <div class="widget-user-image">
                                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="User Avatar" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-11 pl-2">
                                <h6 class="p-0" style="font-size: 13px; font-weight: 500;">Employee Name</h6>
                                <h6 class="p-0" style="font-size: 13px; font-weight: 400;">Title</h6>
                                <h6 class="p-0" style="font-size: 13px; font-weight: 400;">Address</h6>
                            </div>
                        </div>

                        <h6 class="pt-3">Email Address</h6>
                        <h6 class="review_h" style="font-size: 13px; font-weight: 400;">Employee@gmail.com</h6>

                        <h6 class="pt-3">City/Province</h6>
                        <h6 class="review_h" style="font-size: 13px; font-weight: 400;">Bacolod City</h6>

                        <h6 class="pt-3">Resume</h6>
                        <div class="px-2">
                            <div class="review_l row">
                                <div class="col-md-11">
                                    <div class="row p-2">
                                        <h4><i class="fa-solid fa-file pr-1 pt-2"></i></h4>
                                        <div class="pt-2">
                                            <h6>File_Name.pdf</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn">
                                        <i class="fa-solid fa-download button"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info mr-2 text-dark btn-accept">
                    Accept
                </button>
                <button type="button" class="btn btn-outline-danger btn-reject">
                    Reject
                </button>
            </div>
        </div>
    </div>
</div>


<div class="card card-light mb-0 sticky-top" style="top: 60px; max-height: calc(100vh - 70px);">
    <div class="card-header d-flex flex-column p-3">
        <div class="d-flex justify-content-between align-items-center" <a href="<?php echo base_url() ?>jobposting/job_info/<?= $job->id ?>" class="text-dark">
            <h4 class="card-title font-weight-bold mb-2" style="font-size: 18px; max-width: 90%;">
                <?= ucwords($job->title) ?>
                <span class="badge job-status">
                    <?= ucwords($job->filled) ?>
                </span>
            </h4>
            </a>
            <div class="col-1">
                <div class="btn-group dropleft" style="">
                    <button type="button" class="btn card-tool text-muted mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <div class="dropdown-menu" style="border-radius: 10px; box-shadow: none;">
                        <a class="dropdown-item edit-job-btn" data-toggle="modal" data-target="#job_modal<?= $job->id ?>" data-id="<?= $job->id ?>" role="button">Edit</a>
                        <a class="dropdown-item delete-job-btn" data-id="<?= $job->id ?>" role="button">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <small class="text-muted mb-2">Posted
            <?= $formattedTimeDiff ?>
        </small>
    </div>

    <div class="card-body">

        <div class="row pl-3 py-2">
            <h5 style="font-size: 18px;">Applicants:</h5>
        </div>

        <div class="row">
            <?php if (!empty($applicants)):
                $counter = 0; ?>
                <?php foreach ($applicants as $applicant): ?>
                    <?php if ($applicant->status != 'ACCEPTED' && $applicant->status != 'REJECTED'):
                        $counter++; ?>
                        <div class="col-12 col-md-6">
                            <a href="<?= base_url() ?>employee_profile?id=<?= $applicant->employee_id ?>" style="color:#000;">
                                <div class="row pl-3 pt-2">
                                    <div class="col-4 col-md-3">

                                        <div class="widget-user-image">
                                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $applicant->employeeImage ?>" alt="<?= $applicant->employeeName ?>" style="object-fit: cover;min-width: 50px; max-width: 50px; min-height: 50px; max-height: 50px;">
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-9">

                                        <h5 class="widget-user-username" style="font-size: 15px; font-weight: 500;">
                                            <?= $applicant->employeeName ?>
                                        </h5>


                                        <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 13px;">
                                            <?= $applicant->employeeTitle ?>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div style="transform: scale(0.8);" class="col-12 col-md-6 pt-3 pt-md-0 d-flex align-items-center">
                            <div class="d-flex justify-content-start">

                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#view_details">
                                    View Details
                                </button>
                            </div>
                        </div>



                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if ($counter == 0): ?>
                    <div class="col-12">
                        <div class="alert alert-secondary mb-0">
                            <i class="fas fa-info-circle mr-2"></i> No applications yet
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info mb-0">
                        <i class="fas fa-info-circle mr-2"></i> No applications yet
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>