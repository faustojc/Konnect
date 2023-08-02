<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row pb-3">
    <div class="col-md-4">
        <label>First Name</label>
        <input type="text" class="form-control border-0" name="Fname" id="Fname" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;" required>
    </div>

    <div class="col-md-4">
        <label>Middle Name</label>
        <input type="text" class="form-control border-0" name="Mname" id="Mname" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;">
    </div>

    <div class="col-md-4">
        <label>Last Name</label>
        <input type="text" class="form-control border-0" name="Lname" id="Lname" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;" required>
    </div>
</div>

<div class="row pb-3">
    <div class="col-md-6">
        <label>Contact Number</label>
        <input type="number" class="form-control border-0 " name="Cnum" id="Cnum" style="border-radius:15px; background-color: #F4F6F7;" required>
    </div>

    <div class="col-md-6">
        <label>Birth Date</label>
        <input type="date" class="form-control border-0" name="Bday" id="Bday" style="border-radius:15px; background-color: #F4F6F7;" required>
    </div>
</div>


<div class="row pb-3">
    <div class="col-md-12">
        <label>Address</label>
        <input type="text" class="form-control border-0" name="Address" id="Address" style=" font-size:14px;border-radius:15px; background-color: #F4F6F7;" required>
    </div>
</div>

<div class="row pb-3">
    <div class="col-md-6">
        <label>Region</label><br>
        <select id="region" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        <input type="hidden" name="region_text" id="region-text">
    </div>
    <div class="col-md-6">
        <label>Province</label><br>
        <select id="province" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        <input type="hidden" name="province_text" id="province-text">
    </div>
</div>

<div class="row pb-3">
    <div class="col-md-6">
        <label>City</label><br>
        <select id="city" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        <input type="hidden" name="city_text" id="city-text">

    </div>

    <div class="col-md-6">
        <label>Barangay</label><br>
        <select id="barangay" class="form-control border-0" style="border-radius:15px; background-color: #F4F6F7;" required></select>
        <input type="hidden" name="barangay_text" id="barangay-text">
    </div>
</div>



<div class="row pb-3">
    <div class="col-md-4">
        <label>Gender</label>
        <select class="form-control border-0" name="Gender" id="Gender" style="border-radius:15px; background-color: #F4F6F7;" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
        </select>
    </div>

    <div class="col-md-4">
        <label>Civil Status</label>
        <select class="form-control border-0" name="Cstat" id="Cstat" style="border-radius:15px; background-color: #F4F6F7;" required>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="widowed">Widowed</option>
            <option value="divorced">Divorced</option>
            <option value="separated">Separated</option>
        </select>
    </div>

    <div class="col-md-4">
        <label>Religion</label>
        <input type="text" class="form-control border-0" name="Religion" id="Religion" style=" font-size:14px;border-radius:15px; background-color: #F4F6F7;" required>
    </div>
</div>


<div class="row pb-3">
    <div class="col-md-12 d-flex justify-content-center">
        <button type="submit" class="btn btn-info btn-block" id="register" style="border-radius:15px;">Register</button>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/register/index.js" type="text/javascript"></script>