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
                <span class="badge job-status">
                    <?= ucwords($job->filled) ?>
                </span>
            </h4>
        </a>
        <h6 class="mb-1">
            <?= ucwords($job->EmployerTradename) ?>
        </h6>
        <small class="text-muted mb-2">Posted
            <?= $formattedTimeDiff ?>
        </small>
        <div class="card-tools mb-4">

        </div>

    </div>
    <div class="card-body p-1" style="overflow-y: auto;">
        <div class="pl-3 pt-3">
            <h5>Applicants:</h5>
        </div>

        <div class="col-6 col-md-6">
            <div class="card-body card-widget widget-user-2">
                <div class="widget-user-header">
                    <div class="widget-user-image">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="User Avatar" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                    </div>
                    <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;">
                        Employee 1
                    </h5>
                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">
                        Web Developer
                    </h6>
                    <div class="d-flex justify-content-right">
                        <button type="button" class="btn btn-primary">Accept</button>
                        <button type="button" class="btn btn-secondary">Reject</button>
                    </div>

                </div>

            </div>
        </div>



    </div>