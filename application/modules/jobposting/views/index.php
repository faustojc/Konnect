<?php
main_header(['jobposting']);
?>
<!-- ############ PAGE START-->
<style>
    .btn-info {
    }

    .card {
        border-radius: 15px;
    }

    .card-header {
        border-radius: 15px 15px 0 0;
    }

    .card-footer {
        border-radius: 0 0 15px 15px;
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
        <div class="card card-dark ">
            <!-- <div class="card-header">
                <h3 class="card-title">List of Jobs</h3>
            </div> -->
            <div class="form-inline pt-4 pl-5 d-flex justify-content-center">
                <div class="input-group" data-widget="sidebar-search" style="width:50%; height:50px;">
                    <input class=" form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="height:100%;">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class=" pt-4">
                <div class="nav nav-tabs  d-flex justify-content-center" id="nav-tab" role="tablist" style="font-size:25px; font-weight:500;">
                    <a class="nav-item nav-link active" id="nav-job-feed" data-toggle="tab" href="#job-feed" role="tab" aria-controls="job-feed" aria-selected="true">Job Feed</a>
                    <a class="nav-item nav-link" id="nav-job-posted" data-toggle="tab" href="#job-posted" role="tab" aria-controls="job-posted" aria-selected="false">Your Job Listing</a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="job-feed" role="tabpanel" aria-labelledby="nav-job-feed">
                    <div class="card-body pt-5">
                        <div class="row" id="job_list">
                            <?= $job_section_view ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="job-posted" role="tabpanel" aria-labelledby="nav-job-posted">
                    <div class="row" id="job_list">
                        <div class="card-body pt-5">
                            <div class="row" id="own_job">

                            </div>
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
<script src="<?php echo base_url() ?>assets/js/jobposting/index.js"></script>