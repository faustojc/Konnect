<?php
$time = formatTime($job->date_posted);
?>

<div class="card card-light mb-0 sticky-top" style="top: 60px; max-height: calc(100vh - 70px);">
    <div class="card-header d-flex flex-column p-3">
        <a href="<?php echo base_url() ?>jobposting/job_info/<?= $job->id ?>" class="text-dark">
            <h4 class="card-title font-weight-bold mb-2" style="font-size: 18px;">
                <?= ucwords($job->title) ?>
            </h4>
        </a>
        <h6 class="mb-1">
            <?= ucwords($job->EmployerTradename) ?>
        </h6>
        <small class="text-muted mb-2">Posted
            <?= $time ?>
        </small>
        <div class="card-tools mb-4">
            <span class="badge job-status">
                <?= ucwords($job->filled) ?>
            </span>
        </div>

        <?php
        $auth = get_userdata(AUTH);

        if ($auth['user_type'] == 'EMPLOYEE' && !empty($applicant)) {
            if ($applicant->job_id == $job->id && strtoupper($applicant->status) != 'PENDING') {
                apply_button($job->id, strtoupper($applicant->status));
            } else {
                apply_button($job->id, 'APPLY NOW');
            }
        } ?>

    </div>

    <div class="pl-3 pt-3" style="font-weight:300;">
        <?php if (isset($job->salary) && $job->salary !== ''): ?>
            <h6 class="d-inline" style="font-size:14px;"><i class="fa-solid fa-wallet"></i> Salary:</h6>
            <h6 class="text-muted d-inline mr-2" style="font-weight:normal; font-size:14px;">₱
                <?= $job->salary ?> a month
            </h6>
        <?php endif; ?>
        <br>
        <div class="pt-2"></div>

        <?php if (isset($job->shift) && $job->shift !== ''): ?>
            <h6 class="d-inline" style="font-size:14px;"><i class="fa-solid fa-clock"></i> Shift Schedule:</h6>
            <h6 class="text-muted d-inline mr-2" style="font-weight:normal; font-size:14px;">
                <?= $job->shift ?>
            </h6>
        <?php endif; ?>
        <br>
        <div class="pt-2"></div>
        <?php if (isset($job->job_type) && $job->job_type !== ''): ?>
            <h6 class="d-inline pt-4" style="font-size:14px;"><i class="fa-solid fa-briefcase"></i> Job Type:</h6>
            <h6 class="text-muted d-inline mr-2" style="font-weight:normal; font-size:14px;">
                <?= $job->job_type ?>
            </h6>
        <?php endif; ?>
    </div>

    <div class="card-body p-3" style="overflow-y: auto; font-size: 14px;">
        <p style="">
            <?= $job->description ?>
        </p>
    </div>
</div>
