<?php auth_head(); ?>
<!-- ############ PAGE START-->

<body class="fade-in d-flex align-items-center h-100">
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <div class="col-md-5 pr-lg-5 mb-4 mb-md-0">
                <img src="<?= base_url() ?>assets/images/register/5423351_register.svg" alt="Create an account" class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>
                <p class="font-italic text-muted mb-0">Join to Konnect community and connect to other jobseekers and employers</p>
            </div>

            <!-- Registration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <div class="row">
                    <div class="col-sm-8">

                        <div class="row">

                            <!-- Username -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-user text-muted"></i>
                                    </span>
                                    <input id="email" type="email" name="email" placeholder="Enter email" class="form-control bg-white border-left-0 border-md" required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-lock text-muted"></i>
                                    </span>
                                    <input id="password" type="password" name="password" placeholder="Enter password" class="form-control bg-white border-left-0 border-md" required>
                                </div>
                            </div>

                            <!-- User Type Dropdown -->
                            <div class="input-group mb-4 py-2 px-2">
                                <select id="user_type" name="user_type" class="form-control custom-select bg-white border-md">
                                    <option selected disabled>-- Choose user type --</option>
                                    <option value="EMPLOYER">EMPLOYER</option>
                                    <option value="EMPLOYEE">EMPLOYEE</option>
                                </select>
                            </div>

                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-info d-block">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<!-- ############ PAGE END -->
<?php auth_footer(); ?>