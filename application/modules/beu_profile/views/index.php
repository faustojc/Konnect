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
    <div class="container-fluid">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-8 pl-2 pr-2 mt-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white"
                         style="background: url('assets/images/Logo/Profile/wallpapersample.jpg') center center; min-height: 25vh; max-height: 50vh; background-repeat: no-repeat; background-size: cover;">
                    </div>
                    <div class="widget-user-image" style="left: 0; top: 0; margin-left: 15px; margin-top:100px;">
                        <img class="img-circle img-fluid" src="assets/images/Logo/Profile/default.png" alt="User Avatar" style="
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

                                    <div class="d-flex justify-content-between">
                                        <h4 class="widget-user-username text-left" style="font-weight: 500;">John Doe</h4>
                                        <div class="float-right">
                                            <button type="button" class="btn btn-outline-info mr-1 fw-500" style="font-size: 14px;"><i class="fa-solid fa-pen mr-1"></i> Edit Profile</button>
                                            <button type="button" class="btn btn-info fw-500" style="font-size: 14px;"><i class="fa-solid fa-pen-to-square"></i> Create a Job Listing</button>
                                        </div>
                                    </div>

                                    <h6 class="widget-user-desc text-left text-muted" style="font-weight: normal;">Web Designer</h6>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Heading</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-plus" style="color: white; font-size: 16.5px;"></i>
                            </button>
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-pen" style="color: white;"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body card-widget widget-user-2">
                        <div class="widget-user-header">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis facilisis enim mollis eget. Sed sollicitudin tortor vel nibh sollicitudin sagittis. Fusce tempor arcu at leo venenatis, ut
                                sagittis ante volutpat. Nam quis sapien eget eros euismod vulputate. Aliquam a arcu euismod, ultricies lectus nec, tempus enim. Sed vitae nisi dui.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Heading</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-plus" style="color: white; font-size: 16.5px;"></i>
                            </button>
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-pen" style="color: white;"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body card-widget widget-user-2">
                        <div class="widget-user-header">
                            <div class="widget-user-image">
                                <img class="img-square img-fluid" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="
                              object-fit: cover;
                              min-width: 60px;
                              max-width: 60px;
                              min-height: 60px;
                              max-height: 60px;">
                            </div>
                            <!-- /.widget-user-image -->
                            <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                            <p class="widget-user-desc mb-0 mt-1 text-muted" style="font-weight: normal; font-size: 16px;">Details and Additional Info</p>
                            <p class="widget-user-desc mb-0 mt-0 text-muted" style="font-weight: normal; font-size: 16px;">Details and Additional Info</p>
                            <br/>
                            <p class="widget-user-desc mb-0 mt-0" style="font-weight: normal; font-size: 16px;"><span style="font-weight:500;">Text: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis
                                facilisis enim mollis eget. Sed sollicitudin tortor vel nibh sollicitudin sagittis. Fusce tempor arcu at leo venenatis</p>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-body card-widget widget-user-2 border-top">
                        <div class="widget-user-header">
                            <div class="widget-user-image">
                                <img class="img-square img-fluid" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="
                              object-fit: cover;
                              min-width: 60px;
                              max-width: 60px;
                              min-height: 60px;
                              max-height: 60px;">
                            </div>
                            <!-- /.widget-user-image -->
                            <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;">Jane Doe</h5>
                            <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                            <p class="widget-user-desc mb-0 mt-1 text-muted" style="font-weight: normal; font-size: 16px;">Details and Additional Info</p>
                            <p class="widget-user-desc mb-0 mt-0 text-muted" style="font-weight: normal; font-size: 16px;">Details and Additional Info</p>
                            <br/>
                            <p class="widget-user-desc mb-0 mt-0" style="font-weight: normal; font-size: 16px;"><span style="font-weight:500;">Text: </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis
                                facilisis enim mollis eget. Sed sollicitudin tortor vel nibh sollicitudin sagittis. Fusce tempor arcu at leo venenatis</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Heading</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-plus" style="color: white; font-size: 16.5px;"></i>
                            </button>
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-pen" style="color: white;"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body card-widget widget-user-2">
                        <div class="widget-user-header">
                            <h5 class="mt-0" style="font-size: 18px; font-weight: 500;"><i class="fa-solid fa-user-gear mr-1"></i> Skill or Capabilities or Something</h5>
                            <h6 class="mb-0" style="font-weight: normal; font-size: 16px;">Lorem Ipsum dolor sit amet</h6>
                        </div>
                    </div>

                    <div class="card-body card-widget widget-user-2 border-top">
                        <div class="widget-user-header">
                            <h5 class="mt-0" style="font-size: 18px; font-weight: 500;"><i class="fa-solid fa-user-gear mr-1"></i> Skill or Capabilities or Something</h5>
                            <h6 class="mb-0" style="font-weight: normal; font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere quam massa, quis facilisis enim mollis eget. Sed sollicitudin tortor vel nibh
                                sollicitudin sagittis. Fusce tempor arcu at leo venenatis</h6>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Heading</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-plus" style="color: white; font-size: 16.5px;"></i>
                            </button>
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-pen" style="color: white;"></i>
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
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

            <div class="col-12 col-md-4 pl-2 pr-2 mt-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Information</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" style="opacity:1; color:white;"><i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        Details or information
                    </div>
                    <div class="card-body border-top">
                        Details or information
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title fw-500">Information</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" style="opacity:1; color:white;"><i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        Details or information
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

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
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500"><i class="fa-solid fa-user mr-1"></i> Follow</button>
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
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500"><i class="fa-solid fa-user mr-1"></i> Follow</button>
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
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500"><i class="fa-solid fa-user mr-1"></i> Follow</button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>
                </div>
                <!-- /.widget-user -->

                <div class="card card-widget widget-user-2 mt-2">
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
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500"><i class="fa-solid fa-user mr-1"></i> Follow</button>
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
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500"><i class="fa-solid fa-user mr-1"></i> Follow</button>
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
                            <button type="button" class="btn btn-outline-info pb-0 pt-0 fw-500"><i class="fa-solid fa-user mr-1"></i> Follow</button>
                        </div>
                        <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px;">Lead Developer</h6>
                    </div>
                </div>
                <!-- /.widget-user -->

            </div> <!-- col-->
        </div> <!--row-->
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