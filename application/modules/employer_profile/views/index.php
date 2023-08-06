<?php
main_header(['Employer_profile']);
?>
<!-- ############ PAGE START-->
<style>
    /* Remove spinner for number input */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .table-black td {
        border-top: 1px solid black;
    }

    .list-3 li {
        margin-top: 5px;
        margin-bottom: 5px;
        text-transform: capitalize;
    }

    .list-3 a {
        text-decoration: none;
        color: #212529;
    }

    .list-3 a:hover {
        color: #17a2b8;
    }

    .card {
        border-radius: 15px;
        box-shadow: none;
        overflow: hidden;
    }

    .card-header {
        border-radius: 15px 15px 0px 0px;
    }

    .card-footer {
        border-radius: 0 0 15px 15px;
    }

    .fw-500 {
        font-weight: 500;
    }

    body {
        background-color: #e9ebed;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show > .nav-link {
        color: #fff;
        background-color: #0dcaf0;
    }

    .nav-pills .nav-link:not(.active):hover {
        color: #0dcaf0;
    }

    .nav-pills .nav-link {
        border-radius: 10px;
    }

    .btn-info {
        color: #fff;
        background-color: #0dcaf0;
        border-color: #0dcaf0;
        box-shadow: none;
    }

    .btn-info:hover {
        color: #fff;
        background-color: #40acc2;
        border-color: #40acc2;
    }

    @media (max-width: 576px) {
        .nav-pills .nav-item {
            flex: 0 0 33.33%;
        }

        .nav-pills .nav-item {
            width: 100%;
        }
    }
</style>

