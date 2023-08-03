<div class="card ">
    <div class="card-header">
        <h3 class="card-title fw-500" style="font-weight:600;">View Resume</h3>
    </div>
    <div class="d-flex justify-content-center">
        <?php if ($has_permission): ?>
            <button type="button" class="btn btn-outline-info my-3" data-toggle="modal" data-target="#uploadModal" style="width: 250px;">
                Upload File
            </button>
        <?php endif; ?>
    </div>

    <!-- The Modal -->
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
                    <div class="file-drop-area d-flex flex-wrap justify-content-center align-items-center py-5 bg-gray-light">
                        <span class="btn btn-outline-info choose-file-button">Choose file</span>
                        <div class="file-message text-center">
                            <p class="m-0">or drag and drop file here <br> accepts only pdf and docs</p>
                        </div>
                        <input class="file-input" type="file" accept="application/msword, application/pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal" name="upload_file">
                        Upload Resume
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
