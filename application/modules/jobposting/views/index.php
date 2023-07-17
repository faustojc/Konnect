<?php
main_header(['jobposting']);
?>
<!-- ############ PAGE START-->
<style>
    .btn-info{
        
    }
</style>

<section class="content">

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <h3 class="m-0 my-3">Job Posting</h3>
            </div>
            <div class="col-md-9">
                <div class="row align-items-center">
                    <div class="col">
                        <input class="form-control" type="text" id="search_jobpost" placeholder="Search Job Post"/>
                    </div>
                    <div class="col-md-3">
                        <a href="<?= base_url() ?>jobposting/create_job" class="btn btn-outline-dark my-3 float-md-right" type="button">CREATE JOB POST</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-dark">
            <!-- <div class="card-header">
                <h3 class="card-title">List of Jobs</h3>
            </div> -->
            <div class="card-body">
                <div class="row" id="job_list"></div>
            </div>
        </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/jobposting/index.js"></script>