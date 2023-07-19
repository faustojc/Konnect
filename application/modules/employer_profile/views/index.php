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
    .nav-pills .show>.nav-link {
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
</style>

<section class="content">
    <div class="container">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-8 pl-2 pr-2 mt-4">
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
                                            <h5 class="widget-user-username text-left" style="font-weight: 500;">
                                                <?= $current_employer->tradename ?>

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
                                            <h6 class="widget-user-desc text-left text-muted" style="font-weight: normal; font-size:15px;">
                                                <?= ucwords(@$current_employer->address) . ", " . ucwords(@$current_employer->city) ?> |
                                                <a class="text-info" data-toggle="modal" data-target="#contact" style=" cursor: pointer;">Contact details</a>
                                            </h6>

                                        </div>
                                        <div class="col-md-6">

                                            <?php if ($has_permission): ?>
                                                <?php employer_edit_button($current_employer->id); ?>
                                            <?php elseif ($auth['user_type'] != 'EMPLOYER'): ?>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-info" style=" line-height: 5px; border-radius:10px;">Follow <i class="fa-solid fa-plus"></i></button>
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
                        <ul class="nav nav-pills " id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-followers-tab" data-toggle="pill" href="#pills-followers" role="tab" aria-controls="pills-followers" aria-selected="false">
                                    Followers
                                    <span class="badge badge-info">
                                        <?= count($followers) ?>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-feedback-tab" data-toggle="pill" href="#pills-feedback" role="tab" aria-controls="pills-feedback" aria-selected="false">Feedback</a>
                            </li>
                        </ul>

                    </div>

                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title fw-500">Summary</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool edit-summary" data-toggle="modal" data-target="#summary-modal">
                                        <i class="fa-solid fa-pen" style="color: grey;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body card-widget widget-user-2" id="load_summary">
                                <?= $current_employer->summary ?>
                            </div>

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
                                                <p class="text-muted">A summary of your company should be concise, informative, and engaging, highlighting the main reasons why someone would want to work for you.</p>
                                                <textarea id="summary"></textarea>
                                                <p class="text-danger float-left summary-warning" hidden>
                                                    <i class="text-danger fa fa-exclamation-circle"></i>
                                                    Character exceeds 2000
                                                </p>
                                                <p class="text-muted float-right" id="summary_character_count"></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Dismiss</button>
                                            <button type="button" class="btn btn-outline-primary" id="update_summary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-white">
                            <div class="card-header">
                                <h3 class="card-title fw-500">Job Posted Lists</h3>
                                <div class="card-tools">
                                    <a href="<?= base_url() ?>jobposting?id=<?= $current_employer->id ?>" class="btn btn-tool">
                                        <i class="fa-solid fa-pen" style="color: grey;"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- JOB POSTINGS -->
                            <div class="accordion rounded-0" id="load_jobpostings">
                                <?= $jobpostings_view ?>
                            </div>
                        </div>
                    </div>

                    <!-- Followers -->
                    <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab">
                        <?php load_followers($followers); ?>
                    </div>

                    <!-- Feedback Employer side -->
                    <div class="tab-pane fade" id="pills-feedback" role="tabpanel" aria-labelledby="pills-feedback-tab">
                        <?php if (!empty($feedbacks)): ?>
                            <div class="row">
                                <?php foreach ($feedbacks as $feedback): ?>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="col-1 d-flex justify-content-center align-items-center ml-3">
                                                        <img class="rounded-circle" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="Employee Profile Pic" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="card-title">
                                                            <?= $feedback->employee_name ?>
                                                        </h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            <?= $feedback->position_title ?>
                                                        </h6>
                                                        <h6 class="card-subtitle mb-2 text-muted">Ratings</h6>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <!-- Display the star ratings here -->
                                                    <?php
                                                    $rating = $feedback->rating; // Replace with the actual rating value from your data
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $rating) {
                                                            echo '<i class="bi bi-star-fill"></i>';
                                                        } else {
                                                            echo '<i class="bi bi-star"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <p class="card-text mt-3">
                                                    <?= $feedback->content ?>
                                                </p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">You haven't received a feedback yet.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- feedback employer side -->

                    <!-- feedback employee side -->
                    <div class="tab-pane fade" id="pills-feedback" role="tabpanel" aria-labelledby="pills-feedback-tab">
                        <?php if (!empty($feedbacks)): ?>
                            <h4>Feedbacks received by the company:</h4>
                            <div class="row">
                                <?php foreach ($feedbacks as $feedback): ?>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="col-1 d-flex justify-content-center align-items-center ml-3">
                                                        <img class="rounded-circle" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="Employee Profile Pic" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                                    </div>
                                                    <div class="ml-4">
                                                        <h5 class="card-title">
                                                            <?= $feedback->employee_name ?>
                                                        </h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">
                                                            <?= $feedback->position_title ?>
                                                        </h6>
                                                        <h6 class="card-subtitle mb-2 text-muted">Ratings</h6>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <!-- Display the star ratings here -->
                                                    <?php
                                                    $rating = $feedback->rating; // Replace with the actual rating value from your data
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $rating) {
                                                            echo '<i class="bi bi-star-fill"></i>';
                                                        } else {
                                                            echo '<i class="bi bi-star"></i>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <p class="card-text mt-3">
                                                    <?= $feedback->content ?>
                                                </p>
                                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">The company has not received a feedback yet.</p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($hasReceivedEmployeeFeedback): ?>
                            <!-- Feedbacks received by the employee -->
                            <h4>Feedback received:</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="col-1 d-flex justify-content-center align-items-center ml-3">
                                                    <img class="rounded-circle" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="Employee Profile Pic" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                                </div>
                                                <div class="ml-4">
                                                    <h5 class="card-title">
                                                        <?= $employerFeedback->tradename ?>
                                                    </h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        <?= $employerFeedback->position_title ?>
                                                    </h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">Ratings</h6>
                                                </div>
                                            </div>
                                            <div class="rating">
                                                <!-- Display the star ratings here -->
                                                <?php
                                                $rating = $employerFeedback->rating; // Replace with the actual rating value from your data
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $rating) {
                                                        echo '<i class="bi bi-star-fill"></i>';
                                                    } else {
                                                        echo '<i class="bi bi-star"></i>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <p class="card-text mt-3">
                                                <?= $employerFeedback->content ?>
                                            </p>
                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">You haven't received any feedback from your employer(s).</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- feedback employee side -->
                </div>
            </div>

            <div class="col-12 col-md-4 pl-2 pr-2 mt-4">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Home Address</h3>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <strong>City: </strong>
                        <?= $current_employer->city ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <strong>Barangay: </strong>
                        <?= $current_employer->barangay ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <strong>Address: </strong>
                        <?= $current_employer->address ?>
                    </div>
                </div>

                <div class="modal fade" id="modal_edit_home_address" data-backdrop="static" tabindex="-1" aria-labelledby="modal_home_address" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_home_address">Edit Home Address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="pb-3">
                                    <label for="address">City</label>
                                    <input type="text" class="form-control" id="city" value="<?= $current_employer->city ?>" placeholder="Enter Address" required>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label for="barangay">Barangay</label>
                                        <input type="text" class="form-control" id="barangay" value="<?= $current_employer->barangay ?>" placeholder="Enter Barangay" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city">Address</label>
                                        <input type="text" class="form-control" id="address" value="<?= $current_employer->address ?>" placeholder="Enter City" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Business Information</h3>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <strong>Trade Name: </strong>
                        <?= $current_employer->tradename ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <strong>Business Type: </strong>
                        <?= $current_employer->business_type ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <strong>SSS Number: </strong>
                        <?= $current_employer->sss ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <strong>TIN Number: </strong>
                        <?= $current_employer->tin ?>
                    </div>
                </div>

                <!-- MODAL for BUSINESS INFO -->
                <div class="modal fade" id="modal_edit_business" data-backdrop="static" tabindex="-1" aria-labelledby="modal_business" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal_business">Edit Business Info</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="pb-3">
                                    <label for="tradename">Trade Name</label>
                                    <input type="text" class="form-control" id="tradename" value="<?= $current_employer->tradename ?>" placeholder="Enter Trade Name" required>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label for="business_type">Business Type</label>
                                        <select class="custom-select" name="business_type" id="business_type" value="<?= $current_employer->business_type ?>" aria-selected="<?= $current_employer->business_type ?>">
                                            <option value="Retail">Retail</option>
                                            <option value="Food and Beverages">Food and Beverages</option>
                                            <option value="Information Technology">Information Technology</option>
                                            <option value="Finance and Banking">Finance and Banking</option>
                                            <option value="Healthcare">Healthcare</option>
                                            <option value="Education">Education</option>
                                            <option value="Manufacturing and Engineering">Manufacturing and Engineering</option>
                                            <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                            <option value="Media and Entertainment">Media and Entertainment</option>
                                            <option value="Energy and Utilities">Energy and Utilities</option>
                                            <option value="Transportation and Logistics">Transportation and Logistics</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sss">SSS Number</label>
                                        <input type="number" class="form-control" id="sss" value="<?= $current_employer->sss ?>" placeholder="Enter SSS Number" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tin">TIN Number</label>
                                        <input type="number" class="form-control" id="sss" value="<?= $current_employer->tin ?>" placeholder="Enter TIN Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- EMPLOYEES -->
                <div class="card card-widget widget-user-2">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Employees</h3>
                    </div>
                    <div id="load_employees_follow_section" style="margin-left: 1rem; margin-right:1rem;">
                        <?php load_employees($employees) ?>
                    </div>
                </div>

                <!-- EMPLOYERS -->
                <div class="card card-widget widget-user-2">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Employers</h3>
                    </div>
                    <div id="load_employers_follow_section" style="margin-left:1rem; margin-right:1rem;">
                        <?php load_employers($employers); ?>
                    </div>
                </div>
            </div>

            <!-- Contact Modal -->
            <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <?= ucwords($current_employer->tradename) ?>
                            </h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Contact Details</h5>
                            <br>
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
                            <h6 style="font-weight: normal;"><i class="fa fa-phone"></i><strong> Contact Person</strong>
                            </h6>
                            <h6 style="font-weight: normal;">
                                <?= ucwords($current_employer->employer_name) ?>
                            </h6>
                            <h6 style="font-weight: normal;">
                                <?= $current_employer->contact_number ?>
                            </h6>
                            <br>
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

                    <h5 class="text-center pt-3 pb-2" id="exampleModalLabel" style="font-weight:650;"><i class="fa-solid fa-pen-to-square"></i> Create Jobpost
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="pr-3" aria-hidden="true">&times;</span>
                        </button>
                    </h5>

                </div>

                <div class="modal-body border-0">
                    <div class="pb-1">

                        <label for="" style="">Job Title</label>
                        <input id="title" name="title" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:10px;" type="text" placeholder="Enter Job Name">
                    </div>

                    <div class="row pt-2">
                        <div class="col-5">
                            <label for="" style="">Salary</label>
                            <div class="input-group mb-3 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-0" style="border-radius:10px 0 0 10px;">₱</span>
                                </div>
                                <input id="salary" name="salary" type="text" maxlength="16" id="salary" onclick="disableDotZero()" onblur="formatInput()" oninput="formatInput2()" class="form-control border-0" style="background-color: #F4F6F7; border-radius:0 10px 10px 0; " placeholder="Input Salary ">
                                <!-- <div class="input-group-append">
                                                            <span class="input-group-text border-0" style="border-radius:0 10px 10px 0;">.00</span>
                                                        </div> -->
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Job Type</label>
                                <select id="job_type" name="job_type" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" name="" id="">
                                    <option>Part-time</option>
                                    <option>Full-time</option>
                                    <option>Permanent</option>

                                </select>
                            </div>

                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Shift</label>
                                <select id="shift" name="shift" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" name="" id="">
                                    <option>Day</option>
                                    <option>Night</option>
                                    <option>Flextime</option>

                                </select>
                            </div>

                        </div>
                        <div class="col-3">
                            <!-- <label for="" style="">Job Name</label>
                                            <input class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:10px;" type="text" placeholder="Enter Job Name">-->

                            <label>Start Date</label>
                            <input id="start_date" name="start_date" type="date" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-10">
                            <div class="form-group" style="border:0;">
                                <label>Requirements</label>
                                <select class="select2 " multiple="multiple" data-placeholder="Add Requirements" style="width: 100%; border:0;">
                                    <option>HTML</option>
                                    <option>SQL</option>
                                    <option>PHP</option>
                                    <option>Laravel</option>
                                    <option>React</option>
                                    <option>Java</option>
                                    <option>Javascript</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label>Status</label>
                                <select id="filled" name="filled" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" name="" id="">
                                    <option>Open</option>
                                    <option>Closed</option>
                                    <!-- <option>Flextime</option> -->

                                </select>
                            </div>
                        </div>

                    </div>

                    <div>
                        <textarea id="description" name="description" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;" name="" cols="30" rows="10"></textarea>
                    </div>


                </div>
                <div class="modal-footer border-0">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button id="save" type="button" class="btn text-dark" style="border-radius:10px; width:100%; background-color: #F4F6F7;">Post</button>
                </div>
            </div>
        </div>
    </div>


</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?php echo base_url() ?>assets/js/employer_profile/index.js"></script>