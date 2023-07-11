<?php auth_head(); ?>
<!-- ############ PAGE START-->
<body class="fade-in d-flex align-items-center h-100">
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>
                <p class="font-italic text-muted mb-0">Create a minimal registration page using Bootstrap 4 HTML form elements.</p>
                
            </div>

            <!-- Registration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <div class="row">
                    <div class="col-sm-8 h-100">
                        <div class="card px-2 py-2" style="border-radius:15px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-center pb-4">
                                    <img src="<?= base_url() ?>assets/images/Logo/Konnect3.png" style="width:300px; height: auto;">
                                </div>

                                <!-- User Type Dropdown -->
                                <div class="input-group mb-4 py-2">
                                    <select id="user_type" name="user_type" class="form-control custom-select bg-white border-left-0 border-md">
                                        <option selected disabled>-- Choose user type --</option>
                                        <option value="EMPLOYER">EMPLOYER</option>
                                        <option value="EMPLOYEE">EMPLOYEE</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p>New User? <a href="add_personnel/nextform">Create Account!</a> </p>

                                </div>
                                <div class="text-right mt-3">
                                    <a href="#" class="btn btn-info">
                                        Next <i class="fas fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ############ PAGE END -->
<?php auth_footer(); ?>
