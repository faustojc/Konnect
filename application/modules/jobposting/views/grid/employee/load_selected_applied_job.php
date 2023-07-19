<?php
$postDate = strtotime($applied_job->jobDatePosted);
$timeDiff = time() - $postDate;

if ($timeDiff < 60) {
    $formattedTimeDiff = 'less than a minute ago';
} elseif ($timeDiff < 3600) {
    $minutes = floor($timeDiff / 60);
    $formattedTimeDiff = $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
} elseif ($timeDiff < 86400) {
    $hours = floor($timeDiff / 3600);
    $formattedTimeDiff = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
} elseif ($timeDiff < 604800) {
    $days = floor($timeDiff / 86400);
    $formattedTimeDiff = $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
} elseif ($timeDiff < 2592000) {
    $weeks = floor($timeDiff / 604800);
    $formattedTimeDiff = $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
} else {
    $months = floor($timeDiff / 2592000);
    $formattedTimeDiff = $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
}
?>

<div class="card card-light mb-0 sticky-top" style="top: 60px; max-height: calc(100vh - 70px);">
    <div class="card-header d-flex flex-column p-3">
        <a href="<?php echo base_url() ?>jobposting/job_info/<?= $applied_job->jobID ?>" class="text-dark">
            <h4 class="card-title font-weight-bold mb-2" style="font-size: 18px;">
                <?= ucwords($applied_job->jobTitle) ?>
            </h4>
        </a>
        <h6 class="mb-1">
            <?= ucwords($applied_job->employerName) ?>
        </h6>
        <small class="text-muted mb-2">Posted
            <?= $formattedTimeDiff ?>
        </small>
        <div class="card-tools mb-4">
            <span class="badge job-status">
                <?= ucwords($applied_job->jobStatus) ?>
            </span>
        </div>

        <button type="button" class="btn btn-outline-info w-25"><?= $applied_job->status ?></button>
    </div>

    <div class="pl-3 pt-3" style="font-weight:300;">
        <?php if (isset($applied_job->jobSalary) && $applied_job->jobSalary !== ''): ?>
            <h6 class="d-inline" style="font-size:14px;"><i class="fa-solid fa-wallet"></i> Salary:</h6>
            <h6 class="text-muted d-inline mr-2" style="font-weight:normal; font-size:14px;">₱
                <?= $applied_job->jobSalary ?> a month
            </h6>
        <?php endif; ?>
        <br>
        <div class="pt-2"></div>

        <?php if (isset($applied_job->jobShift) && $applied_job->jobShift !== ''): ?>
            <h6 class="d-inline" style="font-size:14px;"><i class="fa-solid fa-clock"></i> Shift Schedule:</h6>
            <h6 class="text-muted d-inline mr-2" style="font-weight:normal; font-size:14px;">
                <?= $applied_job->jobShift ?>
            </h6>
        <?php endif; ?>
        <br>
        <div class="pt-2"></div>
        <?php if (isset($applied_job->jobType) && $applied_job->jobType !== ''): ?>
            <h6 class="d-inline pt-4" style="font-size:14px;"><i class="fa-solid fa-briefcase"></i> Job Type:</h6>
            <h6 class="text-muted d-inline mr-2" style="font-weight:normal; font-size:14px;">
                <?= $applied_job->jobType ?>
            </h6>
        <?php endif; ?>
    </div>

    <div class="card-body p-3" style="overflow-y: auto; font-size: 14px;">
        <p style="">
            <?= $applied_job->jobDescription ?>
        </p>
    </div>
</div>