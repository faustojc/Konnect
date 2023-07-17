<?php auth_head(); ?>
<!-- ############ PAGE START-->
<div class="wrapper">
    <div class="row py-5 mt-4 justify-content-center align-items-center">
        <div class="col-md-6 pr-lg-5 mb-4 mb-md-0">
            <img src="<?= base_url() ?>assets/images/register/5423351_register.svg" alt="Create an account" class="img-fluid mb-3 d-none d-md-block">
        </div>

        <!-- Registration Form -->
        <div class="col-md-6 col-lg-6 ml-auto">
            <div class="row m-0 p-4">
                <div class="col-12 mb-4">
                    <h1>Create an Account</h1>
                    <p class="font-italic text-muted mb-0">Join the Konnect community and connect with other job seekers and employers</p>
                </div>
                <div class="col-12 form-display">
                    <form id="needs-validation">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend email-input">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                                <input id="email" type="email" name="email" placeholder="Enter valid email" class="form-control bg-white border-left-0 border-md">
                            </div>
                        </div>

                        <div class="input-group mb-4">
                            <div class="input-group-prepend password-input">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                                <input id="password" type="password" name="password" placeholder="At least 6 characters long" class="form-control bg-white border-left-0 border-md">
                            </div>
                        </div>

                        <div class="input-group mb-4">
                            <select id="user_type" name="user_type" class="form-control custom-select bg-white border-md">
                                <option value="" selected disabled>-- Choose user type --</option>
                                <option value="EMPLOYER">EMPLOYER</option>
                                <option value="EMPLOYEE">EMPLOYEE</option>
                            </select>
                        </div>

                        <div class="mt-5">
                            <button type="button" class="btn btn-info w-100 next-btn">
                                Next <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </form>
                    <div class="col-12 mt-3">
                        <p>
                            Have a Konnect account?
                            <a href="<?= base_url() ?>login">Sign in here!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/register/index.js" type="text/javascript"></script>
<!-- ############ PAGE END -->
<?php auth_footer(); ?>
