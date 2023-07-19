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

<div class="card card-light mb-0 sticky-top" style="top: 60px; max-height: calc(100vh - 70px);">
    <div class="card-header d-flex flex-column p-3">
        <a href="<?php echo base_url() ?>jobposting/job_info/<?= $job->id ?>" class="text-dark">
            <h4 class="card-title font-weight-bold mb-2" style="font-size: 18px;">
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
        <div class="card-tools mb-2">

        </div>

    </div>
    <div class="card-body">
        <!-- style="overflow-y: auto;" -->
        <div class="row pl-3 py-2">
            <h5 style="font-size: 18px;">Applicants:</h5>
        </div>


        <div class="row">
            <div class="col-12 col-md-6">
                <div class="row pl-3 pt-2">
                    <div class="col-4 col-md-3">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="User Avatar" style="object-fit: cover;min-width: 50px; max-width: 50px; min-height: 50px; max-height: 50px;">
                        </div>
                    </div>
                    <div class="col-8 col-md-9">
                        <h5 class="widget-user-username" style="font-size: 15px; font-weight: 500;">
                            Employee 1
                        </h5>
                        <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 13px;">
                            Web Developer
                        </h6>
                    </div>
                </div>
            </div>

            <div style="transform: scale(0.8);" class="col-12 col-md-6 pt-3 pt-md-0 d-flex align-items-center">
                <div class="d-flex justify-content-start">
                    <button type="button" class="btn btn-info mr-2" id="btn_accecpt">Accept</button>
                    <button type="button" class="btn btn-secondary" id="btn_reject">Reject</button>
                </div>
            </div>
        </div>

    </div>