<?php auth_head(); ?>
<!-- ############ PAGE START-->
<style>

</style>

<body style="background-color:rgb(241, 246, 249);">


</body>
<div class="container">
    <div class="row py-5 mt-4 justify-content-center align-items-center">
        <div class="col-md-6 pr-lg-5 mb-4 mb-md-0">
            <img src="<?= base_url() ?>assets/images/register/register3.png" alt="Create an account" class="img-fluid mb-3 d-none d-md-block">
        </div>

        <!-- Registration Form -->
        <div class="col-md-6 col-lg-6 ml-auto">
            <div class="row m-0 p-4">
                <div class="card shadow-none border-0" style="border-radius:15px;">
                    <div class="card-body">
                        <div class="col-12 mb-4">
                            <h1>Create an Account</h1>
                            <p class="font-italic text-muted mb-0">Join the Konnect community and connect with other job seekers and employers</p>
                        </div>
                        <div class="col-12 form-display">
                            <form id="needs-validation">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend email-input">
                                        <span class="input-group-text px-4 border-0" style="border-radius:15px 0 0 15px; background-color: #F4F6F7;">
                                            <i class="fa fa-user text-muted"></i>
                                        </span>
                                        <input id="email" type="email" name="email" placeholder="Enter valid email" class="form-control border-0" style="border-radius:0 15px 15px 0; background-color: #F4F6F7;">
                                    </div>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend password-input">
                                        <span class="input-group-text px-4 border-0" style="border-radius:15px 0 0 15px; background-color: #F4F6F7;">
                                            <i class="fa fa-lock text-muted"></i>
                                        </span>
                                        <input id="password" type="password" name="password" placeholder="At least 6 characters long" class="form-control border-0" style="border-radius:0 15px 15px 0; background-color: #F4F6F7;">
                                    </div>
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-prepend confirm-password-input">
                                        <span class="input-group-text px-4 border-0" style="border-radius:15px 0 0 15px; background-color: #F4F6F7;">
                                            <i class="fa fa-lock text-muted"></i>
                                        </span>
                                        <input id="password_confirm" type="password" placeholder="Confirm password" class="form-control border-0" style="border-radius:0 15px 15px 0; background-color: #F4F6F7;">
                                    </div>
                                </div>

                                <div class="input-group mb-4">
                                    <select id="user_type" name="user_type" class="form-control custom-select border-0 shadow-none" style="border-radius:15px; background-color: #F4F6F7;">
                                        <option value="" selected disabled>-- Choose user type --</option>
                                        <option value="EMPLOYER">EMPLOYER</option>
                                        <option value="EMPLOYEE">EMPLOYEE</option>
                                    </select>
                                </div>

                                <div class="mt-5">
                                    <button type="button" class="btn btn-info w-100 next-btn" style="border-radius:15px;">
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
    </div>
</div>

<script src="<?= base_url() ?>assets/js/register/index.js" type="text/javascript"></script>
<!-- ############ PAGE END -->
<?php auth_footer(); ?>