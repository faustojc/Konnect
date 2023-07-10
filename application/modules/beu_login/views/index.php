<?php
login_header();
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

    body {
        margin: 0;
        padding: 0;
        min-height: 0;
        background-color: white;
    }

    /* .background {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: -webkit-fill-available;
          background: linear-gradient(45deg,#caf0ee 10%, transparent 10%), linear-gradient(135deg, transparent 90%, #caf0ee 90%);
          background-size: 2em 2em;
          background-color: #ffffff;
          opacity: 1
      } */

    /* .content {
        position: relative;
        z-index: 1;
        padding: 20px;
    } */

    .elem-center {
        margin: 0 auto;
    }

    .fw-500 {
        font-weight: 500;
    }

    .fw-700 {
        font-weight: 700;
    }

    .fs-14 {
        font-size: 14px;
    }

    .fs-12 {
        font-size: 12px;
    }

    .fs-16 {
        font-size: 16px;
    }

    .rounded-corners {
        border-radius: 15px !important;
    }

    .btnoutlineblue:hover {
        color: white !important;
        background-color: #56595b;
        opacity: 1 !important;
        box-shadow: none !important;
    }

    .btnoutlineblue:hover a {
        color: white !important;
    }

    .btnhover:hover, .linkhover:hover {
        opacity: 0.7;
    }

    .fade-in {
        opacity: 0;
        animation: fade-in-animation 1s ease-in forwards;
        animation-delay: 0s;
    }

    .border-end {
        border-right: 1px solid #ced4da !important;
    }

    /* .fade-in-with-delay {
      opacity: 0;
      animation: fade-in-animation 0.5s ease-in forwards;
      animation-delay: 1s;
    } */

    .fade-in-d1 {
        opacity: 0;
        animation: fade-in-animation 1s ease-in forwards;
        animation-delay: 0.5s;
    }

    .fade-in-d2 {
        opacity: 0;
        animation: fade-in-animation 1s ease-in forwards;
        animation-delay: 0.7s;
    }

    @keyframes fade-in-animation {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .label-form {
        color: #5f5f5f;
        font-size: 1rem;
    }

    .label-details {
        font-weight: normal !important;
        color: #7e7e7e;
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

    .graycolor {
        color: #999999;
    }

    .whitecolor {
        color: white;
    }

    .whitebg {
        background-color: white;
    }

    .nav-link:hover {
        opacity: 0.7;
    }

</style>

<body class="fade-in">

<div class="whitebg" style="height: 100vh;">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light pl-4 d-flex justify-content-center align-items-center" style="margin-left: auto;">
            <!-- Left navbar links -->
            <ul class="navbar-nav ml-2 mr-2">
                <li class="nav-item d-sm-inline-block">
                    <div class="text-left fade-in-d1 d-flex d-flex justify-content-center align-items-center" style="background-color: transparent;">
                        <img class="img-circle img-fluid elem-center fade-in"
                             src="<?= base_url() ?>assets/images/Logo/Konnect.png" style="object-fit: cover; min-width: 50px; max-width: 50px; min-height: 50px; max-height: 50px; display: inline-block;" alt="">
                        <h5 class="mt-2 fade-in d-none d-sm-inline-block ml-2" style="font-weight:600; display: inline-block; color: #3d4856;">BACOLOD JOBSITE APP</h5>
                    </div>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" style="line-height: 2.5; color: #3d4856;">
                        About
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" style="line-height: 2.5; color: #3d4856;">
                        Contact
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link text-info" href="#" style="line-height: 2.5;">
                        Sign Up
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- ############ PAGE START-->
        <div class="container pt-0 pb-0">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-12 col-sm-6 d-none d-sm-inline-block">
                    <div class="text-centerfade-in-d1 register-page" style="background-color: transparent; height: 80vh;">
                        <img class="img-circle img-fluid elem-center fade-in"
                             src="assets/images/Logo/Profile/computer.png" style="width: 100%; display: inline-block;">
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-md-12 col-sm-12 fade-in-d2">
                    <form>
                        <!-- start of content  -->
                        <!-- test form -->
                        <div class="hold-transition register-page rounded-corners" style="background-color: white; height: 80vh;">
                            <div class="register-box">
                                <div class=" rounded-corners">
                                    <div class="card-body register-card-body rounded-corners">

                                        <h3 class="login-box-msg fw-500 text-left text-info pl-0 pb-2" style="color: #3d4856;">Welcome!</h3>
                                        <h4 class="login-box-msg mt-0 mb-1 fw-500 text-left pl-0" style="color: #3d4856;">Sign in</h4>

                                        <form action="../../index.html" method="post">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="username" placeholder="Username" ng-model="user.username" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user" style="color: darkgray;"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="password" placeholder="Password" ng-model="user.password" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock" style="color: darkgray;"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-12 pr-2">
                                                    <div class="float-right">
                                                        <button id="registerbtn" type="button" class="btn btn-outline-info mr-1">Register</button>
                                                        <button type="submit" id="LoginBtn" class="btn pl-4 pr-4 btnhover btn-info">Login</button>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.form-box -->
                                </div><!-- /.card -->
                            </div>
                            <!-- /.register-box -->
                            <!-- END OF CONTENT       -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?php echo base_url() ?>/assets/js/login/index.js"></script>