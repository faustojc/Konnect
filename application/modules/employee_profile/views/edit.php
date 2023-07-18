<?php main_header(['employee']); ?>
<!-- ############ PAGE START-->
<style>
body{
    background: #f5f5f5;
    margin-top:20px;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-info {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    /* box-shadow: 0 1px 4px rgba(24,28,33,0.012); */
    border-radius: 15px;
}

.card-body {
    box-shadow: 0;
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}

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
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold pt-3 my-4">
    Edit Your Profile  
    </h4>
    <input type="text" class="form-control" name="ID" id="ID" value="<?= @$employee->ID ?>" hidden readonly>
        
        

      <div class="row">
        <div class="col-md-3 pt-0">
        <div class="card shadow-none">
          
          <div class="card-body" style="padding:10px 20px; font-weight:650;">
          <a href="<?php echo base_url() ?>employee_profile/index/<?= $employee->ID ?>" class="" data-toggle="list"><i class="fa-solid fa-chevron-left"></i> Back to profile</a>
          </div>

        </div>
        <div class="card overflow-hidden shadow-none">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-govt-id">Government ID</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
          </div>

        </div>

        
        </div>

        <div class="col-md-9">
        <div class="card shadow-none">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              <div class="card-body ">
              <div class="row pb-3">
                    <div class="container">
                    <label class="form-label">Profile Picture</label>
                        <div class="picture-container">
                            <div class="picture">
                                <img src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $employee->Employee_image ?>" class="picture-src" id="wizardPicturePreview" title="" alt="">
                                <input type="file" name="Employee_image" id="Employee_image" value="<?= @$employee->Employee_image ?>">
                            </div>
                            <h6 class="my-3">Upload New Picture</h6>
                        </div>
                    </div>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body ">
                <div class="form-group">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control" name="Fname" id="Fname" value="<?= @$employee->Fname ?>" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Middle Name</label>
                  <input type="text" class="form-control" name="Mname" id="Mname" value="<?= @$employee->Mname ?>" placeholder="Enter Middle Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Last Name</label>
                  <input type="text" class="form-control" name="Lname" id="Lname" value="<?= @$employee->Lname ?>" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Gender</label>
                    <select name="Gender" class="form-control" id="Gender" value="<?= @$employee->Gender ?>" style="width:250px;">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail Address</label>
                  <input type="email" class="form-control" name="Email" id="Email" value="<?= @$employee->Email ?>" placeholder="Enter Email address">
                  <div class="alert alert-warning mt-3">
                    Your email is not confirmed. Please check your inbox.<br>
                    <a href="javascript:void(0)">Resend confirmation</a>
                  </div>
                </div>
              </div>

            </div>
            
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">Contact Number</label>
                  <input type="number" class="form-control" name="Cnum" id="Cnum" value="<?= @$employee->Cnum ?>" placeholder="Enter Contact number">
                </div>
                <div class="form-group">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" name="Address" id="Address" value="<?= @$employee->Address ?>" placeholder="Enter Address">
                </div>
                <div class="form-group">
                  <label class="form-label">Barangay</label>
                  <input type="text" class="form-control" name="Barangay" id="Barangay" value="<?= @$employee->Barangay ?>" placeholder="Enter Barangay">
                </div>
                <div class="form-group">
                  <label class="form-label">City</label>
                  <input type="text" class="form-control" name="City" id="City" value="<?= @$employee->City ?>" placeholder="Enter City">
                </div>
                <div class="form-group">
                  <label class="form-label">Religion</label>
                  <input type="text" class="form-control" name="Religion" id="Religion" value="<?= @$employee->Religion ?>" placeholder="Enter Religion">
                </div>
                <div class="row pb-3">
                    <div class="col-md-6">
                    <label class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="Bday" name="Bday" value="<?= @$employee->Bday ?>" style="width:395px;">
                    </div>

                    <div class="col-md-6">
                    <label class="form-label">Civil Status</label>
                        <select name="Cstat" class="form-control" id="Cstat" value="<?= @$employee->Cstat ?>" style="width:395px;">
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widowed">Widowed</option>
                            <option value="divorced">Divorced</option>
                            <option value="separated">Separated</option>
                        </select>
                    </div>
                </div>
              </div>
      
            </div>
            <div class="tab-pane fade" id="account-govt-id">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">SSS</label>
                  <input type="number" class="form-control" name="SSS" id="SSS" value="<?= @$employee->SSS ?>" placeholder="Enter SSS number">
                </div>
                <div class="form-group">
                  <label class="form-label">Tin</label>
                  <input type="number" class="form-control" name="Tin" id="Tin" value="<?= @$employee->Tin ?>" placeholder="Enter Tin number">
                </div>
                <div class="form-group">
                  <label class="form-label">Phil Health</label>
                  <input type="number" class="form-control" name="Phil_health" id="Phil_health" value="<?= @$employee->Phil_health ?>" placeholder="Enter Phil Health number">
                </div>
                <div class="form-group">
                  <label class="form-label">Pag-IBIG</label>
                  <input type="number" class="form-control" name="Pag_ibig" id="Pag_ibig" value="<?= @$employee->Pag_ibig ?>" placeholder="Enter Pag-IBIG number">
                </div>

              </div>
            </div>

            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control">
                </div>

                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control">
                </div>

              </div>
            </div>

            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <h5 class="mb-2">
                  <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                  <i class="ion ion-logo-google text-google"></i>
                  You are connected to Google:
                </h5>
                nmaxwell@mail.com
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
              </div>
            </div>

          </div>
          <div class="text-right m-2">
                <button type="button" class="btn btn-default">Cancel</button>&nbsp;
                <button type="submit" class="btn btn-info" id="update_profile">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>


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