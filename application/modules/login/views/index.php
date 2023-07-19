<?php auth_head(); ?>
<!-- ############ PAGE START-->
<body style="background-color:rgb(241, 246, 249);">

</body>
<div class="wrapper">
    <div class="row py-5 justify-content-center align-items-center">
        <div class="col-md-6 mb-5 mb-md-0 ">
            <div class="d-flex justify-content-center">
                <img src="<?= base_url() ?>assets/images/login/login2.png" alt="" class="img-fluid mb-3 d-none d-md-block" style="width:610px;">

            </div>
        </div>

        <!-- Login Form -->
        <div class="col-md-6 col-lg-6 ml-md-auto">
            <div class="row justify-content-center">
                <div class="col-md-8 h-100">
                    <div class="card shadow-none border-0 px-0" style="border-radius:15px;">
                        <div class="card-body px-5 py-5">
                            <h3 class="mb-5">
                                Your ultimate destination for jobseekers and employers!
                            </h3>
                            <div class="px-2 py-2 form-display">
                                <!-- form -->
                                <div class="form-group flex-column mb-3 ">
                                    <label for="user_type" class="form-control-label">Choose on what to login</label>
                                    <select id="user_type" name="user_type" class="form-control custom-select border-0 shadow-none" style="border-radius:15px; background-color: #F4F6F7;">
                                        <option selected disabled>-- Choose user type --</option>
                                        <option value="EMPLOYER">EMPLOYER</option>
                                        <option value="EMPLOYEE">EMPLOYEE</option>
                                    </select>
                                </div>
                                <div class="mt-1">
                                    <button type="button" class="btn btn-info d-block next-btn" style="border-radius:15px;">
                                        Next <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-4">
                                <p>
                                    New to Konnect?
                                    <a href="<?= base_url() ?>register">Create Account!</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ############ PAGE END -->

<script src="<?= base_url() ?>assets/js/login/index.js"></script>

<?php auth_footer(); ?>