<section class="content">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-9 pl-5 mt-4">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header text-white" style="background: url('<?= base_url() ?>assets/images/Logo/cover-place.jpg') center center; min-height: 25vh; max-height: 50vh; background-repeat: no-repeat; background-size: cover; border-radius: 15px 15px 0px 0px;">
                    </div>
                    <div class="widget-user-image" style="left: 0; top: 0; margin-left: 15px; margin-top:100px;">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $current_employer->image ?>" alt="User Avatar" style="
                          object-fit: cover;
                          min-width: 100px;
                          max-width: 100px;
                          min-height: 100px;
                          max-height: 100px;">
                    </div>
                    <div class="card-footer" style="padding-top: 45px;background-color:#FFF;">
                        <div class="row">
                            <div class="col-12">
                                <div class="description-block">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 m-md-0">
                                            <h5 class="widget-user-username text-left" style="font-weight: 500;  width: 500px;">
                                                <?= $current_employer->tradename ?>
                                                <?php verifyBadge($curr_auth); ?>
                                            </h5>
                                            <!-- <p class="text-left mb-1">
                                                <?php if (empty($current_employer->employer_name)) {
                                                echo $current_employer->tradename;
                                            } else {
                                                echo $current_employer->employer_name;
                                            } ?>
                                            </p> -->
                                            <h5 class="widget-user-desc text-left text-dark py-2" style="font-weight: 550; font-size:18px; ">
                                                <?= $current_employer->business_type ?>
                                            </h5>
                                            <h6 class="widget-user-desc text-left text-muted" style="font-weight: normal; font-size: 15px; width: 500px;">
                                                <?= ucwords(@$current_employer->city) ?>
                                                |
                                                <a class="text-info" data-toggle="modal" data-target="#contact" style="cursor: pointer;">
                                                    Contact details </a>
                                            </h6>
                                        </div>
                                        <div class="col-md-6">

                                            <?php if ($has_permission): ?>
                                                <?php employer_edit_button($current_employer->id); ?>
                                            <?php elseif ($auth['user_type'] == 'EMPLOYEE'): ?>
                                                <div class="float-right">
                                                    <?php follow_button($current_employer->id, $following); ?>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-white">
                    <div class="card-body" style="padding:1rem;">
                        <ul class="nav nav-pills flex-wrap" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-followers-tab" data-toggle="pill" href="#pills-followers" role="tab" aria-controls="pills-followers" aria-selected="false">
                                    Followers <span class="badge badge-info d-none d-sm-inline-block">
                                        <?= count($followers) ?>
                                    </span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-feedback-tab" data-toggle="pill" href="#pills-feedback" role="tab" aria-controls="pills-feedback" aria-selected="false">
                                    Feedback </a>
                            </li>
                            <?php if ($has_permission): ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-applicants-tab" data-toggle="pill" href="#pills-applicants" role="tab" aria-controls="pills-applicants" aria-selected="true">
                                        Applicants <i class="fas fa-lock ml-2"></i> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-employeelist-tab" data-toggle="pill" href="#pills-employeelist" role="tab" aria-controls="pills-employeelist" aria-selected="true">
                                        Employee List <i class="fas fa-lock ml-2"></i> </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title fw-500">Summary</h3>
                                <?php if ($has_permission): ?>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool edit-summary" data-toggle="modal" data-target="#summary-modal">
                                            <i class="fa-solid fa-pen" style="color: grey;"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-body card-widget widget-user-2" id="load_summary">
                                <?= $current_employer->summary ?>
                            </div>

                            <?php if ($has_permission): ?>
                                <!-- MODAL SUMMARY -->
                                <div class="modal fade" id="summary-modal" data-keyboard="false" tabindex="-1" aria-labelledby="summary-modal-label" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="summary-modal-label">Edit summary</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="p-3">
                                                    <h3 class="font-weight-light mb-3">Edit your summary</h3>
                                                    <p class="text-muted">A summary of your company should be concise,
                                                        informative, and engaging, highlighting the main reasons why
                                                        someone would want to work for you.</p>
                                                    <textarea id="summary"></textarea>
                                                    <p class="text-danger float-left summary-warning" hidden>
                                                        <i class="text-danger fa fa-exclamation-circle"></i> Character
                                                        exceeds 2000
                                                    </p>
                                                    <p class="text-muted float-right" id="summary_character_count"></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                    Dismiss
                                                </button>
                                                <button type="button" class="btn btn-outline-primary" id="update_summary">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="card card-white">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-500">Job Post</h3>
                            </div>
                        </div>
                        <div id="jobpost_section">
                            <?php jobpost_all_display($jobpostings) ?>
                        </div>
                    </div>


                    <!-- Followers -->
                    <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab">
                        <?php load_followers($followers); ?>
                    </div>

                    <!-- Feedback -->
                    <div class="tab-pane fade" id="pills-feedback" role="tabpanel" aria-labelledby="pills-feedback-tab">
                        <?php load_feedback($feedbacks, $has_permission); ?>
                    </div>

                    <?php if ($has_permission): ?>
                        <div class="tab-pane fade" id="pills-applicants" role="tabpanel" aria-labelledby="pills-applicants-tab">
                            <?= $applicant_view ?>
                        </div>
                        <div class="tab-pane fade" id="pills-employeelist" role="tabpanel" aria-labelledby="pills-employeelist-tab">
                            <?= $employeelist_view ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Contact Modal -->
            <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">
                                <?= ucwords($current_employer->tradename) ?>
                            </h6>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6 class="pb-3">Contact Details</h6>

                            <h6 style="font-weight: normal;"><i class="fas fa-map-pin"></i><strong> Address</strong>
                            </h6>
                            <h6 style="font-weight: normal;">
                                <?= ucwords($current_employer->address . ', ' . $current_employer->barangay . ', ' . $current_employer->city) ?>
                            </h6>
                            <br>
                            <h6 style="font-weight: normal;"><i class="fa fa-envelope"></i><strong> Email</strong></h6>
                            <h6 style="font-weight: normal;">
                                <?= $current_employer->email ?>
                            </h6>
                            <br>
                            <h6 style="font-weight: normal;"><i class="fa fa-phone"></i><strong> Contact Number</strong>
                            </h6>
                            <h6 style="font-weight: normal;">
                                <?= $current_employer->contact_number ?>
                            </h6>
                            <br>

                            <?php if ($has_permission): ?>
                                <h6 style="font-weight: normal;"><i class="fa-solid fa-id-card"></i><strong>
                                        SSS</strong>
                                </h6>

                                <h6 style="font-weight: normal;">
                                    <?= $current_employer->sss ?>
                                </h6>
                                <br>
                                <h6 style="font-weight: normal;"><i class="fa-solid fa-id-card"></i><strong>
                                        TIN</strong>
                                </h6>
                                <h6 style="font-weight: normal;">
                                    <?= $current_employer->tin ?>
                                </h6>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="jobpostmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius:15px;">
        <div class="modal-dialog modal-lg modal-dialog-centered " role="document" style="width:;">
            <div class="modal-content border-0" style="border-radius:15px;">
                <div class="border-0">

                    <h5 class="text-center pt-3 pb-2" id="exampleModalLabel" style="font-weight:650;">
                        <i class="fa-solid fa-pen-to-square"></i> Create Jobpost
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="pr-3" aria-hidden="true">&times;</span>
                        </button>
                    </h5>

                </div>
                <div class="modal-body border-0">
                    <form>
                        <div class="pb-1">
                            <label for="title" style="">Job Title</label>
                            <input id="title" name="title" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:10px;" type="text" placeholder="Enter Job Name" required>
                        </div>

                        <div class="row pt-2">
                            <div class="col-6">
                                <label for="salary" style="">Salary</label>
                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0" style="border-radius:10px 0 0 10px;">₱</span>
                                    </div>
                                    <input id="salary" name="salary" type="text" onclick="disableDotZero()" oninput="formatInput2()" class="form-control border-0" style="background-color: #F4F6F7; border-radius:0 10px 10px 0; " placeholder="Input Salary ">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="job_type">Job Type</label>
                                    <select id="job_type" name="job_type" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" required>
                                        <option>Full time</option>
                                        <option>Part time</option>
                                        <option>Internship</option>
                                        <option>Permanent</option>
                                        <option>Shift work</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="shift">Schedule</label>
                                    <select id="shift" name="shift" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" required>
                                        <option>Day</option>
                                        <option>Night</option>
                                        <option>Flextime</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="start_date">Start Date</label>
                                <input id="start_date" name="start_date" type="date" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" required>
                            </div>


                            <div class=" col-4">
                                <div class="form-group">
                                    <label for="filled">Status</label>
                                    <select id="filled" name="filled" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" required>
                                        <option>Open</option>
                                        <option>Closed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" style="border: 0;">
                                    <label for="skills_req">Skills Requirements</label>
                                    <label class="text-muted" style="font-size: 13px;"> (click enter to separate
                                        skills) </label>
                                    <input id="skills_req" name="skills_req" class="form-control border-0" style="resize: none; background-color: #F4F6F7; border-radius: 10px;" type="text" placeholder="Skill#1, Skill#2">
                                </div>
                            </div>
                        </div>
                        <div>
                            <textarea id="description" name="description" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button id="post_job" type="button" class="btn text-dark" style="border-radius:10px; width:100%; background-color: #F4F6F7;">
                        Post
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?= base_url() ?>assets/js/employer_profile/index.js"></script>

<?php if ($auth['user_type'] == 'EMPLOYEE'): ?>
    <script src="<?= base_url() ?>assets/js/follow/index.js"></script>
    <script src="<?= base_url() ?>assets/js/applicant/index.js"></script>
<?php endif; ?>
