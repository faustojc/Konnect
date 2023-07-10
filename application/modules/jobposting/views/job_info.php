<?php
main_header(['jobposting']);
?>
<!-- ############ PAGE START-->
<section class="px-5 py-5 d-flex justify-content-center">
    <div class="card card-dark w-50">
        <div class="card-header">
            <h3 class="card-title">UPDATE JOB DETAILS</h3>
        </div>
        <div class="card-body">
            <form id="needs-validation">
                <div class="row pb-3">
                    <input id="id" value="<?= $details->id ?>" hidden>
                    <div class="col-md-12">
                        <label for="job_title">Title</label>
                        <input type="text" class="form-control" id="job_title" value="<?= ucwords($details->title) ?>" placeholder="Enter Title">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="job_description">Description</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" id="job_description" rows="5"><?= ucwords($details->description) ?></textarea>
                        </div>
                        <div class="col-md-5">
                            <label for="job_filled">Status</label>
                            <select class="form-control" id="job_filled" value="<?= $details->filled ?>">
                                <option value="OPEN">OPEN</option>
                                <option value="CLOSE">CLOSE</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-dark" id="update_job">Update Job</button>
        </div>
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/jobposting/index.js"></script>
<script>
$(document).ready(function() {
    $('#job_filled').val('<?= $details->filled ?>');
});

</script>
