<?php
main_header(['employee']);
?>
<!-- ############ PAGE START-->

<!-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Register</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Make an Employee Account</a></li>
                     <li class="breadcrumb-item active">Dashboard</li> -->
                <!-- </ol> -->
            <!-- </div>  -->
            
            <!-- <button type="submit" class="btn btn-dark" id="btn_register">Register</button>
        </div>
</div> -->


<section class="px-5 py-5 d-flex justify-content-center">
 
<div class="card card-dark" >
              <div class="card-header">
                <h3 class="card-title">Register</h3>
              </div>
              
              <div class="px-5 py-5">
                
                    <div class="row pb-3">
                        <div class="col-md-4">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="Fname" placeholder="Enter First Name">
                        </div>
                        
                        
                        <div class="col-md-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" id="Mname" placeholder="Enter Middle Name">
                        </div>

                        <div class="col-md-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="Lname" placeholder="Enter Last Name">
                        </div>
                    </div>
                    
                    
                
                
                <div class="row pb-3">
                    <div class="col-md-6">
                    <label>Contact Number</label>
                    <input type="number" class="form-control" id="Cnum" placeholder="Enter Contact number">
                    </div>

                    <div class="col-md-6">
                    <label>Email Address</label>
                    <input type="text" class="form-control" id="Email" placeholder="Enter Email address">
                    </div>
                </div>
                
                
                

                <section class="pb-3">
                <label>Address</label>
				<input type="text" class="form-control" id="Address" placeholder="Enter Address">
                </section>

                
                <div class="row pb-4">
                    <div class="col-md-6">
                    <label>Barangay</label>
                    <input type="text" class="form-control" id="Barangay" placeholder="Enter Barangay">
                    </div>

                    <div class="col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" id="City" placeholder="Enter City">
                    </div>
                </div>
        
                <div class="row pb-3">
                    <div class="col-md-4">
                        <label>Birth Date</label>
                        <input type="date" id="Bday" name="bday" style="width:250px;">
                    </div>
                    
                    <div class="col-md-4">
                        <label>Gender</label>
                        <div>
                        <select name="gender" id="Gender" style="width:250px;">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4">
                    <label>Civil Status</label>
                        <select name="cstat" id="Cstat" style="width:250px;">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widowed">Widowed</option>
                            <option value="divorced">Divorced</option>
                            <option value="separated">Separated</option>                    
                        </select>
                    </div>
                    
                </div>

                <div class="pb-3">
                        <label>Religion</label>
                        <input type="text" class="form-control" id="Religion" placeholder="Enter Religion">
                </div>


                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>SSS</label>
				        <input type="number" class="form-control" id="SSS" placeholder="Enter SSS number">
                    </div>
                    <div class="col-md-6">
                        <label>Tin</label>
				        <input type="number" class="form-control" id="Tin" placeholder="Enter Tin number">
                    </div>

                </div>

                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Phil Health</label>
				        <input type="number" class="form-control" id="Phil_health" placeholder="Enter Phil Health number">
                    </div>
                    <div class="col-md-6">
                        <label>Pag-IBIG</label>
				        <input type="number" class="form-control" id="Pag_ibig" placeholder="Enter Pag-IBIG number">
                    </div>

                </div>

                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Job Title</label>
                        <input type="text" class="form-control" id="Title" placeholder="Enter Job Title">
                    </div>
                </div>
                
                <!-- <label>Password:</label>
                <input type="password" id="password" name="password"> -->


                </div>

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
                <a href="<?= base_url() ?>employee" type="submit" class="btn btn-dark" id="btn_register">Register</a>
              </form>
</div>


</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employee/index.js"></script>