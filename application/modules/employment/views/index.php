<?php
main_header(['employment']);
?>
<!-- ############ PAGE START-->


<section class="content">

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <h3 class="m-0 my-3">Employment</h3>
            </div>
            <div class="col-md-9">
                <div class="row align-items-center">
                    <div class="col">
                        <input class="form-control" type="text" id="search_employer" placeholder="Search Employee's Info"/>
</div>
                </div>
            </div>
        </div>
        <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">List of Employees</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
        <div class="table-responsive">   
        <table class="table table table-bordered">
            <thead class="thead-dark"></thead>
            <tr>
                <th style="width: 2%">#</th>
                <th style="width: 10%">Employee Name</th>
                <th style="width: 10%">Employer Name</th>
                <th style="width: 5%">Position</th>
                <th style="width: 5%">Start Date</th>
                <th style="width: 5%">End Date</th>
				<th style="width: 5%">Status</th>
				<th style="width: 5%">Rating</th>
				<th style="width: 5%">Job Description</th>
				<th style="width: 5%">Date Created</th>
				<th style="width: 5%">Show Status</th>
				<th style="width: 5%">Options</th>       
            </tr>
            <tbody id="load_employment"></tbody>
        </table>
        </div>
        </div>
        <div class="col-md-">
                        <a href="<?= base_url() ?>Employment/profile" class="btn btn-outline-dark my-3 float-md-right" type="button">CREATE EMPLOYMENT</a>
                    </div>
        <!-- Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Create Employment</button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                        <input type="date" id="start_date" name="start_date" style="width:220px;">
                    </div>
                    <div class="col-md-4">
                        <label>End Date</label>
                        <input type="date" id="end_date" name="end_date" style="width:220px;">
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
                    <textarea id="job_description" name="job_description" rows="4" cols="96"></textarea>
                </div>
            </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark" id="btn_submit_employment">Add Employment</button>
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
<script src="<?php echo base_url() ?>/assets/js/employment/index.js"></script>