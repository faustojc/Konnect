<?php auth_head(); ?>
<!-- ############ PAGE START-->
<style>
    #btn_register {
        width: 100%;
        /* Set the initial width to 100% */
    }

    @media (min-width: 576px) {

        /* Adjust the width for screens with a minimum width of 576px (sm breakpoint) */
        #btn_register {
            width: 300px;
        }
    }

    @media (min-width: 768px) {

        /* Adjust the width for screens with a minimum width of 768px (md breakpoint) */
        #btn_register {
            width: 540px;
        }
    }

    .custom-date-input {
        height: 40px;
        /* Set your desired height here */
    }
</style>

<body class="fade-in d-flex align-items-center h-100">
    <div class="container">
        <div class="row py-2 mt-4 justify-content-center align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>
                <p class="font-italic text-muted mb-0">Start your career journey with us!</p>
            </div>

            <!-- Registration Form -->
            <div class="col-md-8 col-lg-6 ml-lg-auto">

                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Employer Name</label>
                        <input type="text" class="form-control" id="employer_name" style=" font-size:14px">
                    </div>

                    <div class="col-md-6">
                        <label>Trade Name</label>
                        <input type="text" class="form-control" id="tradename" style=" font-size:14px">
                    </div>

                </div>

                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Address</label>
                        <input type="text" class="form-control" id="Address" style=" font-size:14px">
                    </div>

                    <div class="col-md-6">
                        <label>Barangay</label>
                        <input type="text" class="form-control" id="Barangay" style=" font-size:14px">
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" id="Cnum">
                    </div>
                    <div class="col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" id="City" style=" font-size:14px">
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-md-12">
                        <label>Summary</label>
                        <textarea class="form-control" rows="3" id="summary"></textarea>
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-md-12 d-flex justify-content-center">
                        <a href="#" type="submit" class="btn btn-info btn-block" id="btn_register">Register</a>
                    </div>
                </div>



            </div>
        </div>
    </div>
</body>
<!-- ############ PAGE END -->
<?php auth_footer(); ?>