<?php
function main_header($menubar = [])
{
    defined('BASEPATH') or exit('No direct script access allowed');
    $userdata = get_userdata(USER);
    $auth = get_userdata('auth');

    $image_url = '';
    $name = '';
    $profile_url = '';

    if (!empty($auth)) {
        if ($auth['user_type'] == 'EMPLOYEE') {
            $image_url = base_url() . 'assets/images/employee/profile_pic/' . $userdata->Employee_image;
            $name = $userdata->Fname . ' ' . $userdata->Mname . ' ' . $userdata->Lname;
            $profile_url = base_url() . 'employee_profile/index/' . $userdata->ID;
        } else {
            $image_url = base_url() . 'assets/images/employer/profile_pic/' . $userdata->image;
            $name = $userdata->tradename;
            $profile_url = base_url() . 'employer_profile?id=' . $userdata->id;
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= SYSTEM_MODULE ?>
        </title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/Konnect2.ico">

        <!-- Google Font: Source Sans Pro -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
        <!-- Font Awesome Icons -->
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/fontawesome-free/css/all.min.css">

        <!-- YOB ADDED 5-17 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!-- END -->
        <!-- custom css -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/dist/css/adminlte.min.css">
        <!-- SweetAlert -->
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/toastr/toastr.min.css">
        <!-- Select2 -->
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/select2/css/select2.min.css">
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- DataTables -->
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet"
              href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

        <!-- TinyMCE -->
        <script src="<?= base_url() ?>assets/theme/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <style>

            body {
                font-family: 'Roboto', sans-serif;
                color:#272732;
            }

            .text-info {
                color: #0dcaf0;
            }

            .btn-info {
                color: #fff;
                background-color: #0dcaf0;
                border-color: #0dcaf0;
            }

            .btn-outline-info {
                color: #0dcaf0;
                border-color: #0dcaf0;
            }

            .btn-outline-info:hover {
                color: #fff;
                background-color: #0dcaf0;
                border-color: #0dcaf0;
            }

            /* custom css */

            .sec-color {
                background-color: #f7f9f9;
            }

            .nav-color {
                background-color: #0dcaf0;
            }

            .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
                color: #fff;
                background-color: #0dcaf0;
            }

            .nav-pills .nav-link:not(.active):hover {
                color: #0dcaf0;
            }

            .nav-pills .nav-link {
                border-radius: 10px;
            }

            .br-custom {
                border-radius: 15px;
            }

            .a .text-info {
                color: #0dcaf0;
            }

            .card-hover:hover {
                transform: scale(1.05);
                transition: 0.5s;
            }

            .formstyle {
                border-radius: 10px;
                background-color: #F4F6F7;
                border: 0;
            }
        </style>
    </head>

    <body class="hold-transition  light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-color:#F1F6F9 ;" >
    <div class="wrapper">
    <!-- Navbar -->
    <div class="container px-5">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light px-5"
             style="margin-left: auto;  height:55px;">
            <!-- Left navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item d-none d-sm-inline-block pr-3">
                    <a href="<?= base_url() ?>beu_dashboard">
                        <img class="brand-image" src="<?= base_url() ?>assets/images/Logo/Konnect.png" alt="" style="
                            object-fit: cover;
                            /* min-width: 100px;
                            max-width: 100px;
                            min-height: 45px;
                            max-height: 45px; */
                            width:125px;
                            height:auto;">
                    </a>
                </li>
                <!-- Search -->
                <li class="nav-item d-none d-sm-inline-block" style="position: absolute; left: 50%; margin-left: -250px">
                    <div class="input-group flex-nowrap d-none d-lg-flex" style="width:500px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gray-light border-0" id="addon-wrapping" style="border-radius: 10px 0 0 10px;">
                            <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control border-0 bg-gray-light" placeholder="Search"
                               aria-label="search" aria-describedby="addon-wrapping" style="border-radius: 0 10px 10px 0; ">
                    </div>

                    <div class="d-block d-lg-none">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                           aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url() ?>beu_dashboard" name="home" class="nav-link">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url() ?>jobposting" name="jobs" class="nav-link">
                        <i class="fa-solid fa-briefcase"></i>
                    </a>
                </li>
                <!-- MY PROFILE -->
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link pr-1" data-toggle="dropdown" name="profile" role="button">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left border-0 shadow-sm" style="border-radius:15px;">
                        <div>
                            <!-- Message Start -->
                            <div class="media ml-3 mt-3 mb-3 d-flex justify-content-center align-items-center">
                                <!-- <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
                                <?php if (!empty($userdata)): ?>
                                    <img class="img-circle img-fluid mr-3" src="<?= $image_url ?>"
                                         alt="User Avatar"
                                         style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px;max-height: 60px;">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title" style="font-weight: 500;">
                                            <?= ucwords($name) ?>
                                        </h3>
                                        <a href="<?= $profile_url ?>" class="text-info">View Profile </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Message End -->
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url() ?>login/logout" class="dropdown-item dropdown-footer" id="logout">Log out</a>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item"> -->
                <!-- Message Start -->
                <!-- <div class="media">
                        <img class="img-circle img-fluid mr-3" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px;max-height: 60px;">
                        <div class="media-body">
                          <h3 class="dropdown-item-title">
                            John Doe
                          </h3>
                          <p class="text-sm">Call me whenever you can...</p>
                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                      </div> -->
                <!-- Message End -->
                <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"> -->
                <!-- Message Start -->
                <!-- <div class="media">
                        <img class="img-circle img-fluid mr-3" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px;max-height: 60px;">
                        <div class="media-body">
                          <h3 class="dropdown-item-title">
                            John Pierce
                          </h3>
                          <p class="text-sm">I got your message bro</p>
                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                      </div> -->
                <!-- Message End -->
                <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"> -->
                <!-- Message Start -->
                <!-- <div class="media">
                        <img class="img-circle img-fluid mr-3" src="assets/images/Logo/Profile/samplepic.jpg" alt="User Avatar" style="object-fit: cover; min-width: 60px; max-width: 60px; min-height: 60px;max-height: 60px;">
                        <div class="media-body">
                          <h3 class="dropdown-item-title">
                            Nora Silvester
                          </h3>
                          <p class="text-sm">The subject goes here</p>
                          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                      </div> -->
                <!-- Message End -->
                <!-- </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                  </div>
                </li> -->


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <!-- <li class="nav-item">
                  <a class="nav-link pl-1" href="#" role="button">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  </a>
                </li> -->
            </ul>
        </nav>
    </div>
    <!-- /.navbar -->

    <?php
}

function main_footer()
{
    $ci = &get_instance();
    ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script>
        var baseUrl = '<?php echo base_url(); ?>';
    </script>
    <!-- User Defined SCRIPTS -->
    <script src="<?= base_url() ?>/assets/js/main.js" defer></script>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/toastr/toastr.min.js"></script>
    <!-- DataTables  & Plugins -->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/jszip/jszip.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>-->
    <!--    <script src="--><?//= base_url()
    ?><!--assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>-->

    <script>
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>


    </body>

    </html>
    <?php
}

?>