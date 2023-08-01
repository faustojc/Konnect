<?php
main_header(['employee_profile']);
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

    /* Edited */
    .card {
        border-radius: 15px;
        box-shadow: none;
    }

    .card-header {
        border-radius: 15px 15px 0px 0px;
    }

    .card-footer {
        border-radius: 0px 0px 15px 15px;
    }

    /* Edited */
    .card-button-more {
        text-decoration: none;
        margin-top: 10px;
        background- border-radius: 25px;
        text-align: center;
        padding-left: 8px;
        width: 100%;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .card-head-custom {
        line-height: 1.5;
        font-size: 0.8rem;
    }

    .card-button-more:hover {
        opacity: 0.7;
    }

    .fs-14 {
        font-size: 14px;
    }

    .fw-500 {
        font-weight: 500;
    }

    body {
        background-color: #e9ebed;
    }

    #modalAddEmp {
        color: black;
    }

    .training-hover:hover {
        transform: scale(1.02);
        background-color: #F1F6F9;
        transition: .3s transform;
        /* box-shadow: 0 2px 5px rgba(0, 0, 0, .12); */

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

    .dropdown-item.active {
        background-color: #0dcaf0;
        color: #fff;
    }

    .dropdown-menu {
        border-radius: 15px;
    }

    /* Adjustments for smaller screens */
    @media (max-width: 768px) {
        .widget-user-image {
            margin-left: 0;
            margin-top: 20px;
            text-align: center;
        }

        .widget-user-image img {
            width: 100px;
            height: 100px;
        }
    }

    /* Adjustments for even smaller screens */
    @media (max-width: 480px) {
        .widget-user-image img {
            width: 80px;
            height: 80px;
        }
    }
</style>

<head>
    <title>Rating Form with Vue.js and Bootstrap Vue</title>
    <!-- Include Vue.js and Bootstrap Vue CSS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-vue@2.21.2/dist/bootstrap-vue.css">
</head>

<section class="content">

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-9 pl-5 mt-4">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header text-white" style="min-height: 25vh; max-height: 50vh; background: url('<?= base_url() ?>assets/images/Logo/cover-place.jpg') no-repeat center center;background-size: cover; border-radius: 15px 15px 0 0;">
                    </div>

                    <div class="card-footer bg-white" style="padding-top: 45px;">
                        <!-- Profile Picture -->

                        <div class="widget-user-image" style="left: 0; top: 0; margin-left: 15px; margin-top:100px;">
                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $details->Employee_image ?>" alt="User Avatar" style="
                                                  object-fit: cover;
                                                  min-width: 130px;
                                                  max-width: 130px;
                                                  min-height: 130px;
                                                  max-height: 130px;">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="description-block">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="widget-user-username text-left text-dark" style="font-weight: 600;">
                                            <?= ucwords(@$details->Fname) . " " . ucwords(@$details->Mname) . " " . ucwords(@$details->Lname) ?>
                                        </h5>
                                        <input type="text" value="<?= @$details->ID ?>" id="emp_id" hidden>
                                        <div>
                                            <?php if ($has_permission) {
                                                employee_edit_button($details->ID);
                                            } ?>
                                        </div>
                                    </div>

                                    <h5 class="widget-user-desc text-left text-dark" style="font-weight: 550; font-size:18px;">
                                        <?= ucwords(@$details->Title) ?>
                                    </h5>
                                    <h6 class="widget-user-desc text-left text-muted" style="font-weight: normal; font-size:15px;">
                                        <?= ucwords(@$details->Address) . ", " . ucwords(@$details->Barangay) . ", " . ucwords(@$details->City) ?>
                                        |
                                        <a class="" data-toggle="modal" data-target="#contact" style="color:#0dcaf0; cursor: pointer;">Contact
                                            details</a>
                                    </h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card card-white">
                    <div class="card-body" style="padding:1rem;">
                        <ul class="nav nav-pills " id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-employment-tab" data-toggle="pill" href="#pills-employment" role="tab" aria-controls="pills-employment" aria-selected="false">Employment</a>
                            </li>
                            <li class="nav-item dropdown d-sm-none">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    More </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" data-toggle="pill" href="#pills-training">Training</a>
                                    <a class="dropdown-item" data-toggle="pill" href="#pills-following">Following</a>
                                    <a class="dropdown-item" data-toggle="pill" href="#pills-feedback">Feedback</a>
                                    <a class="dropdown-item" data-toggle="pill" href="#pills-resume">Resume</a>
                                </div>
                            </li>
                            <li class="nav-item d-none d-sm-block">
                                <a class="nav-link" id="pills-training-tab" data-toggle="pill" href="#pills-training" role="tab" aria-controls="pills-training" aria-selected="false">Training</a>
                            </li>
                            <li class="nav-item d-none d-sm-block">
                                <a class="nav-link" id="pills-following-tab" data-toggle="pill" href="#pills-following" role="tab" aria-controls="pills-following" aria-selected="false">
                                    Following <span class="badge badge-info">
                                        <?= count($following) ?>
                                    </span> </a>
                            </li>
                            <li class="nav-item d-none d-sm-block">
                                <a class="nav-link" id="pills-feedback-tab" data-toggle="pill" href="#pills-feedback" role="tab" aria-controls="pills-feedback" aria-selected="false">Feedback</a>
                            </li>
                            <li class="nav-item d-none d-sm-block">
                                <a class="nav-link" id="pills-resume-tab" data-toggle="pill" href="#pills-resume" role="tab" aria-controls="pills-resume" aria-selected="false">Resume</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Start tab -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                        <div class="card card-white">
                            <div class="card-header" style="">
                                <h3 class="card-title fw-500 text-dark" style="font-weight:600;">About</h3>
                                <?php if ($has_permission): ?>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#Introduction_modal" style=" cursor: pointer;">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($has_permission): ?>
                                <?php if (empty($details->Introduction)): ?>
                                    <div class="d-flex flex-column flex-grow-1 px-4 py-4">
                                        <div class="d-flex align-items-center mb-1">
                                            <h5 class=" ml-1">
                                                <i class="fa-solid fa-pen-to-square "></i> Introduce your self
                                            </h5>
                                        </div>
                                        <div class="d-flex flex-column flex-grow-1">
                                            <p class="fs-14">Create a compelling first impression to future
                                                employers.</p>
                                            <button type="button" class="btn btn-light rounded-pill edit-summary" style="border-width: 2px" data-toggle="modal" data-target="#Introduction_modal">
                                                Add Introduction
                                            </button>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="card-body card-widget widget-user-2" style="padding-top:0.5rem;">
                                        <div class="widget-user-header px-2 py-2" style="padding:0; ">
                                            <?= $details->Introduction ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="card-body card-widget widget-user-2" style="padding-top:0.5rem;">
                                    <div class="widget-user-header px-2 py-2" style="padding:0; ">
                                        The user has not yet added an introduction.
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>

                        <!-- skills -->
                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title fw-500" style="font-weight:600;">Skills</h3>
                                <?php if ($has_permission): ?>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#skill_modal">
                                            <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="row pt-0 pb-4 px-4 py-3" id="load_skill">
                                <?= $skills_section_view ?>
                            </div>
                        </div>

                        <!-- education -->
                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title fw-500" style="font-weight:600;">Education</h3>
                                <?php if ($has_permission): ?>
                                    <div class="card-tools">
                                        <button type="button" data-toggle="modal" data-target="#ModalEduc" class="btn btn-tool">
                                            <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if ($has_permission): ?>
                                <div class="modal fade" id="ModalEduc" tabindex="-1" role="dialog" aria-labelledby="ModalEduc" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="px-2 py-2">
                                                        <div class="row pb-3">
                                                            <div class="col-md-6">
                                                                <label for="level">Level</label>
                                                                <select class="form-control select2" name="level" id="level" style="width: 100%;">
                                                                    <option selected="selected">ELEMENTARY</option>
                                                                    <option>JUNIOR HIGH</option>
                                                                    <option>SENIOR HIGH</option>
                                                                    <option>COLLEGE</option>
                                                                    <option>VOCATIONAL SCHOOL</option>
                                                                    <option>TECHNICAL SCHOOL</option>
                                                                    <option>UNIVERSITY</option>
                                                                    <option>GRADUATE SCHOOL</option>
                                                                    <option>CERTIFICATE PROGRAM</option>
                                                                    <option>DIPLOMA PROGRAM</option>
                                                                    <option>APPRENTICESHIP</option>
                                                                    <option>ONLINE LEARNING</option>
                                                                    <option>CONTINUING EDUCATION</option>
                                                                    <option>EXECUTIVE EDUCATION</option>
                                                                    <option>PROFESSIONAL DEVELOPMENT</option>
                                                                    <option>SELF-TAUGHT</option>
                                                                    <option>LANGUAGE SCHOOL</option>
                                                                    <option>ART SCHOOL</option>
                                                                    <option>BUSINESS SCHOOL</option>
                                                                    <option>MEDICAL SCHOOL</option>
                                                                    <option>LAW SCHOOL</option>
                                                                    <option>ENGINEERING SCHOOL</option>
                                                                    <option>DESIGN SCHOOL</option>
                                                                    <option>CULINARY SCHOOL</option>
                                                                    <option>PERFORMING ARTS SCHOOL</option>
                                                                    <option>MILITARY TRAINING</option>
                                                                    <option>RELIGIOUS EDUCATION</option>
                                                                    <option>REMOTE LEARNING</option>
                                                                    <option>WORKPLACE TRAINING</option>
                                                                    <option>SPECIAL EDUCATION</option>
                                                                    <option>EXTRACURRICULAR</option>
                                                                    <option>TUTORIALS</option>
                                                                    <option>INTERNSHIP</option>
                                                                    <option>HOMESCHOOLING</option>
                                                                    <option>RESEARCH PROGRAM</option>
                                                                    <option>SKILL DEVELOPMENT PROGRAM</option>
                                                                    <option>LECTURE SERIES</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="title">Title</label>
                                                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                                            </div>
                                                        </div>
                                                        <div class="pb-3">
                                                            <label for="institution">Institution</label>
                                                            <input type="text" class="form-control" name="institution" id="institution" placeholder="Enter Institution">
                                                        </div>
                                                        <div class="row pb-4">
                                                            <div class="col-md">
                                                                <label for="description">Description</label>
                                                                <div>
                                                                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter Description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row pb-3">
                                                            <div class="col-md-6">
                                                                <label for="start_date">Start Date</label>
                                                                <input type="date" class="form-control" id="start_date" name="start_date">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="end_date">End Date</label>
                                                                <input type="date" class="form-control" id="end_date" name="end_date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-info" id="save_education" data-dismiss="modal">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Body -->
                            <?php endif; ?>

                            <div class="py-3 px-3" id="load_educations">
                                <?= $educations_section_view ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-employment" role="tabpanel" aria-labelledby="pills-employment-tab">
                        <!-- employment -->
                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title fw-500" style="font-weight:600;">Employment</h3>

                                <?php if ($has_permission): ?>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modalAddEmp">
                                            <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalAddEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Add Employment
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="px-2 py-2" id="#needs-validation">
                                                            <input type="text" class="form-control" id="employee_id" name="employee_id" value="<?= $details->ID ?>" hidden readonly>
                                                            <div class="row pb-3">
                                                                <div class="col-md">
                                                                    <label for="employer_id">Select Employer</label>
                                                                    <select class="form-control" id="employer_id" name="employer_id">
                                                                        <?php foreach ($employers as $employer) { ?>
                                                                            <option value="<?php echo $employer->id ?>"><?php echo $employer->employer_name ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row pb-3">
                                                                <div class="col-md">
                                                                    <label for="job_title">Job Title</label>
                                                                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter Position">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md">
                                                                    <label for="status">Status</label>
                                                                    <input type="text" class="form-control" id="status" name="status" placeholder="Enter Status">
                                                                </div>
                                                            </div>
                                                            <div class="row px-3">
                                                                <div class="d-flex align-items-center">
                                                                    <p class="text-muted" style="font-weight: normal; font-size: 15px;">
                                                                        <input type="checkbox" id="show_status" name="show_status">
                                                                        Show Status
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row pb-2">
                                                                <div class="col-12">
                                                                    <label for="job_description">Job Description</label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <textarea name="job_description" id="job_description"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row pb-2">
                                                                <div class="col-md-6">
                                                                    <label for="start_date">Start Date</label>
                                                                    <input class="form-control" type="date" id="start_date" name="start_date" style="width:200px;">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="end_date">End Date</label>
                                                                    <input class="form-control" type="date" id="end_date" name="end_date" style="width:200px;">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="button" class="btn btn-info" data-dismiss="modal" id="btn_save_employment">
                                                            Add Details
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="p-3" id="load_employments">
                                <?= $employments_section_view ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-training" role="tabpanel" aria-labelledby="pills-training-tab">
                        <!-- training -->
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title fw-500" style="font-weight:600;">Training</h3>

                                <?php if ($has_permission): ?>
                                    <div class="card-tools">
                                        <button type="button" data-toggle="modal" data-target="#ModalTrain" class="btn btn-tool">
                                            <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($has_permission): ?>
                                <div class="modal fade" id="ModalTrain" tabindex="-1" role="dialog" aria-labelledby="ModalTrain" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Training</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="px-2 py-2" id="needs-validation">
                                                    <input type="text" id="employee_id" name="employee_id" value="<?= @$details->ID ?>" hidden readonly>
                                                    <div class="row pb-3">
                                                        <div class="col-md-12">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="row pb-4">
                                                        <div class="col-md">
                                                            <label for="training_description">Description</label>
                                                            <div>
                                                                <textarea class="form-control" name="training_description" id="training_description" rows="4" placeholder="Enter Description" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <section class="pb-3">
                                                        <div class="row pb-3">
                                                            <div class="col-md-6">
                                                                <label>Venue</label>
                                                                <input type="text" class="form-control" id="venue" name="venue" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>City</label>
                                                                <div>
                                                                    <input type="text" class="form-control" id="city" name="city" required>
                                                                </div>
                                                            </div>
                                                    </section>
                                                    <div class="row pb-3">
                                                        <div class="col-md-4">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control" id="s_date" name="s_date" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>End Date</label>
                                                            <div>
                                                                <input type="date" class="form-control" id="e_date" name="e_date" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Hours</label>
                                                            <input type="Number" class="form-control" id="hours" name="hours" placeholder="Enter Hours" required>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-info" id="btn_save_training" data-dismiss="modal">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <?= $training_section_view ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab">
                        <?php load_following($following) ?>
                    </div>
                    <div class="tab-pane fade" id="pills-feedback" role="tabpanel" aria-labelledby="pills-feedback-tab">
                        <?php load_feedback($feedbacks, $has_permission) ?>
                    </div>
                    <div class="tab-pane fade" id="pills-resume" role="tabpanel" aria-labelledby="pills-resume-tab">
                        <div class="card ">
                            <div class="card-header">
                                <h3 class="card-title fw-500" style="font-weight:600;">Add Resume</h3>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-info my-3" data-toggle="modal" data-target="#uploadModal" style="width: 250px;">
                                    Upload File
                                </button>
                            </div>

                            <!-- The Modal -->
                            <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="uploadModalLabel">Upload Resume</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="file">Select a file:</label>
                                                    <input type="file" class="form-control-file" name="file" id="file">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary" name="submit">Upload Resume
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 pl-2 pr-2 mt-4">
                    <!--<div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-600" style="font-weight:600;">Address</h3>
                        <?php if ($has_permission): ?>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#address_modal" style="opacity:1;  cursor: pointer;">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:5px; font-size:12px;">
                        <b>STREET:</b>
                        <h6 class="text-muted">
                            <?= ucwords(@$details->Address) ?>
                        </h6>
                    </div>
                    <div class="card-body " style="padding-top:10px;padding-bottom:5px; font-size:12px;">
                        <b>BARANGAY:</b>
                        <h6 class="text-muted">
                            <?= ucwords(@$details->Barangay) ?>
                        </h6>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:5px; font-size:12px;">
                        <b>CITY:</b>
                        <h6 class="text-muted">
                            <?= ucwords(@$details->City) ?>
                        </h6>
                    </div>
                </div> -->


                    <!-- JOBS EMPLOYED -->

                </div>

                <?php if ($has_permission): ?>
                    <!-- Introduction Modal -->
                    <div class="modal fade bd-example-modal-lg" id="Introduction_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Introduction</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <input type="text" id="ID" value="<?= @$details->ID ?>" hidden>
                                        <textarea class="form-control" name="Introduction" id="Introduction_Text" rows="4" placeholder="Enter Introduction"><?= @$details->Introduction ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info" id="update_introduction">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Modal -->
                    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel">
                                        <?= ucwords(@$details->Fname) . " " . ucwords(@$details->Mname) . " " . ucwords(@$details->Lname) ?>
                                    </h6>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="pb-3">Contact Details</h6>

                                    <h6 style="font-weight: normal;">
                                        <i class="fas fa-map-pin"></i><strong> Address</strong>
                                    </h6>
                                    <h6 style="font-weight: normal;">
                                        <?= ucwords(@$details->Address) . ", " . ucwords(@$details->Barangay) . ", " . ucwords(@$details->City) ?>
                                    </h6>
                                    <br>
                                    <h6 style="font-weight: normal;">
                                        <i class="fa fa-envelope"></i><strong> Email</strong></h6>
                                    <h6 style="font-weight: normal;">
                                        <?= $details->Email ?>
                                    </h6>
                                    <br>
                                    <h6 style="font-weight: normal;">
                                        <i class="fa fa-phone"></i><strong> Contact Number</strong>
                                    </h6>
                                    <h6 style="font-weight: normal;">
                                        <?= $details->Cnum ?>
                                    </h6>
                                    <br>

                                    <?php if ($has_permission): ?>
                                        <h6 style="font-weight: normal;">
                                            <i class="fa-solid fa-id-card"></i><strong> SSS</strong>
                                        </h6>

                                        <h6 style="font-weight: normal;">
                                            <?= $details->SSS ?>
                                        </h6>
                                        <br>
                                        <h6 style="font-weight: normal;">
                                            <i class="fa-solid fa-id-card"></i><strong> TIN</strong>
                                        </h6>
                                        <h6 style="font-weight: normal;">
                                            <?= $details->Tin ?>
                                        </h6>
                                        <br>
                                    <?php endif; ?>

                                    <h6 style="font-weight: normal;">
                                        <i class="fa-solid fa-cake-candles"></i><strong> Birthday</strong>
                                    </h6>
                                    <h6 style="font-weight: normal;">
                                        <?= $details->Bday ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Skill Modal -->
                    <div class="modal fade" id="skill_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="needs-validation">
                                        <div class="form-group">
                                            <label for="skill" class="col-form-label">Skill Name:</label>
                                            <input type="text" class="form-control" id="skill">
                                        </div>
                                        <div class="form-group">
                                            <label for="proficiency">Proficiency</label>
                                            <select class="form-control" style="width:100%;" name="proficiency" id="proficiency">
                                                <option value="beginner"> Beginner</option>
                                                <option value="intermediate"> Intermediate</option>
                                                <option value="advance"> Advance</option>
                                                <option value="expert"> Expert</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="years_exp" class="col-form-label">Years of Experience:</label>
                                            <input type="text" class="form-control" id="years_exp">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal" id="btn_skill">Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?php echo base_url() ?>assets/js/employee_profile/index.js"></script>
