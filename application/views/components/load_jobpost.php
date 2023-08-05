<?php if (!empty($jobpost)) {
    $timeAgo = formatTime($jobpost->date_posted);
    ?>
    <div class="card">
        <div class="card-body ">
            <div class="job-post">
                <div class="row">
                    <div class="col-1 d-flex justify-content-center">
                        <img class="img-circle img-fluid " src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $jobpost->EmployerLogo ?>" alt="Employer Profile Pic" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                    </div>
                    <div class="col-10 pt-2 pl-3">
                        <div class="d-flex justify-content-between">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="m-0">
                                        <a href="<?= base_url() ?>employer_profile?id=<?= $jobpost->employer_id ?>" class="job-title fw-bold text-decoration-none" style="color:#000;">
                                            <?= ucwords($jobpost->EmployerTradename) ?>
                                            <?php verifyBadge($jobpost->user_verified); ?>
                                        </a>
                                    </h6>
                                </div>
                                <div class="col-12">
                                    <p class="text-muted" style="font-size: 12px;">
                                        <?= $timeAgo ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="btn-group dropleft" style="">
                            <button type="button" class="btn card-tool text-muted " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <div class="dropdown-menu" style="border-radius:10px; box-shadow: none;">
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal<?= $jobpost->id ?>">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php jobpost_update_modal($jobpost, 'modal' . $jobpost->id); ?>

                <div class="job-details pt-2" style="border:0; color:white;">
                    <h6 class="pb-2" style="font-weight:650; ">
                        <?= ucwords($jobpost->title) ?>
                        <span class="badge job-status">
                            <?= $jobpost->filled ?>
                        </span>
                    </h6>
                    <!-- <hr> -->
                    <div style="max-height: 150px; overflow-y: hidden; font-weight:300;">
                        <h5>
                            <?php if (isset($jobpost->salary) && $jobpost->salary !== ''): ?>
                                <span class="badge badge-light">
                                        ₱
                                        <?= $jobpost->salary ?>
                                    </span>
                            <?php endif; ?>

                            <?php if (isset($jobpost->shift) && $jobpost->shift !== ''): ?>
                                <span class="badge badge-light">
                                        <?= $jobpost->shift ?>
                                    </span>
                            <?php endif; ?>

                            <?php if (isset($jobpost->job_type) && $jobpost->job_type !== ''): ?>
                                <span class="badge badge-light">
                                        <?= $jobpost->job_type ?>
                                    </span>
                            <?php endif; ?>
                        </h5>
                        <div class="job-description<?= $jobpost->id ?>" style="font-size:14px">
                            <?= $jobpost->description ?>
                        </div>

                    </div>
                    <a class="text-center see-more" data-target=".job-description" style="display: block;" role="button">See
                        more</a>

                    <?php if ($auth['user_type'] == 'EMPLOYEE') {
                        $hasApplied = FALSE;

                        foreach ($applicant as $applied) {
                            if ($applied->job_id == $jobpost->id) {
                                apply_button($applied->job_id, $applied->status);
                                $hasApplied = TRUE;
                                break;
                            }
                        }

                        if (!$hasApplied) {
                            apply_button($jobpost->id, 'APPLY');
                        }
                    } ?>

                </div>
            </div>
        </div>
    </div>
<?php } ?>
