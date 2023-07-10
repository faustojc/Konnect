<?php
main_header(['employer_profile']);
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

<section class="px-5 py-5 d-flex justify-content-center">
    <div class="content">
        <div class="container">
            <div class="py-md-3 d-flex justify-content-center">
                <div class="card card-dark">
                    <div class="card-header" style="background-color: #17a2b8; color: white;">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="card-title font-weight-bold">Profile</h2>
                            <div class="card-tools">
                                <a href="<?php echo base_url() ?>employer_profile?id=<?= $employer->id ?>" class="btn btn-outline-info" type="button">
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="needs-validation">
                            <div class="row pb-3">
                                <div class="container">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $employer->image ?>"
                                                class="img-fluid my-auto" id="wizardPicturePreview" title="" alt="">
                                            <input type="file" id="image">
                                        </div>
                                        <h6 class="my-3">Upload New Picture</h6>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row pb-3">
                                <input type="text" class="form-control" id="id" value="<?= $employer->id ?>" hidden>

                                <div class="col-md-12">
                                    <label for="employer_name">Employer Name</label>
                                    <input type="text" class="form-control" id="employer_name" value="<?= $employer->employer_name ?>" placeholder="Enter Employer Name" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="number" class="form-control" id="contact_number" value="<?= $employer->contact_number ?>" placeholder="Enter Contact number" required>
                                </div>
                                <div class="col">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control" id="email" value="<?= $employer->email ?>" placeholder="Enter Email address" required>
                                </div>
                            </div>
                            <div class="pb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" value="<?= $employer->address ?>" placeholder="Enter Address" required>
                            </div>
                            <div class="row pb-3">
                                <div class="col-md-6">
                                    <label for="barangay">Barangay</label>
                                    <input type="text" class="form-control" id="barangay" value="<?= $employer->barangay ?>" placeholder="Enter Barangay" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" value="<?= $employer->city ?>" placeholder="Enter City" required>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col">
                                    <label for="tradename">Trade Name</label>
                                    <input type="text" class="form-control" id="tradename" value="<?= $employer->tradename ?>" placeholder="Enter Trade Name" required>
                                </div>
                                <div class="col">
                                    <label for="business_type">Business Type</label>
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
                            </div>
                            <div class="row pb-3">
                                <div class="col">
                                    <label for="sss">SSS</label>
                                    <input type="number" class="form-control" id="sss" value="<?= $employer->sss ?>" placeholder="Enter SSS number" required>
                                </div>
                                <div class="col">
                                    <label for="tin">Tin</label>
                                    <input type="number" class="form-control" id="tin" value="<?= $employer->tin ?>" placeholder="Enter Tin number" required>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-outline-success" type="submit" id="update_profile" style="background-color: #17a2b8; color: white;">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
