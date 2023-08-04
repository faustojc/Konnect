<?php main_header(['employee']); ?>
<!-- ############ PAGE START-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    body {
        background: #f5f5f5;
        margin-top: 20px;
    }

    .btn-default {
        border-color: rgba(24, 28, 33, 0.1);
        background: rgba(0, 0, 0, 0);
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

    .btn-facebook {
        border-color: rgba(0, 0, 0, 0);
        background: #3B5998;
        color: #fff;
    }

    .btn-instagram {
        border-color: rgba(0, 0, 0, 0);
        background: #000;
        color: #fff;
    }

    .card {
        background-clip: padding-box;
        /* box-shadow: 0 1px 4px rgba(24,28,33,0.012); */
        border-radius: 15px;
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
        border-color: rgba(24, 28, 33, 0.03) !important;
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
    <div class="row">
        <div class="col-md-3 pt-0">
            <div class="card shadow-none">
                <div class="card-body" style="padding:10px 20px; font-weight:650;">
                    <a href="<?php echo base_url() ?>employee_profile?id=<?= $employee->ID ?>" class=""><i class="fa-solid fa-chevron-left"></i>
                        Back to profile</a>
                </div>
            </div>
            <div class="card overflow-hidden shadow-none">
                <div class="list-group list-group-flush account-settings-links" id="tab">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-email">E-mail</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-govt-id">Government
                        ID</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change
                        password</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-deletion">Account
                        deletion</a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card shadow-none" id="form_content">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        <form>
                            <div class="card-body ">
                                <div class="row pb-3">
                                    <div class="container">
                                        <label class="form-label">Profile Picture</label>
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $employee->Employee_image ?>" class="picture-src" id="wizardPicturePreview" title="" alt="">
                                                <input type="file" name="Employee_image" id="Employee_image" value="<?= $employee->Employee_image ?>">
                                            </div>
                                            <h6 class="my-3">Upload New Picture</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body ">
                                <div class="form-group">
                                    <label for="Title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="Title" id="Title" value="<?= $employee->Title ?>" placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label for="Fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="Fname" id="Fname" value="<?= $employee->Fname ?>" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="Mname" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="Mname" id="Mname" value="<?= $employee->Mname ?>" placeholder="Enter Middle Name">
                                </div>
                                <div class="form-group">
                                    <label for="Lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="Lname" id="Lname" value="<?= $employee->Lname ?>" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="Gender" class="form-label">Gender</label>
                                    <select name="Gender" class="form-control" id="Gender" value="<?= $employee->Gender ?>" style="width:250px;">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="account-email">
                        <form>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label for="Email" class="form-label">E-mail Address</label>
                                    <input type="email" class="form-control" name="Email" id="Email" value="<?= $employee->Email ?>" placeholder="Enter Email address">
                                    <?php verify_message($auth); ?>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="account-info">
                        <form>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label for="Cnum" class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" name="Cnum" id="Cnum" value="<?= $employee->Cnum ?>" placeholder="Enter Contact number">
                                </div>
                                <div class="form-group">
                                    <label for="Address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="Address" id="Address" value="<?= $employee->Address ?>" placeholder="Enter Address">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Region" class="form-label">Region</label>
                                            <select name="Region" id="Region" class="form-control" value="<?= $employee->Region ?>"> </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Province" class="form-label">Province</label>
                                            <select name="Province" id="Province" class="form-control" value="<?= $employee->Province ?>"> </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="City" class="form-label">City</label>
                                            <select name="City" id="City" class="form-control" value="<?= @$employee->City ?>"> </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Barangay" class="form-label">Barangay</label>
                                            <select name="Barangay" id="Barangay" class="form-control" value="<?= @$employee->Barangay ?>"> </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Religion" class="form-label">Religion</label>
                                    <input type="text" class="form-control" name="Religion" id="Religion" value="<?= @$employee->Religion ?>" placeholder="Enter Religion">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Bday" class="form-label">Birthday</label>
                                        <input type="date" class="form-control" id="Bday" name="Bday" value="<?= @$employee->Bday ?>" style="width:395px;">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="Cstat" class="form-label">Civil Status</label>
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
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-govt-id">
                        <form>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label for="SSS" class="form-label">SSS</label>
                                    <input type="number" class="form-control" name="SSS" id="SSS" value="<?= @$employee->SSS ?>" placeholder="Enter SSS number">
                                </div>
                                <div class="form-group">
                                    <label for="Tin" class="form-label">Tin</label>
                                    <input type="number" class="form-control" name="Tin" id="Tin" value="<?= @$employee->Tin ?>" placeholder="Enter Tin number">
                                </div>
                                <div class="form-group">
                                    <label for="Phil_health" class="form-label">Phil Health</label>
                                    <input type="number" class="form-control" name="Phil_health" id="Phil_health" value="<?= @$employee->Phil_health ?>" placeholder="Enter Phil Health number">
                                </div>
                                <div class="form-group">
                                    <label for="Pag_ibig" class="form-label">Pag-IBIG</label>
                                    <input type="number" class="form-control" name="Pag_ibig" id="Pag_ibig" value="<?= @$employee->Pag_ibig ?>" placeholder="Enter Pag-IBIG number">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="account-change-password">
                        <form>
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label for="current_password" class="form-label"> Current password
                                        <input name="current_password" type="password" class="form-control"> </label>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"> New password
                                        <input name="password" type="password" class="form-control" placeholder="at least 8 characters">
                                    </label>
                                </div>

                                <div class="form-group mb-0">
                                    <label class="form-label"> Repeat new password
                                        <input name="repeat_password" type="password" class="form-control" placeholder="at least 8 characters">
                                    </label>
                                </div>
                                <div>
                                    <a class="text-primary" href="">Forgot password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="account-deletion">
                        <div class="card-body">
                            <h5>Delete your account</h5>
                            <p><strong>Deleting your account is an irreversible action.</strong> This means that all
                                your data, settings, and associated information will be permanently removed and cannot
                                be recovered. Please be certain of your decision before proceeding with account
                                deletion.</p>
                        </div>
                    </div>
                </div>
                <hr class="border-light mb-2">
                <div class="text-right m-2">
                    <button type="submit" class="btn btn-info" id="update_profile">Save changes</button>
                    <button type="button" class="btn btn-danger delete" id="delete_profile" data-id="<?= $employee->ID ?>" style="display:none;">
                        Confirm deletion
                    </button>
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

    $(document).ready(function () {
        // Button visibility based on active tab
        $("#tab").on("shown.bs.tab", function (event) {
            const activeTabId = $(event.target).attr("href"); // Get the ID of the active tab
            const hiddenButtonTabs = ["#account-deletion"]; // Add more tab-ids if needed

            if (hiddenButtonTabs.includes(activeTabId)) {
                $("#update_profile").hide(); // Hide the button for specific tabs
            } else {
                $("#update_profile").show(); // Show the button for other tabs
            }
        });
    });

    $(document).ready(function () {
        // Function to show or hide the button based on the active tab
        function toggleButtonVisibility(activeTabId) {
            const hiddenButtonTabs = ["#account-general", "#account-email", "#account-info", "#account-govt-id", "#account-change-password", "#account-connections"]; // Add more tab-ids if needed

            if (hiddenButtonTabs.includes(activeTabId)) {
                $("#delete_profile").hide(); // Hide the button for specific tabs
            } else {
                $("#delete_profile").show(); // Show the button for other tabs
            }
        }

        // Button visibility based on active tab when tab changes
        $("#tab").on("shown.bs.tab", function (event) {
            const activeTabId = $(event.target).attr("href"); // Get the ID of the active tab
            toggleButtonVisibility(activeTabId);
        });
    });
</script>
<script src="<?php echo base_url() ?>/assets/js/employee_profile/index.js"></script>
