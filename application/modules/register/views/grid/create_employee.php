<form id="needs-validation">
    <div class="row pb-3">
        <div class="col-md-4">
            <label>First Name</label>
            <input type="text" class="form-control" name="Fname" id="Fname" style=" font-size:14px">
        </div>

        <div class="col-md-4">
            <label>Middle Name</label>
            <input type="text" class="form-control" name="Mname" id="Mname" style=" font-size:14px">
        </div>

        <div class="col-md-4">
            <label>Last Name</label>
            <input type="text" class="form-control" name="Lname" id="Lname" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label>Contact Number</label>
            <input type="number" class="form-control" name="Cnum" id="Cnum">
        </div>

        <div class="col-md-6">
            <label>Birth Date</label>
            <input type="date" class="form-control" name="Bday" id="Bday">
        </div>
    </div>


    <div class="row pb-3">
        <div class="col-md-6">
            <label>Address</label>
            <input type="text" class="form-control" name="Address" id="Address" style=" font-size:14px">
        </div>

        <div class="col-md-6">
            <label>Barangay</label>
            <input type="text" class="form-control" name="Barangay" id="Barangay" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label>City</label>
            <input type="text" class="form-control" name="City" id="City" style=" font-size:14px">
        </div>

        <div class="col-md-6">
            <label>Religion</label>
            <input type="text" class="form-control" name="Religion" id="Religion" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label>Gender</label>
            <select class="form-control" name="Gender" id="Gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
            </select>
        </div>

        <div class="col-md-6">
            <label>Civil Status</label>
            <select name="cstat" class="form-control" id="Cstat">
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="widowed">Widowed</option>
                <option value="divorced">Divorced</option>
                <option value="separated">Separated</option>
            </select>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-info btn-block" id="register">Register</button>
        </div>
    </div>
</form>