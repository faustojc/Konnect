<?php
main_header(['employee_educ']);
?>
<!-- ############ PAGE START-->

<section class="content">

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <h3 class="m-0 my-3">List of Employees</h3>
            </div>
            <div class="col-md-9">
                <div class="row align-items-center">
                    <div class="col">
                        <input class="form-control" type="text" id="search_employer" placeholder="Search Employee's Info"/>
                    </div>
                    
                </div>
            </div>

			<div>
			
			</div>

        </div>

	</div>

	<div class="card card-info" >
              <div class="card-header">
                <h3 class="card-title">Expandable Table</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th style="width: 2%;">#</th>
                      <th style="width: 8%;">Name</th>
                      <th style="width: 5%;">Level</th>
                      <th style="width: 5%;">Institution</th>
                      <th style="width: 5%;">Title</th>
                      <th style="width: 5%;">Start Date</th>
                      <th style="width: 5%;">End Date</th>
                      <th style="width: 5%;">Hours</th>
                      <th style="width: 5%;">Option</th>
                    </tr>
                  </thead>
                  <tbody id="load_educations"></tbody>
				  
                </table>
              </div>
              <!-- /.card-body -->
    </div>
            
</section>
<div class="d-flex justify-content-center">
                        <a href="<?= base_url() ?>employee_educ/add_employee_educ" class="btn btn-outline-dark my-3 float-md-right" type="button" id>Add Education</a>
                        <a id="modalButton" class="btn btn-outline-dark my-3 float-md-right" type="button" data-toggle="modal" data-target=".education-modal-xl">Modal</a>
                                
</div>

<!-- Modal -->
<div class="modal fade education-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Education</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
<!-- ############ MODAL START-->
        <!-- <iframe src="<?= base_url() ?>employee_educ/add_employee_educ" frameborder="0" style="width: 100%; height: 500px;"> </iframe> -->
              
              

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-primary" id="btn_submit">Save changes</a> -->
      </div>
    </div>
  </div>
</div>



<!-- /Modal -->

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employee_educ/index.js"></script>