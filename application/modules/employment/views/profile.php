<?php
main_header(['employment']);

$employees = $details['employees'];
$employers = $details['employers'];
?>
<!-- ############ PAGE START-->

<section class="px-5 py-5 d-flex justify-content-center">
 
<div class="card card-dark" >
    <div class="card-header">
        <h3 class="card-title">CREATE EMPLOYMENT</h3>
    </div>
    <form>
        <div class="row p-4">
            <div class="col-md-6">
                <label for="employee_id">Select employee</label>
                <select class="form-control" id="employee_id">
                    <?php foreach($employees as $employee) { ?>
                        <option value="<?php echo $employee->ID ?>"><?php echo $employee->Fname.' '.$employee->Mname.' '.$employee->Lname ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="employer_id">Select Employer</label>
                <select class="form-control" id="employer_id">
                    <?php foreach($employers as $employer) { ?>
                        <option value="<?php echo $employer->id ?>"><?php echo $employer->employer_name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-md-4">
                <label>Position</label>
                <input type="text" class="form-control" id="position" placeholder="Enter Position">
            </div>
            <div class="col-md-4">
                <label>Start Date</label>
                <input type="date" id="start_date" name="start_date" style="width:250px;">
            </div>
            <div class="col-md-4">
                <label>End Date</label>
                <input type="date" id="end_date" name="end_date" style="width:250px;">
            </div> 
        </div>
    
        <div class="row p-4">
            <div class="col-md-4">
                <label>Status</label>
                <input type="text" class="form-control" id="status" placeholder="Enter Status">
            </div>

            <div class="col-md-4">
                <label>Rating</label>
                <input type="number" class="form-control" id="rating" placeholder="Enter Rating">
            </div>
            <div class="col-md-4">
                <label>Show Status</label>
                <input type="text" class="form-control" id="show_status" placeholder="Enter Rating">
            </div>
        </div>

    <div class="row p-3">                    
        <div class="col-md-4">
            <label>Job Description</label>
            <textarea id="job_description" name="job_description" rows="4" cols="100"></textarea>
            
        </div>
    </div>
    </form>
    <button type="submit" class="btn btn-dark" id="btn_submit_employment">Submit</button>
</div>


</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employment/index.js"></script>