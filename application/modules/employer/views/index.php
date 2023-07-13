<?php
main_header(['employer']);
?>
<!-- ############ PAGE START-->

<section class="content">

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <h3 class="m-0 my-3">List of Employers</h3>
            </div>
            <div class="col-md-9">
                <div class="row align-items-center">
                    <div class="col">
                        <input class="form-control" type="text" id="search_employer" placeholder="Search Employer's Info"/>
                    </div>
                    <div class="col-md-3">
                        <a href="<?= base_url() ?>employer/registration" class="btn btn-outline-dark my-3 float-md-right" type="button">Add Employer</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">List of Employers</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
        <div class="table-responsive">   
        <table class="table table table-bordered">
            <thead class="thead-dark"></thead>
            <tr>
                <th>#</th>
                <th>Employer Name</th>
                <th>Trade Name</th>
                <th>Business Type</th>
                <th>SSS</th>
				<th>TIN</th>
				<th>Actions</th>     
            </tr>
            <tbody id="employer_list"></tbody>
        </table>
        </div>
        </div>
        
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employer/index.js"></script>