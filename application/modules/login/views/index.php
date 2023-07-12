<?php auth_head(); ?>
<!-- ############ PAGE START-->
<div class="wrapper">
    <div class="row py-5 mt-4 justify-content-center align-items-center">
        <div class="col-md-6 mb-5 mb-md-0">
            <img src="<?= base_url() ?>assets/images/login/connections.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1 class="text-center">Konnect!</h1>
            <p class="font-italic text-center text-muted mb-0">Empowering Connections, Empowering Careers!</p>
        </div>

        <!-- Login Form -->
        <div class="col-md-6 col-lg-6 ml-md-auto">
            <div class="row justify-content-center">
                <div class="col-md-8 h-100">
                    <h3 class="mb-5">
                        Your ultimate destination for jobseekers and employers!
                    </h3>
                    <div class="px-2 py-2 form-display">
                        <!-- form -->
                        <div class="form-group flex-column mb-4 py-2">
                            <label for="user_type" class="form-control-label">Choose on what to login</label>
                            <select id="user_type" name="user_type" class="form-control custom-select bg-white border-md">
                                <option selected disabled>-- Choose user type --</option>
                                <option value="EMPLOYER">EMPLOYER</option>
                                <option value="EMPLOYEE">EMPLOYEE</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-info d-block next-btn">
                                Next <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>
                            New to Konnect?
                            <a href="<?= base_url() ?>login">Create Account!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ############ PAGE END -->

<script src="<?= base_url() ?>assets/js/login/index.js"></script>

<?php auth_footer(); ?>
