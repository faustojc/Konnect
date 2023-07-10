<?php
main_header(['employer']);
?>
<!-- ############ PAGE START-->

<div class="content">
    <div class="container">
        <div class="py-md-3 d-flex justify-content-center">
            <div class="card card-dark">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="card-title font-weight-bold">Profile</h2>
                        <div class="card-tools">
                            <a href="<?= base_url() ?>employer" class="btn btn-outline-info" type="button">
                                <i class="fa fa-arrow-left"></i>
                                Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="needs-validation">
                        <div class="row pb-3">
                        <input type="text" class="form-control" id="ID" value="<?=@$details->id?>" hidden>
                            <div class="col-md-12">
                                <label for="employer_name">Employer Name</label>
                                <input type="text" class="form-control" id="employer_name" value="<?=@$details->employer_name?>" placeholder="Enter Employer Name" required>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col">
                                <label for="contact_number">Contact Number</label>
                                <input type="number" class="form-control" id="contact_number" value="<?=@$details->contact_number?>" placeholder="Enter Contact number" required>
                            </div>
                            <div class="col">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" id="email" value="<?=@$details->email?>" placeholder="Enter Email address" required>
                            </div>
                        </div>
                        <div class="pb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" value="<?=@$details->address?>" placeholder="Enter Address" required>
                        </div>
                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label for="barangay">Barangay</label>
                                <input type="text" class="form-control" id="barangay" value="<?=@$details->barangay?>" placeholder="Enter Barangay" required>
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" value="<?=@$details->city?>" placeholder="Enter City" required>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="col">
                                <label for="tradename">Trade Name</label>
                                <input type="text" class="form-control" id="tradename" value="<?=@$details->tradename?>" placeholder="Enter Trade Name" required>
                            </div>
                            <div class="col">
                                <label for="business_type">Business Type</label>
                                <select class="custom-select" name="business_type" id="business_type" value="<?=@$details->business_type?>">
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
                                <input type="number" class="form-control" id="sss" value="<?=@$details->sss?>" placeholder="Enter SSS number" required>
                            </div>
                            <div class="col">
                                <label for="tin">Tin</label>
                                <input type="number" class="form-control" id="tin" value="<?=@$details->tin?>" placeholder="Enter Tin number" required>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-outline-success" type="submit" id="update_employer">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employer/index.js"></script>
