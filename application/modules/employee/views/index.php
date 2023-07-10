<?php
main_header(['employee']);
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
                        <input class="form-control" type="text" id="search_employee" placeholder="Search Employee's Info"/>
                    </div>
                    <div class="col-md-3">
                        <a href="<?= base_url() ?>Employee/register" class="btn btn-outline-dark my-3 float-md-right" type="button">Add Employee</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">List of Employees</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
        <div class="table-responsive">   
        <table class="table table table-bordered">
            <thead class="thead-dark"></thead>
            <tr>
                <th>#</th>
                <th>NAME</th>
                <th>B-DATE</th>
                <th>GENDER</th>
                <th>NUMBER</th>
				<th>EMAIL</th>
				<th>DATE CREATED</th>
				<th>OPTIONS</th>       
            </tr>
            <tbody id="load_employee"></tbody>
        </table>
        </div>
        </div>
              <!-- /.card-body -->
        </div>
		
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employee/index.js"></script>