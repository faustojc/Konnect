<?php auth_head(); ?>
<!-- ############ PAGE START-->
<body class="fade-in d-flex align-items-center h-100">
    <div class="container">
        <div class="row py-2 mt-4 justify-content-center align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>
                <p class="font-italic text-muted mb-0">Create a minimal registration page using Bootstrap 4 HTML form elements.</p>
            </div>

            <!-- Registration Form -->
            <div class="col-md-8 col-lg-6 ml-lg-auto">
                <div class="card px-2 py-2" style="border-radius:15px;">
                    <div class="card-body">
                        <div class="row pb-3">
                            <div class="col-md-4">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="Fname" style=" font-size:14px">
                            </div>

                            <div class="col-md-4">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" id="Mname" style=" font-size:14px">
                            </div>

                            <div class="col-md-4">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="Lname" style=" font-size:14px">
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>Contact Number</label>
                                <input type="number" class="form-control" id="Cnum" >
                            </div>

                            <div class="col-md-6">
                                <label>Email Address</label>
                                <input type="text" class="form-control" id="Email" style=" font-size:14px">
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md-8">
                                <label>Address</label>
                                <input type="text" class="form-control" id="Address" style=" font-size:14px">
                            </div>

                            <div class="col-md-4">
                                <label>Religion</label>
                                <input type="text" class="form-control" id="Religion" style=" font-size:14px">
                            </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md-6">
                                <label>Barangay</label>
                                <input type="text" class="form-control" id="Barangay" style=" font-size:14px">
                            </div>

                            <div class="col-md-6">
                                <label>City</label>
                                <input type="text" class="form-control" id="City" style=" font-size:14px">
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>Gender</label>
                                <select name="gender" class="form-control" id="Gender" style="width:150px;">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Civil Status</label>
                                <select name="cstat" class="form-control" id="Cstat">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="separated">Separated</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Birth Date</label>
                                <input type="date" class="form-control" id="Bday" name="bday">
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <a href="#" type="submit" class="btn btn-info" id="btn_register">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- ############ PAGE END -->
<?php auth_footer(); ?>
