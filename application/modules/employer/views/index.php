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
        <table class="table table-hover d-block d-md-table overflow-auto w-100">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employer Name</th>
                    <th scope="col">Trade Name</th>
                    <th scope="col">Business Type</th>
                    <th scope="col">SSS</th>
                    <th scope="col">TIN</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="employer_list"></tbody>
        </table>
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employer/index.js"></script>