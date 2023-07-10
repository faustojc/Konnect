<?php
auth_head();

$this->load->library('session');
$error_message = $this->session->flashdata('error_message');
?>

<body class="fade-in">
    <div class="container mx-auto h-100">
        <div class="card mx-auto my-2 my-md-5 w-75">
            <div class="row align-items-center flex-column p-4">
                <div class="col-md-12 col-lg-6 mb-3 mb-md-0">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <img src="<?= base_url() ?>assets/images/Logo/Konnect3.png" alt="" class="img-fluid w-50 mb-3">
                        <h5 class="text-center font-italic text-muted font-weight-light mb-0">Empowering Connections, Empowering Careers</h5>
                    </div>
                </div>

                <!-- Login Form -->
                <div class="col-md-12 col-lg-6 px-3">
                    <h3 class="text-center font-weight-bold my-4">Login to your account</h3>
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger alert-dismissible fade show my-4 text-center" role="alert">
                            <strong>Error!</strong> <?= $error_message ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url() ?>login" method="post">
                        <div class="row">

                            <!-- First Name -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                                </div>
                                <input id="username" type="text" name="username" placeholder="Username" class="form-control bg-white border-left-0 border-md" required>
                            </div>

                            <!-- Last Name -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                                </div>
                                <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group col-lg-12 mx-auto mb-0">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    <span class="font-weight-bold">Log in</span>
                                </button>
                            </div>

                            <!-- Divider Text -->
                            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                                <div class="border-bottom w-100 ml-5 py-1"></div>
                                <div class="border-bottom w-100 mr-5 py-1"></div>
                            </div>

                            <!-- Already Registered -->
                            <div class="text-center w-100">
                                <p class="text-muted font-weight-bold">
                                    Don't have an account?
                                    <a href="<?= base_url() ?>add_personnel" class="text-primary ml-2">Register here</a>
                                </p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ############ PAGE END -->
<?php auth_footer(); ?>
