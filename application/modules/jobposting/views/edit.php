<?php
main_header(['jobposting']);
?>
<!-- ############ PAGE START-->
<section class="px-5 py-5 d-flex justify-content-center">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">CREATE JOB POSTING</h3>
        </div>
        
        <div class="px-5 py-5">
            <div class="col-md-6">
                <label>Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Title">
            </div>

            <div class="row pb-3">
                <div class="col-md-4">
                    <label>Description</label>
                    <textarea id="job_description" value="<?=@$details->job_description?>" name="job_description" rows="4" cols="56"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-dark" id="btn_submit">Create</button>
        </form>
    </div>
</section>
<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/jobposting/index.js"></script>
