<div class="card ">
    <div class="card-header">
        <h3 class="card-title fw-500" style="font-weight:600;">View Resume</h3>
        <?php if ($has_permission && empty($resume)): ?>
            <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-tool">
                    <i class="fa-solid fa-plus" style=" font-size: 16.5px;"></i>
                </button>
            </div>
        <?php endif; ?>
    </div>


    <div id="main-content" class="file_manager">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 px-3 py-3">
                    <?php if (!empty($resume)): ?>
                        <div class="card_resume">
                            <div class="file">
                                <a target="_blank" href="<?= base_url() ?>assets/documents/resume/<?= $resume->employee_id ?>/<?= $resume->file_name ?>">
                                    <div class="icon">
                                        <i class="fa fa-file text-info"></i>
                                    </div>
                                    <div class="file-name">
                                        <p class="m-b-5 text-muted"><?= $resume->file_name ?></p>
                                        <small><?= $resume->file_size ?> KB
                                            <span class="date text-muted"><?= date('d M, Y', strtotime($resume->date_uploaded)) ?></span>
                                        </small>
                                    </div>
                                </a>
                                <?php if ($has_permission): ?>
                                    <button type="button" class="btn btn-icon btn-outline-danger mt-3" data-toggle="modal" data-target="#deleteFileModal">
                                        <i class="fa fa-trash mr-2"></i> Delete Resume/CV
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php elseif ($has_permission): ?>
                        <div class="file-drop-area d-flex justify-content-center align-items-center py-5 mx-auto bg-gray-light">
                            <p class="m-0">
                                You haven't uploaded your resume yet. <br> Click the plus button to upload your resume.
                            </p>
                        </div>
                    <?php else: ?>
                        <div class="file-drop-area d-flex justify-content-center align-items-center py-5 mx-auto bg-gray-light">
                            <p class="m-0">No resume uploaded</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($has_permission): ?>
        <!-- The Upload Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Resume</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="file-drop-area d-flex justify-content-center align-items-center py-5 mx-auto bg-gray-light">
                                <span class="choose-file-button" style="background-color:#0dcaf0; color: #fff;">Choose files</span>
                                <span class="file-message">or drag and drop files here</span>
                                <input class="file-input" type="file" id="resume" name="resume" accept="application/msword, application/pdf, .doc, .docx, .docs" size="5000">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-info" name="submit" data-dismiss="modal" id="upload_resume">
                            Upload Resume
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Delete Modal -->
        <div class="modal fade" id="deleteFileModal" tabindex="-1" role="dialog" aria-labelledby="deleteFileModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteFileModalLabel">Delete Resume/CV</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure to delete this resume/cv?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-icon btn-danger" id="delete_resume" data-id="<?= $resume->id ?>" data-dismiss="modal">
                            Delete Resume/CV
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
