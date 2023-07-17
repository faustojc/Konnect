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

    .hoveropac:hover {
        opacity: 0.7;
    }

    .hovercard:hover {
        transform: scale(1.01);
        background-color: #F1F6F9;
        transition: .3s transform;
        /* box-shadow: 0  1px 4px rgba(0, 0, 0, .15); */
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-3 mt-4">
                <!-- -->
                <div id="user">
                    <?= $user_display ?>
                </div>
            </div>

            <div class="col-12 col-md-6 mt-4">
                <!-- POSTS -->
                <?php if ($user_type == 'EMPLOYER'): ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row pb-2">
                                <div class="col-1 d-flex justify-content-center">
                                    <img class="img-circle img-fluid " src="<?= base_url() ?>assets/images/employer/profile_pic/default.png" alt="User Avatar" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                </div>
                                <div class="col-11">
                                    <div class="card shadow-none hovercard" style="border-radius:10px; width:100%; height:100%; background-color: #F4F6F7;">
                                        <a data-toggle="modal" data-target="#jobpostmodal" style="width:100%; height:100%; text-decoration: none;cursor:pointer; color: #626567;">
                                            <p class="pt-3" style=" padding-left: 1rem; margin-bottom: 0px; ">
                                                Create new jobpost...
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    &nbsp;
                                </div>
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="jobpostmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius:15px;">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content border-0" style="border-radius:15px;">
                                    <div class="border-0">

                                        <h5 class="text-center py-3" id="exampleModalLabel" style="font-weight:650;">Create Jobpost
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="pr-3" aria-hidden="true">&times;</span>
                                            </button>
                                        </h5>

                                    </div>
                                    <div class="modal-body border-top">
                                        <div class="pb-3">
                                            <label for="" style="">Job Name</label>
                                            <input class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;" type="text" placeholder="Enter Job Name">

                                            <!-- <label for="" style="">Company</label>
                                            <input class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;" type="text" placeholder="Enter Company"> -->

                                        </div>
                                        <div>
                                            <textarea id="mytextarea" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;" name="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        <button type="button text-dark" class="btn" style="border-radius:10px; width:100%; background-color: #F4F6F7;">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- JOBPOSTS -->
                <?= $jobpost_section_view ?>
            </div>


            <div class="col-12 col-md-3 mt-4">
                <!-- EMPLOYEES -->
                <div class="card card-widget widget-user-2">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Employees</h3>
                    </div>
                    <div id="load_employees_follow_section" style="margin-left: 1rem; margin-right:1rem;">
                        <?= $employees_follow_section_view ?>
                    </div>
                </div>

                <!-- EMPLOYERS -->
                <div class="card card-widget widget-user-2">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Employers</h3>
                    </div>
                    <div id="load_employers_follow_section" style="margin-left:1rem; margin-right:1rem;">
                        <?= $employers_follow_section_view ?>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div><!--row-->
    </div><!--container fluid-->
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?php echo base_url() ?>/assets/js/dashboard/index.js"></script>