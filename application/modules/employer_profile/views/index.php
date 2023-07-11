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

    .table-black {
        border: 1px solid black;
    }

    .table-black td {
        border-top: 1px solid black;
    }

    .smallfont {
        font-size: 68%;
    }

    .smallfont2 {
        font-size: 75%;
    }

    .serif-font {
        font-family: "Times New Roman", Times, serif;
    }

    .list-3 li {
        margin-top: 5px;
        margin-bottom: 5px;
        text-transform: capitalize;
    }

    .list-3 {
        text-transform: capitalize;
        list-style-type: none;
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
        overflow: hidden;
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

    .card-button-more:hover {
        opacity: 0.7;
    }

    .iconslist {
        padding-right: 10px;
    }

    .fs-12 {
        font-size: 12px;
    }

    .fs-14 {
        font-size: 14px;
    }

    .fs-16 {
        font-size: 16px;
    }

    .fs-18 {
        font-size: 18px;
    }

    .fs-20 {
        font-size: 20px;
    }


    .fw-500 {
        font-weight: 500;
    }

    .whitecolor {
        color: white;
    }

    .whitebg {
        background-color: white;
    }

    body {
        background-color: #e9ebed;
    }
</style>

<section class="content">
    <div class="container">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-8 pl-2 pr-2 mt-4">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header text-white" style="min-height: 25vh; max-height: 50vh; background: url('assets/images/Logo/Profile/wallpapersample.jpg') no-repeat center center; background-size: cover;"></div>
                    <div class="widget-user-image" style="left: 0; top: 0; margin-left: 15px; margin-top:100px;">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $current_employer->image ?>" alt="User Avatar" style="
                          object-fit: cover;
                          min-width: 100px;
                          max-width: 100px;
                          min-height: 100px;
                          max-height: 100px;">
                    </div>
                    <div class="card-footer" style="padding-top: 45px;">
                        <div class="row">
                            <div class="col-12">
                                <div class="description-block">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 m-md-0">
                                            <h5 class="widget-user-username text-left" style="font-weight: 500;">
                                                <?= $current_employer->tradename ?>
                                            </h5>
                                            <p class="text-left mb-1">
                                                <?php if (empty($current_employer->employer_name)) {
                                                    echo $current_employer->tradename;
                                                } else {
                                                    echo $current_employer->employer_name;
                                                } ?>
                                            </p>
                                            <h6 class="widget-user-desc text-left text-muted" style="font-weight: normal; font-size:15px;">
                                                <?= $current_employer->business_type ?>|
                                                <a class="text-info" data-toggle="modal" data-target="#contact" style=" cursor: pointer;">Contact details</a>
                                            </h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between justify-content-xl-end">
                                                <a href="<?= base_url() ?>employer_profile/edit_profile/<?= $current_employer->id ?>" class="btn btn-outline-info mr-1 fw-500" style="font-size: 14px;">
                                                    <i class="fa-solid fa-pen mr-1"></i> Edit Profile
                                                </a>
                                                <a href="<?= base_url() ?>jobposting/create_job?id=<?= $current_employer->id ?>" class="btn btn-info fw-500" style="font-size: 14px;">
                                                    <i class="fa-solid fa-pen-to-square"></i> Create a Job Listing
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                        <!-- /.card-tools -->
                    </div>

                    <!-- JOB POSTINGS -->
                    <div class="accordion rounded-0" id="load_jobpostings">
                        <?= $jobpostings_view ?>
                        <!--                        <div class="d-flex justify-content-center loading-jobpostings my-3">-->
                        <!--                            <div class="spinner-border" role="status">-->
                        <!--                                <span class="sr-only">Loading...</span>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                </div>

                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Heading</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool">
                                <i class="fa-solid fa-plus" style="color: white; font-size: 16.5px;"></i>
                            </button>
                            <button type="button" class="btn btn-tool">
                                <i class="fa-solid fa-pen" style="color: grey;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body card-widget widget-user-2">
                        <div class="widget-user-header">
                            <h5 class="mt-0" style="font-size: 18px; font-weight: 500;">
                                <i class="fa-solid fa-user-gear mr-1"></i> Skill or Capabilities or Something
                            </h5>
                            <h6 class="mb-0" style="font-weight: normal; font-size: 16px;">Lorem Ipsum dolor sit amet</h6>
                        </div>
                    </div>

                    <div class="card-body card-widget widget-user-2 border-top">
                        <div class="widget-user-header">
                            <h5 class="mt-0" style="font-size: 18px; font-weight: 500;">
                                <i class="fa-solid fa-user-gear mr-1"></i> Skill or Capabilities or Something
                            </h5>
                            <h6 class="mb-0" style="font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis facilisis enim mollis eget. Sed sollicitudin tortor vel nibh
                                sollicitudin sagittis. Fusce tempor arcu at leo venenatis</h6>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Heading</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool">
                                <i class="fa-solid fa-plus" style="color: white; font-size: 16.5px;"></i>
                            </button>
                            <button type="button" class="btn btn-tool">
                                <i class="fa-solid fa-pen" style="color: grey;"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->

                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="card-body card-widget widget-user-2">
                                <div class="widget-user-header">
                                    <div class="widget-user-image">
                                        <img class="img-square img-fluid" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;">Text or something</h5>
                                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">Details</h6>
                                    <p class="widget-user-desc mb-0 mt-1 text-muted" style="font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-body card-widget widget-user-2">
                                <div class="widget-user-header">
                                    <div class="widget-user-image">
                                        <img class="img-square img-fluid" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px;max-height: 60px;">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;">Text here 2</h5>
                                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">Details or additional info</h6>
                                    <p class="widget-user-desc mb-0 mt-1 text-muted" style="font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="card-body card-widget widget-user-2">
                                <div class="widget-user-header">
                                    <div class="widget-user-image">
                                        <img class="img-square img-fluid" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;">Text insert 3</h5>
                                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">Details or info</h6>
                                    <p class="widget-user-desc mb-0 mt-1 text-muted" style="font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-body card-widget widget-user-2">
                                <div class="widget-user-header">
                                    <div class="widget-user-image">
                                        <img class="img-square img-fluid" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px;max-height: 60px;">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;">Text 4</h5>
                                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">Details or info</h6>
                                    <p class="widget-user-desc mb-0 mt-1 text-muted" style="font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 pl-2 pr-2 mt-4">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Home Address</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal_edit_home_address" style="opacity:1; color:white;" id="edit_home_address">
                                <i class="fa-solid fa-pen" style="color: grey;"></i>
                            </button>
                        </div>
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

                <!-- MODAL for HOME ADDRESS -->
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
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal_edit_business" style="opacity:1; color:white;" id="edit_information">
                                <i class="fa-solid fa-pen" style="color: grey;"></i>
                            </button>
                        </div>
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
                    <div id="load_employees_follow_section">
                        <?= $employees_follow_section_view ?>
                    </div>
                </div>

                <!-- EMPLOYERS -->
                <div class="card card-widget widget-user-2">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Employers</h3>
                    </div>
                    <div id="load_employers_follow_section">
                        <?= $employers_follow_section_view ?>
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
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>


<!--<script>-->
<!--    $(function () {-->
<!--        $("#tabledashboard").DataTable({-->
<!--            "responsive": true, "lengthChange": false, "autoWidth": false, "paging": true,-->
<!--        }).container().appendTo('#tabledashboard_wrapper .col-md-6:eq(0)');-->
<!---->
<!--    });-->
<!--</script>-->

<script>
    $('#business_type').val('<?= $current_employer->business_type ?>');
</script>

<script src="<?php echo base_url() ?>/assets/js/employer_profile/index.js"></script>