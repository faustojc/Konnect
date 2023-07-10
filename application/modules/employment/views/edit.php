<?php
main_header(['employment']);

?>
<!-- ############ PAGE START-->
<section class="px-5 py-5 d-flex justify-content-center">
    <div class="card card-dark" >
        <div class="card-header">
            <h3 class="card-title">UPDATE EMPLOYMENT</h3>
        </div>
        <form id="needs-validation">
            <div class="row p-4">
                <div class="col-md-6">
                    <input type="text" id="ID" value="<?=@$details->ID?>" hidden>
                    <input type="text" id="employee_id" value="<?=@$details->employee_id?>" hidden>
                    <input type="text" id="employer_id" value="<?=@$details->employer_id?>" hidden>

                    <label for="employee_name">Employee Name</label>
                    <input type="text" class="form-control" id="employee_name" value="<?= ucwords($details->Fname) . ' ' . ucwords($details->Mname) . ' ' . ucwords($details->Lname) ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="employer_name">Employer Name</label>
                    <input type="text" class="form-control" id="employer_name" value="<?= ucwords(@$details->employer_name) ?>" disabled>
                </div>
            </div>

            <div class="row p-4">
            <div class="col-md-4">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" value="<?=@$details->position?>" placeholder="Enter Position">
                </div>
                    <div class="col-md-4">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" value="<?=date('Y-m-d', strtotime(@$details->start_date))?>" style="width:250px;">
                    </div>

                    <div class="col-md-4">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="<?=date('Y-m-d', strtotime(@$details->end_date))?>" style="width:250px;">
                    </div>
            </div>

                <div class="row p-4">
                    <div class="col-md-4">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" value="<?=@$details->status?>" placeholder="Enter Status">
                    </div>
                    <div class="col-md-4">
                        <label for="rating">Rating</label>
                        <input type="number" class="form-control" id="rating" value="<?=@$details->rating?>" placeholder="Enter Rating">
                    </div>
                    <div class="col-md-4">
                        <label for="show_status">Show Status</label>
                        <input type="text" class="form-control" id="show_status" value="<?=@$details->show_status?>" placeholder="Show Status">
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-4">
                        <label for="job_description">Job Description</label>
                        <textarea class="form" id="job_description" name="job_description" rows="4" cols="100"><?=@$details->job_description?></textarea>
                    </div>
            </div>
        </form>
        <button type="submit" class="btn btn-dark" id="edit_employment">Save edit</button>
    </div>


</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employment/index.js"></script>