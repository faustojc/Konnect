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
                                <div class="row pt-2">
                                    <div class="col-5">
                                        <label for="" style="">Salary</label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0" style="border-radius:10px 0 0 10px;">₱</span>
                                            </div>
                                            <input id="salary" name="salary" type="text" onclick="disableDotZero()" onblur="formatInput()" oninput="formatInput2()" class="form-control border-0" style="background-color: #F4F6F7; border-radius:0 10px 10px 0; " placeholder="Input Salary ">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="job_type">Job Type</label>
                                            <select id="job_type" name="job_type" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                                <option>Part-time</option>
                                                <option>Full-time</option>
                                                <option>Permanent</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="shift">Shift</label>
                                            <select id="shift" name="shift" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                                <option>Day</option>
                                                <option>Night</option>
                                                <option>Flextime</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-3">
                                        <label for="start_date">Start Date</label>
                                        <input id="start_date" name="start_date" type="date" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="form-group" style="border:0;">
                                    <label for="">Requirements</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Add Requirements" style="width: 100%; border:0;">
                                        <option>HTML</option>
                                        <option>SQL</option>
                                        <option>PHP</option>
                                        <option>Laravel</option>
                                        <option>React</option>
                                        <option>Java</option>
                                        <option>Javascript</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="job_filled" name="job_filled" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                        <option>Open</option>
                                        <option>Closed</option>

                                    </select>
                                </div>
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

                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info" id="save_job" style="background-color: #17a2b8; color: white;">Create</button>
                    <button class="btn btn-secondary" id="cancel">Cancel</button>
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