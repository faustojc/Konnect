<?php
main_header(['jobposting']);
?>
<!-- ############ PAGE START-->
<div class="container">
    <div class="row justify-content-center align-items-center mt-5 py-4">
        <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header" style="background-color: #17a2b8; color: white;">
                    <h3 class="card-title">CREATE JOB POSTING</h3>
                </div>
                <div class="card-body">
                    <form id="needs-validation">
                        <div class="row pb-3">
                            <div class="col-md-12 mb-2">
                                <label for="job_title">Title</label>
                                <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Enter Title">
                            </div>
                            <div class="col-md-12">
                                <label for="job_description">Description</label>
                                <textarea class="w-100" name="job_description" id="job_description" rows="5"></textarea>
                                <p class="text-danger float-left editor-warning" hidden>
                                    <i class="text-danger fa fa-exclamation-circle"></i>
                                    Character exceeds 2000
                                </p>
                                <p class="text-muted float-right" id="editor-character-count"></p>
                            </div>
                            <div class="col-md-6">
                                <label for="job_filled">Status</label>
                                <select class="form-control" id="job_filled">
                                    <option value="OPEN">OPEN</option>
                                    <option value="CLOSE">CLOSE</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark" id="save_job" style="background-color: #17a2b8; color: white;">Create</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/jobposting/index.js"></script>
