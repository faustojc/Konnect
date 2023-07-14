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

                <div class="card card-white">
                    <div class="card-header">
                        <h3 class="card-title fw-500">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>
                        <p class="text-muted mb-0">
                            B.S. in Information Technology from the University of Something Something in Somewhere on Earth
                        </p>
                    </div>
                    <div class="card-body border-top">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted mb-0">Bacolod City, Philippines</p>
                    </div>
                    <div class="card-body border-top">
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                        <p class="text-muted mb-0">
                            <span class="tag">UI Design</span>
                            <span class="tag">Coding</span>
                            <span class="tag">Javascript</span>
                            <span class="tag">PHP</span>
                        </p>
                    </div>
                    <div class="card-body border-top">
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <div class="card-body border-top pt-3 pb-3">
                        <div class="widget-user-header">
                            <a href="#" class="hoveropac">
                                <p class="mb-0 text-center fw-500 text-muted fs-14">See More
                                    <i class="fa-solid fa-arrow-right fs-14 ml-1"></i></p>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div> <!--col-->

            

            <div class="col-12 col-md-6 mt-4">

                <div class="card">
                        <div class="card-body">
                            <div class="row pb-2">
                                <div class="col-1">
                                    <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $details->image ?>" alt="User Avatar" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; min-width: 3rem; max-width: 3rem;min-height: 3rem; max-height: 3rem;">
                                </div>
                                <div class="col-11">
                                    <div class="card shadow-none hovercard" style="border-radius:10px; width:100%; height:100%; background-color: #F4F6F7;">
                                            <a data-toggle="modal" data-target="#jobpostmodal" style="width:100%; height:100%; text-decoration: none;cursor:pointer; color: #626567;">
                                                <p class="pt-3"  style=" padding-left: 1rem; margin-bottom: 0px; ">
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
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document" >
                                <div class="modal-content border-0" style="border-radius:15px;">
                                    <div class="border-0">
                                        
                                        <h5 class="text-center py-3" id="exampleModalLabel" style="font-weight:650;">Create Jobpost
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="pr-3" aria-hidden="true">&times;</span>
                                            </button>
                                        </h5>
                                        
                                    </div>
                                    <div class="modal-body border-top">

                                        <div>
                                        <textarea class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;" name="" id="" cols="30" rows="6"></textarea>

                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="job-post">
                            <div class="job-header">
                                <h4 class="job-title fw-bold">Frontend Developer</h4>
                                <p class="job-company">ABC Company</p>
                                <p class="job-location">San Francisco, CA</p>
                            </div>
                            <div class="job-details">
                                <!-- <ul class="job-info">
                                    <li>
                                        <i class="fas fa-calendar"></i>
                                        <span class="job-info-label">Posted:</span>
                                        <span class="job-info-value">5 days ago</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        <span class="job-info-label">Type:</span>
                                        <span class="job-info-value">Full-time</span>
                                    </li>
                                </ul> -->
                                <div class="job-description">
                                    <p class="fs-14 mb-0 text-muted">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae ante tortor. Pellentesque a massa eget sapien sagittis rutrum.
                                        Donec laoreet in ex aliquet cursus. Sed lacinia, est et varius feugiat, elit tortor gravida tortor, et consectetur diam elit id odio.
                                        Aliquam urna dolor, posuere ac hendrerit nec, cursus eget ipsum. Sed viverra enim at metus finibus posuere. Pellentesque ac neque erat.
                                        Nam tincidunt, augue eu lacinia varius, mi augue dictum turpis, egestas venenatis dolor elit id risus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-3 mt-4">
                <!-- EMPLOYEES -->
                <div class="card card-widget widget-user-2">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Employees</h3>
                    </div>
                    <div id="load_employees_follow_section" style="margin-left: 1rem; margin-right:1rem;">
                        <!-- <?= $employees_follow_section_view ?> -->
                    </div>
                </div>

                <!-- EMPLOYERS -->
                <div class="card card-widget widget-user-2">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Employers</h3>
                    </div>
                    <div id="load_employers_follow_section" style="margin-left:1rem; margin-right:1rem;">
                        <!-- <?= $employers_follow_section_view ?> -->
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


<script>
    $(function () {
        $("#tabledashboard").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "paging": true,
        }).container().appendTo('#tabledashboard_wrapper .col-md-6:eq(0)');

    });
</script>


<script src="<?php echo base_url() ?>/assets/js/obo_dashboard/obo_dashbard.js"></script>