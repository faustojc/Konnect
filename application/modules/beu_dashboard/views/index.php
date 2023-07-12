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

</style>

<section class="content">
    <div class="container-fluid">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-3 mt-4">
                <!-- -->
                <div id="user">
                    <?= $user_display ?>
                </div>

                <div class="card card-info">
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
                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="card-header">
                        <h3 class="card-title fw-500">Information</h3>
                    </div>

                    <div class="widget-user-header whitebg">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="assets/images/Logo/Profile/default.png" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                        </div>
                        <!-- /.widget-user-image -->
                        <div class="d-flex justify-content-between">
                            <h5 class="widget-user-username ml-3" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500">
                                <i class="fa-solid fa-user mr-1"></i> Follow
                            </button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>

                    <!-- 2nd and onwards has border on top -->
                    <div class="widget-user-header whitebg border-top">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="assets/images/Logo/Profile/default.png" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                        </div>
                        <!-- /.widget-user-image -->
                        <div class="d-flex justify-content-between">
                            <h5 class="widget-user-username ml-3" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500">
                                <i class="fa-solid fa-user mr-1"></i> Follow
                            </button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>

                    <div class="widget-user-header whitebg border-top">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="assets/images/Logo/Profile/default.png" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                        </div>
                        <!-- /.widget-user-image -->
                        <div class="d-flex justify-content-between">
                            <h5 class="widget-user-username ml-3" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500">
                                <i class="fa-solid fa-user mr-1"></i> Follow
                            </button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>

                    <div class="card-body border-top pt-3 pb-3">
                        <a href="#" class="hoveropac">
                            <p class="mb-0 text-center fw-500 text-muted fs-14">See More
                                <i class="fa-solid fa-arrow-right fs-14 ml-1"></i></p>
                        </a>
                    </div>
                </div>
                <!-- /.widget-user -->

                <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="card-header">
                        <h3 class="card-title fw-500">Information</h3>
                    </div>

                    <div class="widget-user-header whitebg">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="assets/images/Logo/Profile/default.png" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                        </div>
                        <!-- /.widget-user-image -->
                        <div class="d-flex justify-content-between">
                            <h5 class="widget-user-username ml-3" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500">
                                <i class="fa-solid fa-user mr-1"></i> Follow
                            </button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>

                    <!-- 2nd and onwards has border on top -->
                    <div class="widget-user-header whitebg border-top">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="assets/images/Logo/Profile/default.png" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                        </div>
                        <!-- /.widget-user-image -->
                        <div class="d-flex justify-content-between">
                            <h5 class="widget-user-username ml-3" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500">
                                <i class="fa-solid fa-user mr-1"></i> Follow
                            </button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>

                    <div class="widget-user-header whitebg border-top">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="assets/images/Logo/Profile/default.png" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                        </div>
                        <!-- /.widget-user-image -->
                        <div class="d-flex justify-content-between">
                            <h5 class="widget-user-username ml-3" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500">
                                <i class="fa-solid fa-user mr-1"></i> Follow
                            </button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>

                    <div class="card-body border-top pt-3 pb-3">
                        <a href="#" class="hoveropac">
                            <p class="mb-0 text-center fw-500 text-muted fs-14">See More
                                <i class="fa-solid fa-arrow-right fs-14 ml-1"></i></p>
                        </a>
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