<style>
    .badge-light {
        color: #313131;
        background-color: #D9D9D9;
        font-weight: 600;
        font-size: 13px;
        padding: 7px;
        border-radius: 7px;
    }
</style>

<?php if (!empty($jobpostings)) {
    foreach ($jobpostings as $jobpost) {
        $has_permission = FALSE;

        if ($auth['user_type'] == 'EMPLOYER') {
            $has_permission = get_userdata(USER)->id == $jobpost->employer_id;
        }

        if (strtoupper($jobpost->filled) == 'CLOSED') {
            continue;
        }

        if ($auth['user_type'] == 'EMPLOYEE' && !empty($applicant) && $applicant->job_id == $jobpost->id && strtoupper($applicant->status) != 'PENDING') {
            $hasApplied = TRUE;
            continue;
        }


        $timeAgo = formatTime($jobpost->date_posted);

        ?>
        <div class="card">
            <div class="card-body ">
                <div class="job-post">
                    <div class="row">
                        <div class="col-11 pt-0 pl-3">
                            <div class="d-flex justify-content-between">
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center pl-0">
                                        <div class="pr-2">
                                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $jobpost->EmployerLogo ?>" alt="Employer Profile Pic"
                                                 style="border: 0.2rem solid #F4F6F7; object-fit: cover; height: 3.5rem; width: 3.5rem;">
                                        </div>
                                        <div class="ms-3 pt-3">
                                            <h6 class="m-0">
                                                <a href="<?= base_url() ?>employer_profile?id=<?= $jobpost->employer_id ?>" class="job-title fw-bold text-decoration-none" style="color: #000;">
                                                    <?= ucwords($jobpost->EmployerTradename) ?>
                                                </a>
                                            </h6>
                                            <p class="text-muted" style="font-size: 12px;">
                                                <?= $timeAgo ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php if ($has_permission): ?>
                            <div class="col-1">
                                <div class="btn-group dropleft pt-3" style="">
                                    <button type="button" class="btn card-tool text-muted " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu" style="border-radius:10px; box-shadow: none;">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#modal<?= $jobpost->id ?>">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php jobpost_update_modal($jobpost, 'modal' . $jobpost->id); ?>

                    <div class="job-details pt-2" style="border:0;">
                        <h6 class="pb-2" style="font-weight:650;">
                            <?= ucwords($jobpost->title) ?>
                            <span class="badge job-status">
                                <?= $jobpost->filled ?>
                            </span>
                        </h6>
                        <!-- <hr> -->
                        <div class="job-description" style="max-height: 200px; overflow-y: hidden">
                            <div class="" style="font-weight:300;">
                                <h5>
                                    <?php if (isset($jobpost->salary) && $jobpost->salary !== '') : ?>
                                        <span class="badge badge-light">
                                        ₱ <?= $jobpost->salary ?>
                                    </span>
                                    <?php endif; ?>

                                    <?php if (isset($jobpost->shift) && $jobpost->shift !== '') : ?>
                                        <span class="badge badge-light">
                                        <?= $jobpost->shift ?>
                                    </span>
                                    <?php endif; ?>

                                    <?php if (isset($jobpost->job_type) && $jobpost->job_type !== '') : ?>
                                        <span class="badge badge-light">
                                        <?= $jobpost->job_type ?>
                                    </span>
                                    <?php endif; ?>
                                </h5>

                            </div>
                            <div class="" style="font-size:14px">
                                <?= $jobpost->description ?>
                            </div>

                        </div>
                        <a class="text-center see-more" data-target=".job-description" style="display: block;" role="button">
                            See more
                        </a>

                        <?php if ($auth['user_type'] == 'EMPLOYEE' && !empty($applicant)) {
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
    <?php }
} else {
    if ($has_permission): ?>
        <div class="card">
            <div class="card-body">
                <p class="card-text">You haven't posted any jobs.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="card">
            <div class="card-body">
                <p class="card-text">The user haven't posted any jobs yet.</p>
            </div>
        </div>
    <?php endif; ?>
<?php } ?>
