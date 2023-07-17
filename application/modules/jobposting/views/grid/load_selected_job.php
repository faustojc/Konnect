<?php
$postDate = strtotime($job->date_posted);
$currentTime = time();
$timeDiff = $currentTime - $postDate;

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

<div class="card card-light mb-0 sticky-top" style="top: 60px; max-height: calc(100vh - 120px);">
    <div class="card-header d-flex flex-column p-3">
        <a href="<?php echo base_url() ?>jobposting/job_info/<?= $job->id ?>" class="text-dark">
            <h4 class="card-title font-weight-bold mb-2" style="font-size: 22px;">
                <?= ucwords($job->title) ?>
            </h4>
        </a>
        <h6 class="mb-1"><?= ucwords($job->EmployerTradename) ?></h6>
        <small class="text-muted mb-2">Posted <?= $formattedTimeDiff ?></small>
        <div class="card-tools mb-4">
            <span class="badge job-status"><?= ucwords($job->filled) ?></span>
        </div>
        <button type="button" class="btn btn-outline-info w-25">Apply now</button>
    </div>
    <div class="card-body p-3" style="overflow-y: auto;">
        <p><?= $job->description ?></p>
    </div>
</div>