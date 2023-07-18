<?php
main_header(['employer_profile']);
?>
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
        width: 100px;
        height: 100px;
        background-color: #999999;
        border: 4px solid #CCCCCC;
        color: #FFFFFF;
        border-radius: 50%;
        margin: 0 auto;
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

    /*Profile Pic End*/
</style>
&nbsp;
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold pt-3 my-4">
    Edit Your Profile  
    </h4>
    <input type="text" class="form-control" name="ID" id="ID" value="<?= @$employer->id ?>" hidden readonly>
        
        

      <div class="row">
        <div class="col-md-3 pt-0">
        <div class="card shadow-none">
          
          <div class="card-body" style="padding:10px 20px; font-weight:650;">
            <a href="<?php echo base_url() ?>employer_profile?id=<?= $employer->id ?>" class="" data-toggle="list"><i class="fa-solid fa-chevron-left"></i> Back to profile</a>
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
                                <img src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $employer->image ?>" class="img-fluid my-auto" id="wizardPicturePreview" title="" alt="">
                                <input type="file" id="image">
                            </div>
                            <h6 class="my-3">Upload New Picture</h6>
                        </div>
                    </div>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body ">
                <div class="form-group">
                  <label class="form-label">Employer Name</label>
                  <input type="text" class="form-control" id="employer_name" value="<?= $employer->employer_name ?>" placeholder="Enter Employer Name" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Trade Name</label>
                  <input type="text" class="form-control" id="tradename" value="<?= $employer->tradename ?>" placeholder="Enter Trade Name" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Business Type</label>
                    <select class="custom-select" name="business_type" id="business_type" value="<?= $employer->business_type ?>">
                        <option value="Retail">Retail</option>
                        <option value="Food and Beverages">Food and Beverages</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Finance and Banking">Finance and Banking</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Education">Education</option>
                        <option value="Manufacturing and Engineering">Manufacturing and Engineering</option>
                        <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                        <option value="Media and Entertainment">Media and Entertainment</option>
                        <option value="Energy and Utilities">Energy and Utilities</option>
                        <option value="Transportation and Logistics">Transportation and Logistics</option>
                    </select>
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail Address</label>
                  <input type="text" class="form-control" id="email" value="<?= $employer->email ?>" placeholder="Enter Email address" required>
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
                  <input type="number" class="form-control" id="contact_number" value="<?= $employer->contact_number ?>" placeholder="Enter Contact number" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" value="<?= $employer->address ?>" placeholder="Enter Address" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Barangay</label>
                  <input type="text" class="form-control" id="barangay" value="<?= $employer->barangay ?>" placeholder="Enter Barangay" required>
                </div>
                <div class="form-group">
                  <label class="form-label">City</label>
                  <input type="text" class="form-control" id="city" value="<?= $employer->city ?>" placeholder="Enter City" required>
                </div>
              </div>
      
            </div>
            <div class="tab-pane fade" id="account-govt-id">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">SSS</label>
                  <input type="number" class="form-control" id="sss" value="<?= $employer->sss ?>" placeholder="Enter SSS number" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Tin</label>
                  <input type="number" class="form-control" id="tin" value="<?= $employer->tin ?>" placeholder="Enter Tin number" required>
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
    $('#business_type').val('<?= $employer->business_type ?>');

    $(document).ready(function () {
        // Prepare the preview for profile picture
        $("#image").change(function () {
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
<script src="<?php echo base_url() ?>/assets/js/employer_profile/index.js"></script>