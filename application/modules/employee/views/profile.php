<?php
main_header(['employee']);

$employee = $details['employee'];
$education = $details['education'];

?>
<!-- ############ PAGE START-->
<style>
    /*Profile Pic Start*/
    .picture-container {
        position: relative;
        cursor: pointer;
        text-align: center;
    }

    .picture {
        width: 106px;
        height: 106px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: 0px auto;
        overflow: hidden;
        transition: all 0.2s;
        -webkit-transition: all 0.2s;
    }

    .picture:hover {
        border-color: #2ca8ff;
    }

    .content.ct-wizard-green .picture:hover {
        border-color: #05ae0e;
    }

    .content.ct-wizard-blue .picture:hover {
        border-color: #3472f7;
    }

    .content.ct-wizard-orange .picture:hover {
        border-color: #ff9500;
    }

    .content.ct-wizard-red .picture:hover {
        border-color: #ff3b30;
    }

    .picture input[type="file"] {
        cursor: pointer;
        display: block;
        height: 100%;
        left: 0;
        opacity: 0 !important;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .picture-src {
        width: 100%;

    }

    /*Profile Pic End*/
</style>

&nbsp;
<section class="px-5 py-5 d-flex justify-content-center">
    <div class="card card-info" >
                <div class="card-header">
                    <h3 class="card-title">Edit Employee Details</h3>
                </div>
                <div>
                <form class="px-5 py-5" id="needs-validation">

                    <div class="pb-3">
                        <h3><b>Personal Information</b></h3>
                    </div>

                    <div class="row pb-3">
                            <div class="container">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $employee->Employee_image ?>"
                                             class="picture-src" id="wizardPicturePreview" title="" alt="">
                                        <input type="file" name="Employee_image" id="Employee_image" value="<?= @$employee->Employee_image ?>">
                                    </div>
                                    <h6 class="my-3">Upload New Picture</h6>
                                </div>
                            </div>
                    </div>


                     <hr class="mb-4">
                    
                    <div class="row pb-3">
                        <div class="col-md-4">
                        <input type="text" class="form-control" id="employee_ID" value="<?=@$employee->ID?>" hidden>
                        <label>First Name</label>
                        <input type="text" class="form-control" id="Fname" value="<?=@$employee->Fname?>" placeholder="Enter First Name">
                        </div>
                        
                        
                        <div class="col-md-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" id="Mname" value="<?=@$employee->Mname?>" placeholder="Enter Middle Name">
                        </div>

                        <div class="col-md-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="Lname" value="<?=@$employee->Lname?>" placeholder="Enter Last Name">
                        </div>
                    </div>
                                    
                    <div class="row pb-3">
                        <div class="col-md-6">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" id="Cnum" value="<?=@$employee->Cnum?>" placeholder="Enter Contact number">
                        </div>

                        <div class="col-md-6">
                        <label>Email Address</label>
                        <input type="text" class="form-control" id="Email" value="<?=@$employee->Email?>" placeholder="Enter Email address">
                        </div>
                    </div>
                    
                    <section class="pb-3">
                        <label>Address</label>
                        <input type="text" class="form-control" id="Address" value="<?=@$employee->Address?>" placeholder="Enter Address">
                        </section>

                        
                        <div class="row pb-4">
                            <div class="col-md-6">
                            <label>Barangay</label>
                            <input type="text" class="form-control" id="Barangay" value="<?=@$employee->Barangay?>" placeholder="Enter Barangay">
                            </div>

                            <div class="col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control" id="City" value="<?=@$employee->City?>" placeholder="Enter City">
                            </div>
                        </div>
                
                        <div class="row pb-3">
                            <div class="col-md-4">
                            <label>Birth Date</label>
                            <input type="date" class="form-control" id="Bday" name="bday" value="<?=@$employee->Bday?>" style="width:250px;">
                            </div>
                            
                            <div class="col-md-4">
                            <label>Gender</label>
                            <div>
                            <select name="gender" class="form-control" id="Gender" value="<?=@$employee->Gender?>" style="width:250px;">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                            </div>
                            </div>
                            
                            <div class="col-md-4">
                            <label>Civil Status</label>
                                <select name="cstat" class="form-control" id="Cstat" value="<?=@$employee->Cstat?>" style="width:250px;">
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
                            <input type="text" class="form-control" id="Religion" value="<?=@$employee->Religion?>" placeholder="Enter Religion">
                        </div>


                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>SSS</label>
                                <input type="number" class="form-control" id="SSS" value="<?=@$employee->SSS?>" placeholder="Enter SSS number">
                            </div>

                            <div class="col-md-6">
                                <label>Tin</label>
                                <input type="number" class="form-control" id="Tin" value="<?=@$employee->Tin?>" placeholder="Enter Tin number">
                            </div>

                        </div>

                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>Phil Health</label>
                                <input type="number" class="form-control" id="Phil_health" value="<?=@$employee->Phil_health?>" placeholder="Enter Phil Health number">
                            </div>
                            <div class="col-md-6">
                                <label>Pag-IBIG</label>
                                <input type="number" class="form-control" id="Pag_ibig" value="<?=@$employee->Pag_ibig?>" placeholder="Enter Pag-IBIG number">
                            </div>
                        </div>

                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label>Job Title</label>
                                <input type="text" class="form-control" id="Title" value="<?=@$employee->Title?>" placeholder="Enter Job Title">
                            </div>
                        </div>

                        <!-- EDUCATION -->

                        <div class="py-3">
                            <h3><b>Education</b></h3>
                        </div>

                        <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                        <div class="table-responsive">  
                            <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th style="width: 5%;">Level</th>
                                <th style="width: 5%;">Institution</th>
                                <th style="width: 5%;">Title</th>
                                            <th style="width: 5%;">Start Date</th>
                                <th style="width: 5%;">End Date</th>
                                <th style="width: 5%;">Hours</th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php
                                    if(!empty($education)){
                                            ?>
                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                        <td><?=(@$education->Level)?></td>
                                                        <td><?=(@$education->Institution)?></td>
                                                        <td><?=(@$education->Title)?></td>
                                                        <td><?=date("M d, Y", strtotime(@$education->Start_date))?></td>
                                                        <td><?=date("M d, Y", strtotime(@$education->End_date))?></td>
                                                        <td><?=(@$education->Hours)?></td>
                                                    </tr>

                                                <tr class="expandable-body">
                                                    
                                                    <td colspan="8">
                                                        <p style="display:none;"><?=(@$education->Description)?></p>
                                                    </td>
                                                </tr>
                                            <?php  
                                        }        
                                    else{
                                        ?>
                                            <tr>
                                                <td colspan="8">
                                                    <div style="text-align: center;"><h6 style="color:red">No Data Found.</h6></div>
                                                </td>
                                            </tr>
                                        <?php
                                        
                                    }
                                ?>

                            </tbody>
                                
                            
                            
                            </table>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        </div>

                        
                    <!-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                    
                </div>
                <button type="submit" class="btn btn-info" id="btn_update">Update</button>
            </form>
    </div>

</section>



<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script>
    $(document).ready(function () {
        // Prepare the preview for profile picture
        $("#Employee_image").change(function () {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="<?php echo base_url() ?>/assets/js/employee/index.js"></script>