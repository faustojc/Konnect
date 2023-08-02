<form id="needs-validation">
    <div class="row pb-3">
        <div class="col-md-12">
            <label for="tradename">Trade Name</label>
            <input type="text" class="form-control border-0" name="tradename" id="tradename" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;" required>
        </div>

        <div class="col-md-6">
            <label for="employer_name">Employer Name</label>
            <input type="text" class="form-control border-0" name="employer_name" id="employer_name" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;" required>
        </div>

        <div class="col-md-6">
            <label for="business_type">Business Type</label>
            <select class="form-control custom-select border-0 shadow-none" name="business_type" id="business_type" style=" border-radius:15px; background-color: #F4F6F7;">
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
        <div class="col-md-12">
            <label for="address">Address</label>
            <input type="text" class="form-control border-0" name="address" id="address" style=" font-size:14px;border-radius:15px; background-color: #F4F6F7;" required>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label for="region">Region</label><br>
            <select name="region" id="region" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        </div>
        <div class="col-md-6">
            <label for="province">Province</label><br>
            <select name="province" id="province" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label for="city">City</label><br>
            <select name="city" id="city" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        </div>

        <div class="col-md-6">
            <label for="barangay">Barangay</label><br>
            <select name="barangay" id="barangay" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-12 d-flex justify-content-center">
            <a href="#" type="submit" class="btn btn-info btn-block" id="register" style="border-radius:15px;">Register</a>
        </div>
    </div>
</form>
