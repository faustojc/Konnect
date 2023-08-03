<style>
    a {
        color: black;
    }

    a:hover {
        color: #435861;
    }
</style>

<?php if (!empty($employments)):
    $dates = [];
    ?>
    <div class="timeline">
        <?php foreach ($employments as $key => $employment):
            $start_date = date('M Y', strtotime($employment->date_started));

            if (!in_array($start_date, $dates)): ?>
                <div class="time-label">
                    <span class="bg-gradient-info">
                        <?= $start_date ?>
                    </span>
                </div>
                <?php $dates[] = $start_date;
            endif; ?>

            <div>
                <i class="fas fa-briefcase bg-info"></i>
                <div class="timeline-item">
                    <span class="time">
                        <i class="fas fa-clock mr-1"></i>
                        <?= date('D, d M', strtotime($employment->date_started)) ?>
                    </span>
                    <h5 class="timeline-header">
                        Started working in
                        <?= $employment->tradename ?> as
                        <?= $employment->job_title ?>
                    </h5>
                    <?php if (!empty($employment->job_description)): ?>
                        <div class="timeline-body" style="max-height: 200px">
                            <?= $employment->job_description ?>
                        </div>
                    <?php endif; ?>
                    <!-- Placement of additional controls. Optional
                    <div class="timeline-footer">
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#emp<?= $key ?>">
                            Read more
                        </button>
                        <button class="btn btn-danger btn-sm" type="button">Delete</button>
                    </div> -->
                </div>
            </div>

            <!-- Modal
            <div class="modal fade" id="emp<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="modalEmp<?= $key ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal<?= $key ?>">Update Employment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="px-2 py-2" id="needs-validation">
                                <input type="text" class="form-control" id="od" name="id" value="<?= $employment->id ?>" hidden readonly>
                                <div class="row pb-3">
                                    <div class="col-md">
                                        <label for="employer_name">Employer Name</label>
                                        <input type="text" class="form-control" id="employer_name" value="<?= ucwords($employment->employer_name) ?>" disabled>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-md">
                                        <label for="positionEmp">Position</label>
                                        <input type="text" class="form-control" id="position" name="position" value="<?= $employment->job_title ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <label for="statusEmp">Status</label>
                                        <input type="text" class="form-control" id="status" name="status" value="<?= $employment->status ?>">
                                    </div>
                                </div>

                                <div class="row px-3">
                                    <div class="d-flex align-items-center">
                                        <p class="text-muted" style="font-weight: normal; font-size: 15px;">
                                            <input type="checkbox" name="inputCheck" id="show_status" value="<?= $employment->show_status ?>" <?php if ($employment->show_status == 1): ?> checked <?php endif; ?> />
                                            Show Status
                                        </p>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-md">
                                        <label for="ratingEmp">Rating</label>
                                        <input type="number" class="form-control" id="rating" name="rating" value="<?= $employment->rating ?>" min="0" max="5">
                                    </div>
                                </div>

                                <div class="row pb-2">
                                    <div class="col-md-6">
                                        <label for="startDate">Start Date</label>
                                        <input type="date" id="startDate" name="start_date" value="<?= date('Y-m-d', strtotime($employment->start_date)) ?>" style="width:200px;">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="endDate">End Date</label>
                                        <input type="date" id="endDate" name="end_date" value="<?= date('Y-m-d', strtotime($employment->end_date)) ?>" style="width:200px;">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info" id="edit_employment" data-dismiss="modal">Save
                                changes
                            </button>
                        </div>
                    </div>
                </div>
            </div> -->
        <?php endforeach; ?>
        <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>
    </div>
<?php else: ?>
    <?php if ($has_permission): ?>
        <div class="d-flex flex-column flex-grow-1 px-2 py-2">
            <div class="d-flex align-items-center mb-1">
                <h5 class=" ml-1"><i class="fa-solid fa-pen-to-square "></i> Add Employment</h5>
            </div>
            <div class="d-flex flex-column flex-grow-1">
                <p class="fs-14">
                    Share your professional experience to establish credibility for potential employers.
                </p>
                <button type="button" class="btn btn-light rounded-pill edit-summary" style="border-width: 2px" data-toggle="modal" data-target="#modalAddEmp">
                    Add Employment
                </button>
            </div>
        </div>
    <?php else: ?>
        <div>
            This user has no employment history.
        </div>
    <?php endif; ?>
<?php endif; ?>