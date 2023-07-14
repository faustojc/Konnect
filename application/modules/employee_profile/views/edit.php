<?php main_header(['employee']); ?>
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
    <div class="card card-white">
        <div class="card-header">
            <h3 class="card-title">Edit Employee Details</h3>
        </div>
        <div class="card-body">
            <form class="px-5 py-5" id="needs-validation">
                <input type="text" class="form-control" name="ID" id="ID" value="<?= @$employee->ID ?>" hidden readonly>
                <div class="row pb-3">
                    <div class="container">
                        <div class="picture-container">
                            <div class="picture">
                                <img src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $employee->Employee_image ?>" class="picture-src" id="wizardPicturePreview" title="" alt="">
                                <input type="file" name="Employee_image" id="Employee_image" value="<?= @$employee->Employee_image ?>">
                            </div>
                            <h6 class="my-3">Upload New Picture</h6>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <div class="pb-3">
                    <h3><b>Personal Information</b></h3>
                </div>
                <div class="row pb-3">
                    <div class="col-md-4">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="Fname" id="Fname" value="<?= @$employee->Fname ?>" placeholder="Enter First Name">
                    </div>
                    <div class="col-md-4">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="Mname" id="Mname" value="<?= @$employee->Mname ?>" placeholder="Enter Middle Name">
                    </div>
                    <div class="col-md-4">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="Lname" id="Lname" value="<?= @$employee->Lname ?>" placeholder="Enter Last Name">
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" name="Cnum" id="Cnum" value="<?= @$employee->Cnum ?>" placeholder="Enter Contact number">
                    </div>
                    <div class="col-md-6">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="Email" id="Email" value="<?= @$employee->Email ?>" placeholder="Enter Email address">
                    </div>
                </div>
                <section class="pb-3">
                    <label>Address</label>
                    <input type="text" class="form-control" name="Address" id="Address" value="<?= @$employee->Address ?>" placeholder="Enter Address">
                </section>
                <div class="row pb-4">
                    <div class="col-md-6">
                        <label>Barangay</label>
                        <input type="text" class="form-control" name="Barangay" id="Barangay" value="<?= @$employee->Barangay ?>" placeholder="Enter Barangay">
                    </div>
                    <div class="col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control" name="City" id="City" value="<?= @$employee->City ?>" placeholder="Enter City">
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-md-4">
                        <label>Birth Date</label>
                        <input type="date" class="form-control" id="Bday" name="Bday" value="<?= @$employee->Bday ?>" style="width:250px;">
                    </div>
                    <div class="col-md-4">
                        <label>Gender</label>
                        <select name="Gender" class="form-control" id="Gender" value="<?= @$employee->Gender ?>" style="width:250px;">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Civil Status</label>
                        <select name="Cstat" class="form-control" id="Cstat" value="<?= @$employee->Cstat ?>" style="width:250px;">
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
                    <input type="text" class="form-control" name="Religion" id="Religion" value="<?= @$employee->Religion ?>" placeholder="Enter Religion">
                </div>
                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>SSS</label>
                        <input type="number" class="form-control" name="SSS" id="SSS" value="<?= @$employee->SSS ?>" placeholder="Enter SSS number">
                    </div>

                    <div class="col-md-6">
                        <label>Tin</label>
                        <input type="number" class="form-control" name="Tin" id="Tin" value="<?= @$employee->Tin ?>" placeholder="Enter Tin number">
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Phil Health</label>
                        <input type="number" class="form-control" name="Phil_health" id="Phil_health" value="<?= @$employee->Phil_health ?>" placeholder="Enter Phil Health number">
                    </div>
                    <div class="col-md-6">
                        <label>Pag-IBIG</label>
                        <input type="number" class="form-control" name="Pag_ibig" id="Pag_ibig" value="<?= @$employee->Pag_ibig ?>" placeholder="Enter Pag-IBIG number">
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-md-6">
                        <label>Job Title</label>
                        <input type="text" class="form-control" name="Title" id="Title" value="<?= @$employee->Title ?>" placeholder="Enter Job Title">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info w-100" id="update_profile">Update</button>
        </div>
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
<script src="<?php echo base_url() ?>/assets/js/employee_profile/index.js"></script>