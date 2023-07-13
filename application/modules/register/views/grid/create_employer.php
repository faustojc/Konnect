<form id="needs-validation">
    <div class="row pb-3">
        <div class="col-md-12">
            <label for="tradename">Trade Name</label>
            <input type="text" class="form-control" name="tradename" id="tradename" style=" font-size:14px">
        </div>

        <div class="col-md-6">
            <label for="employer_name">Employer Name</label>
            <input type="text" class="form-control" name="employer_name" id="employer_name" style=" font-size:14px">
        </div>

        <div class="col-md-6">
            <label for="business_type">Business Type</label>
            <select class="custom-select" name="business_type" id="business_type">
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
        <div class="col-md-6">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" style=" font-size:14px">
        </div>

        <div class="col-md-6">
            <label for="barangay">Barangay</label>
            <input type="text" class="form-control" name="barangay" id="barangay" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label for="contact_number">Contact Number</label>
            <input type="number" class="form-control" name="contact_number" id="contact_number">
        </div>
        <div class="col-md-6">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-12 d-flex justify-content-center">
            <a href="#" type="submit" class="btn btn-info btn-block" id="register">Register</a>
        </div>
    </div>
</form>