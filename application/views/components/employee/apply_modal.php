<!-- Review Application Modal -->
<div class="modal fade" id="apply" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Review Your Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input name="job_id" value="" hidden readonly />

                    <div class="row">
                        <div class="col-md-12">
                            <h6>Contact Info</h6>
                            <div class="row pt-3">
                                <div class="col" style="flex-grow: 0!important;">
                                    <div class="widget-user-header">
                                        <div class="widget-user-image">
                                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $employee->Employee_image ?>" alt="profile pic" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10 pl-2">
                                    <h6 class="p-0" style="font-size: 13px; font-weight: 500;">
                                        <?= ucwords($employee->Fname . ' ' . $employee->Lname) ?>
                                    </h6>
                                    <h6 class="p-0" style="font-size: 13px; font-weight: 400;">
                                        <?= ucwords($employee->Title) ?>
                                    </h6>
                                    <h6 class="p-0" style="font-size: 13px; font-weight: 400;">
                                        <?= $employee->Address ?>
                                    </h6>
                                </div>
                            </div>

                            <h6 class="pt-3">Email Address</h6>
                            <h6 class="review_h p-2" style="font-size: 13px; font-weight: 400;">
                                <?= $employee->Email ?>
                            </h6>

                            <h6 class="pt-3">City</h6>
                            <h6 class="review_h p-2" style="font-size: 13px; font-weight: 400;">
                                <?= $employee->City ?>
                            </h6>

                            <h6 class="pt-3">Resume</h6>
                            <h6 style="font-size: 13px; font-weight: 400;">Be sure to include an updated resume</h6>

                            <div class="resume-info">
                                <?php if (!empty($resume)):
                                    resumeDisplay($resume);
                                endif; ?>
                            </div>

                            <div class="pt-3">
                                <label type="button" class="position-relative btn btn-outline-info btn-sm rounded rounded-pill" style="cursor: pointer">
                                    Upload resume
                                    <input type="file" class="btn btn-outline-info btn-sm upload-resume" accept="application/msword, application/pdf, .doc, .docx, .docs" size="3000">
                                </label> <small> ONLY DOC, DOCX, DOCS, and PDF (3 MB) </small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-block apply-button">APPLY NOW</button>
            </div>
        </div>
    </div>
</div>