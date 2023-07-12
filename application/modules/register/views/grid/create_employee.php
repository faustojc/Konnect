<form>
    <div class="row pb-3">
        <div class="col-md-4">
            <label>First Name</label>
            <input type="text" class="form-control" id="Fname" style=" font-size:14px">
        </div>

        <div class="col-md-4">
            <label>Middle Name</label>
            <input type="text" class="form-control" id="Mname" style=" font-size:14px">
        </div>

        <div class="col-md-4">
            <label>Last Name</label>
            <input type="text" class="form-control" id="Lname" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label>Contact Number</label>
            <input type="number" class="form-control" id="Cnum">
        </div>

        <div class="col-md-6">
            <label>Birth Date</label>
            <input type="date" class="form-control" id="Bday" name="bday">
        </div>
    </div>


    <div class="row pb-3">
        <div class="col-md-6">
            <label>Address</label>
            <input type="text" class="form-control" id="Address" style=" font-size:14px">
        </div>

        <div class="col-md-6">
            <label>Barangay</label>
            <input type="text" class="form-control" id="Barangay" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label>City</label>
            <input type="text" class="form-control" id="City" style=" font-size:14px">
        </div>

        <div class="col-md-6">
            <label>Religion</label>
            <input type="text" class="form-control" id="Religion" style=" font-size:14px">
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <label>Gender</label>
            <select name="gender" class="form-control" id="Gender">
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