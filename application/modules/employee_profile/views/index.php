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

    /* Edited */
    .card {
        border-radius: 15px;
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

    body {
        background-color: #e9ebed;
    }

    #modalAddEmp {
        color: black;
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

<section class="content">
    <div class="container">
        <div class="row " style="margin-top: 3.5rem;">
            <div class="col-12 col-md-8 pl-2 pr-2 mt-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white" style="background: url('assets/images/Logo/Profile/wallpapersample.jpg') center center; min-height: 25vh; max-height: 50vh; background-repeat: no-repeat; background-size: cover;">
                    </div>

                    <div class="card-footer" style="padding-top: 45px;background-color:#f4faff;">
                        <!-- Profile Picture -->

                        <div class="widget-user-image" style="left: 0; top: 0; margin-left: 15px; margin-top:100px;">
                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $details->Employee_image ?>" alt="User Avatar" style="
                                                  object-fit: cover;
                                                  min-width: 100px;
                                                  max-width: 100px;
                                                  min-height: 100px;
                                                  max-height: 100px;">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="description-block">

                                    <div class="d-flex justify-content-between">
                                        <h4 class="widget-user-username text-left text-dark" style="font-weight: 600;">
                                            <?= ucwords(@$details->Fname) . " " . ucwords(@$details->Mname) . " " . ucwords(@$details->Lname) ?>
                                        </h4>
                                        <input type="text" value="<?= @$details->ID ?>" id="emp_id" hidden>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <a href="<?php echo base_url() ?>employee/profile/<?= $details->ID ?>" type="button" class="btn btn-outline-info btn-sm btn-block mb-2">Edit Profile</a>
                                            </div>
                                            <div class="col-md-7">
                                                <button type="button" class="btn btn-info btn-sm btn-block mb-2" style="width:150px;">
                                                    <i class="fa-solid fa-pen-to-square"></i> Add Job Listing
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="widget-user-desc text-left text-dark" style="font-weight: 550; font-size:18px;">
                                        <?= ucwords(@$details->Title) ?>
                                    </h5>
                                    <h6 class="widget-user-desc text-left text-muted" style="font-weight: normal; font-size:15px;">
                                        <?= ucwords(@$details->Address) . ", " . ucwords(@$details->Barangay) . ", " . ucwords(@$details->City) ?> |
                                        <a class="text-info" data-toggle="modal" data-target="#contact" style=" cursor: pointer;">Contact details</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>

                </div>
                <!-- /.widget-user -->

                <div class="card card-white">
                    <div class="card-header" style="">
                        <h3 class="card-title fw-500 text-dark" style="font-weight:600;">About</h3>

                        <div class="card-tools">
                            <!-- <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#Description" style=" cursor: pointer;"><i class="fa-solid fa-pen" style = ""></i> -->
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#Introduction_modal" style=" cursor: pointer;">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body card-widget widget-user-2">
                        <div class="widget-user-header" style="padding:0;">

                            <p class="text-justify px-3" style="font-size:15px; font-weight: 400;">
                                <?= @$details->Introduction ?>
                            </p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500" style="font-weight:600;">Employment</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modalAddEmp">
                                <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalAddEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Employment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row p-4">
                                                    <div class="col-md">
                                                        <input type="text" class="form-control" id="employee_id" value="<?= @$details->ID ?>" hidden>
                                                        <label for="employer_id">Select Employer</label>
                                                        <select class="form-control" id="employer_id">
                                                            <?php foreach ($employers as $employer) { ?>
                                                                <option value="<?php echo $employer->id ?>"><?php echo $employer->employer_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row p-4">
                                                    <div class="col-md">
                                                        <label for="position">Position</label>
                                                        <input type="text" class="form-control" id="position" placeholder="Enter Position">
                                                    </div>
                                                </div>
                                                <div class="row p-4">
                                                    <div class="col-md-6">
                                                        <label for="start_date">Start Date</label>
                                                        <input type="date" id="start_date" name="start_date" style="width:200px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="end_date">End Date</label>
                                                        <input type="date" id="end_date" name="end_date" style="width:200px;">
                                                    </div>
                                                </div>

                                                <div class="row p-4">
                                                    <div class="col-md-4">
                                                        <label for="status">Status</label>
                                                        <input type="text" class="form-control" id="status" placeholder="Enter Status">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="rating">Rating</label>
                                                        <input type="number" class="form-control" id="rating" placeholder="Enter Rating">
                                                    </div>
                                                </div>

                                                <div class="row py-2 px-4">
                                                    <div class="col-md-6">
                                                        <input type="checkbox" name="inputCheck" id="show_status">
                                                        <label for="show_status" class="mb-0 mr-2">Show Status</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_submit_employment">Add Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->

                    </div>
                    <!-- /.card-header -->
                    <div class="pb-3">

                    </div>
                    <div id="load_employments">

                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- #Education -->
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500" style="font-weight:600;">Education</h3>

                        <div class="card-tools">
                            <button type="button" data-toggle="modal" data-target="#ModalEduc" class="btn btn-tool">
                                <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                            </button>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div>

                    </div>
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
                                    <!-- #Modal Education Content -->
                                    <div class="px-2 py-2">
                                        <div class="pb-3">
                                            <!-- <input type="text" value="<?= @$details->ID ?>" id="Employee_id" hidden> -->
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-md-6">
                                                <label>Level</label>
                                                <input type="text" class="form-control dropdown-toggle" id="Level" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Enter Level" value="">
                                                <div class="dropdown-menu level-content" aria-labelledby="Level">
                                                    <p class="dropdown-item">ELEMENTARY</p>
                                                    <p class="dropdown-item">JUNIOR HIGH</p>
                                                    <p class="dropdown-item">SENIOR HIGH</p>
                                                    <p class="dropdown-item">COLLEGE</p>
                                                    <p class="dropdown-item">UBAR</p>
                                                    <p class="dropdown-item">YES</p>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <label>Title</label>
                                                <input type="text" class="form-control" id="Title" placeholder="Enter Title">
                                            </div>
                                        </div>


                                        <section class="pb-3">
                                            <label>Institution</label>
                                            <input type="text" class="form-control" id="Institution" placeholder="Enter Institution">
                                        </section>


                                        <div class="row pb-4">
                                            <div class="col-md">
                                                <label>Description</label>
                                                <!-- <input type="text" class="form-control" id="Description"  placeholder="Enter Description"> -->
                                                <div>
                                                    <textarea class="form-control" name="description" id="Description" rows="4" placeholder="Enter Description"></textarea>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row pb-3">
                                            <div class="col-md-4">
                                                <label>Start Date</label>
                                                <input type="date" class="form-control" id="Start_date" name="start_date">
                                            </div>

                                            <div class="col-md-4">
                                                <label>End Date</label>
                                                <div>
                                                    <input type="date" class="form-control" id="End_date" name="end_date">
                                                </div>


                                            </div>

                                            <div class="col-md-4">
                                                <label>Hours</label>
                                                <input type="Number" class="form-control" id="Hours" placeholder="Enter Hours">
                                            </div>

                                        </div>


                                        <!-- <label>Password:</label>
                                    <input type="password" id="password" name="password"> -->


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info" id="btn_save" data-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Body -->


                    <div id="load_educations">

                    </div>

                    <!-- <div class="card-body card-widget widget-user-2 border-top">
                                <div class="widget-user-header">
                                  <h5 class="mt-0" style = "font-size: 18px; font-weight: 500;"><i class="fa-solid fa-user-graduate"></i> Skill or Capabilities or Something</h5>
                                  <h6 class="mb-0" style = "font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis facilisis enim mollis eget. Sed sollicitudin tortor vel nibh sollicitudin sagittis. Fusce tempor arcu at leo venenatis</h6>
                                </div>
                            </div> -->

                    <!-- /.card-body -->
                </div>
                <!-- Education -->

                <!-- /.card -->

                <!-- Training -->
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500" style="font-weight:600;">Training</h3>

                        <div class="card-tools">
                            <button type="button" data-toggle="modal" data-target="#ModalTrain" class="btn btn-tool">
                                <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                            </button>
                            
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div>

                    </div>
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
                                        <div class="pb-3">
                                            <input type="text" value="<?= @$details->ID ?>" id="Employee_id" hidden>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-md-12">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" placeholder="Enter Title" required>
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
                                                <input type="Number" class="form-control" id="hours" placeholder="Enter Hours" required>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info" id="btn_save_training" data-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Body -->


                    <div class="row py-3 px-4" id="load_training">

                    </div>


                    <!-- /.card-body -->
                </div>
                <!-- Training -->

                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500" style="font-weight:600;">Skills</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#skill_modal">
                                <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row py-4 px-4" id="load_skill"></div>
                </div>
            </div>

            <div class="col-12 col-md-4 pl-2 pr-2 mt-4">
                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-600" style="font-weight:600;">Address</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#address_modal" style="opacity:1;  cursor: pointer;">
                                <i class="fa-solid fa-pen"></i>


                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <b>STREET:</b>
                        <?= ucwords(@$details->Address) ?>
                    </div>
                    <div class="card-body " style="padding-top:10px;padding-bottom:10px">
                        <b>BARANGAY:</b>
                        <?= ucwords(@$details->Barangay) ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <b>CITY:</b>
                        <?= ucwords(@$details->City) ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500" style="font-weight:600;">Government ID</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#id_modal" style="opacity:1;  cursor: pointer;">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <b>SSS:</b>
                        <?= ucwords(@$details->SSS) ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <b>TIN:</b>
                        <?= ucwords(@$details->Tin) ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <b>PHIL HEALTH:</b>
                        <?= ucwords(@$details->Phil_health) ?>
                    </div>
                    <div class="card-body" style="padding-top:10px;padding-bottom:10px">
                        <b>PAG IBIG:</b>
                        <?= ucwords(@$details->Pag_ibig) ?>
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
        </div><!--container fluid-->

        <!-- Contact Modal -->
        <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?= ucwords(@$details->Fname) . " " . ucwords(@$details->Mname) . " " . ucwords(@$details->Lname) ?>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Contact Details</h5>
                        <br>
                        <h6 style="font-weight: normal;"><i class="fas fa-map-pin"></i> Address</h6>
                        <h6 style="font-weight: normal;">
                            <?= ucwords(@$details->City) ?>
                        </h6>
                        <br>
                        <h6 style="font-weight: normal;"><i class="fa fa-envelope"></i> Email</h6>
                        <h6 style="font-weight: normal;">
                            <?= ucwords(@$details->Email) ?>
                        </h6>
                        <br>
                        <h6 style="font-weight: normal;"><i class="fa fa-phone"></i> Number</h6>
                        <h6 style="font-weight: normal;">
                            <?= ucwords(@$details->Cnum) ?>
                        </h6>
                        <br>
                        <h6 style="font-weight: normal;"><i class="	fa fa-birthday-cake"></i> Birthday</h6>
                        <h6 style="font-weight: normal;">
                            <?= ucwords(@$details->Bday) ?>
                        </h6>

                    </div>
                </div>
            </div>
        </div>

        <!-- Description Modal -->

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
                        <button type="button" class="btn btn-primary" id="btn_update">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Address Modal -->
        <div class="modal fade" id="address_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row pb-3">
                            <div class="col-md-12">
                                <input type="text" id="ID" value="<?= @$details->ID ?>" hidden>
                                <label>Street</label>
                                <input type="text" class="form-control" id="Address" value="<?= @$details->Address ?>" placeholder="Enter First Name">
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>Barangay</label>
                                <input type="text" class="form-control" id="Barangay" value="<?= @$details->Barangay ?>" placeholder="Enter First Name">
                            </div>

                            <div class="col-md-6">
                                <label>City</label>
                                <input type="text" class="form-control" id="City" value="<?= @$details->City ?>" placeholder="Enter First Name">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update_address">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ID Modal -->
        <div class="modal fade" id="id_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Government ID</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row pb-3">
                            <div class="col-md-6">
                                <input type="text" id="ID" value="<?= @$details->ID ?>" hidden>
                                <label>SSS</label>
                                <input type="text" class="form-control" id="SSS" value="<?= @$details->SSS ?>" placeholder="Enter First Name">
                            </div>

                            <div class="col-md-6">
                                <label>Tin</label>
                                <input type="text" class="form-control" id="Tin" value="<?= @$details->Tin ?>" placeholder="Enter First Name">
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>Phil_health</label>
                                <input type="text" class="form-control" id="Phil_health" value="<?= @$details->Phil_health ?>" placeholder="Enter First Name">
                            </div>

                            <div class="col-md-6">
                                <label>Pag_ibig</label>
                                <input type="text" class="form-control" id="Pag_ibig" value="<?= @$details->Pag_ibig ?>" placeholder="Enter First Name">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="update_id" formaction="employee_profile/views/index">Save</button>
                        </form>
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
                        <button type="button" class="btn btn-primary" id="btn_skill">Add</button>
                    </div>
                </div>
            </div>
        </div>


</section>


<!-- ############ PAGE END-->
<?php
main_footer();
?>


<script src="<?php echo base_url() ?>assets/js/employee_profile/index.js"></script>