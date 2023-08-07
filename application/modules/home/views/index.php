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
    }

    .card-header {
        border-radius: 15px 15px 0px 0px;
    }

    .card-footer {
        border-radius: 0px 0px 15px 15px;
    }

    .card-button-more {
        text-decoration: none;
        margin-top: 10px;
        background-color: white;
        border-radius: 25px;
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

    .fw-500 {
        font-weight: 500;
    }

    body {
        background-color: #e9ebed;
    }

    .hoveropac:hover {
        opacity: 0.7;
    }

    .hovercard:hover {
        transform: scale(1.01);
        background-color: #F1F6F9;
        transition: .3s transform;
        /* box-shadow: 0  1px 4px rgba(0, 0, 0, .15); */
    }

    .hoverbutton:hover {
        transform: scale(1.05);
        background-color: #F1F6F9;
        transition: .3s transform;
        /* box-shadow: 0  1px 4px rgba(0, 0, 0, .15); */
    }

    .modal-dialog {
        overflow-y: initial !important
    }

    .modal-body {
        height: 500px;
        overflow-y: auto;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */

    }

    .select2-container--default .select2-selection--multiple {
        background-color: #F4F6F7;
        border: 0px solid #aaa;
        border-radius: 10px;
        cursor: text;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 0;
        outline: 0;
    }

    .select2-container--default .select2-dropdown {
        border-radius: 15px 15px 15px 15px;
        border: 0 solid #ced4da;
        border-bottom-color: rgb(206, 212, 218);
        border-bottom-style: solid;
        border-bottom-width: 0px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #0dcaf0;
        border: 0px solid #aaa;
        border-radius: 10px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 4px;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected],
    .select2-container--default .select2-results__option--highlighted[aria-selected]:hover {
        background-color: #0dcaf0;
        color: #fff;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        cursor: pointer;
        display: inline-block;
        font-weight: bold;
        margin-right: 2px;
    }

    .scrollable-container::-webkit-scrollbar {
        width: 0.5rem;
        /* Adjust the width as needed */
    }

    .scrollable-container::-webkit-scrollbar-track {
        background-color: transparent;
    }

    .scrollable-container::-webkit-scrollbar-thumb {
        background-color: #888;
        /* Customize the scrollbar color */
        border-radius: 1rem;
        /* Adjust the border radius as needed */
    }

    @media (max-width: 576px) {
        .img-circle {
            max-width: 100px;
            margin: 0 auto;
        }
    }

    .scrollfunc {

        overflow-y: scroll; /* Add the ability to scroll */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .scrollfunc::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .scrollfunc {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }
</style>


<section class="content ">
    <div class="container-fluid">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-3 mt-4">
                <div class="sticky-top" style="top:65px;" id="user">
                    <?= $user_display ?>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-4">
                <!-- POSTS -->
                <?php if ($auth['user_type'] == 'EMPLOYER'): ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row pb-2">
                                <div class="col-1 d-flex justify-content-center">
                                    <img class="img-circle img-fluid " src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $details->image ?> " alt="User Avatar" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                </div>
                                <div class="col-11">
                                    <div class="card shadow-none hovercard" style="border-radius:10px; width:100%; height:100%; background-color: #F4F6F7;">
                                        <a data-toggle="modal" data-target="#jobpostmodal" style="width:100%; height:100%; text-decoration: none;cursor:pointer; color: #626567;">
                                            <p class="pt-3" style=" padding-left: 1rem; margin-bottom: 0px; ">
                                                <i class="fa-solid fa-pen-to-square"></i> Create new jobpost...
                                            </p>
                                        </a>
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
                                                <input id="title" name="title" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:10px;" type="text" placeholder="Enter Job Name">
                                            </div>

                                            <div class="row pt-2">
                                                <div class="col-6">
                                                    <label for="salary" style="">Salary</label>
                                                    <div class="input-group mb-3 ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text border-0" style="border-radius:10px 0 0 10px;">₱</span>
                                                        </div>
                                                        <input id="salary" name="salary" type="text" onclick="disableDotZero()" oninput="formatInput2()" class="form-control border-0" style="background-color: #F4F6F7; border-radius:0 10px 10px 0; " placeholder="Input Salary (optional) ">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="job_type">Job Type</label>
                                                        <select id="job_type" name="job_type" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                                            <option>Full time</option>
                                                            <option>Part time</option>
                                                            <option>Internship</option>
                                                            <option>Permanent</option>
                                                            <option>Shift work</option>
                                                            <option>Contract</option>
                                                            <option>Temporary</option>
                                                            <option>Freelance</option>
                                                            <option>Remote</option>
                                                            <option>Volunteer</option>
                                                            <option>Seasonal</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="shift">Schedule</label>
                                                        <select id="shift" name="shift" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                                            <option>Day shift</option>
                                                            <option>Night shift</option>
                                                            <option>Flextime</option>
                                                            <option>Weekend shift</option>
                                                            <option>Split shift</option>
                                                            <option>Rotating shift</option>
                                                            <option>On-call</option>
                                                            <option>Remote work</option>
                                                            <option>Part-time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="start_date">Start Date</label>
                                                    <input id="start_date" name="start_date" type="date" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                                </div>


                                                <div class=" col-4">
                                                    <div class="form-group">
                                                        <label for="filled">Status</label>
                                                        <select id="filled" name="filled" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
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
                                                        <label class="text-muted" style="font-size: 13px;">(click enter
                                                            to separate skills)</label>
                                                        <input id="skills_req" name="skills_req" class="form-control border-0" style="resize: none; background-color: #F4F6F7; border-radius: 10px;" type="text" placeholder="Skill#1, Skill#2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <textarea id="description" name="description" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;" cols="30" rows="10"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button id="btn_post" type="button" class="btn text-dark" style="border-radius:10px; width:100%; background-color: #F4F6F7;">
                                            Post
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <!-- JOBPOSTS -->
                <div id="jobpost_section">
                    <?php jobpost_all_display($jobpostings); ?>
                </div>
            </div>

            <div class="col-12 col-md-3 mt-4">
                <div class="sticky-top scrollfunc" style="top: 65px; height: calc(100vh - 65px); ;">

                    <!-- EMPLOYEES -->
                    <div class="d-md-none"> <!-- Hide on medium-sized screens and above -->
                        <!-- You can optionally add a button or link to toggle the employees section -->
                    </div>

                    <div class="card card-widget widget-user-2 d-none d-md-block">
                        <!-- Show on medium-sized screens and above -->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-500">Employees</h3>
                        </div>
                        <div class="py-2" id="load_employees_follow_section " style="margin-left: 1rem; margin-right: 1rem;">
                            <?php load_employees($employees); ?>
                        </div>
                    </div>

                    <!-- EMPLOYERS -->
                    <div class="d-md-none"> <!-- Hide on medium-sized screens and above -->
                        <!-- You can optionally add a button or link to toggle the employers section -->
                    </div>

                    <div class="card card-widget widget-user-2 d-none d-md-block">
                        <!-- Show on medium-sized screens and above -->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-500">Employers</h3>
                        </div>
                        <div class="py-2" id="load_employers_follow_section" style="margin-left: 1rem; margin-right: 1rem;">
                            <?php if ($auth['user_type'] == 'EMPLOYEE'): ?>
                                <?php load_employers($employers, $following); ?>
                            <?php else: ?>
                                <?php load_employers($employers); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php applyModal(); ?>

        </div>
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?= base_url() ?>assets/js/applicant/index.js"></script>
<script src="<?= base_url() ?>assets/js/dashboard/index.js"></script>
