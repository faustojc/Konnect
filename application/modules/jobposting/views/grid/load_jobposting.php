<style>
    h1 {
        font-size: 25px;
    }

    .badge-light {
        color: #313131;
        background-color: #D9D9D9;
        font-weight: 600;
        font-size: 13px;
        padding: 7px;
        border-radius: 7px;
    }
</style>

<div class="row justify-content-center job-content">
    <div class="col-md-4 pl-1" style="height: auto; ">
        <?php if (!empty($details)) {
            foreach ($details as $job) {
                $hasApplied = FALSE;

                if (strtoupper($job->filled) == 'CLOSED') {
                    continue;
                }

                if ($auth['user_type'] == 'EMPLOYEE' && !empty($applications)) {
                    foreach ($applications as $application) {
                        if ($application->job_id == $job->id) {
                            $hasApplied = TRUE;
                            break;
                        }
                    }
                }

                if ($hasApplied) {
                    continue;
                }

                $formattedTimeDiff = formatTime($job->date_posted);
                ?>
                <div class="card card-light p-3 mb-2 job-link" role="button" data-id="<?= $job->id ?>">
                    <h5 class="card-title font-weight-bold text-dark mb-0">
                        <?= ucwords(@$job->title) ?>
                    </h5>
                    <h5 class="pt-2" style="font-weight:normal; font-size:14px;">
                        <?= ucwords($job->EmployerTradename) ?>
                        <?php verifyBadge($job->user_verified); ?>
                    </h5>
                    <small class="text-muted mb-">Posted
                        <?= $formattedTimeDiff ?>
                    </small>
                    <div class="card-tools">
                        <span class="badge job-status">
                            <?= ucwords($job->filled) ?>
                        </span>
                    </div>

                    <div class="card-body pb-1 pl-0">
                        <div class="" style="font-weight:300;">
                            <h5>
                                <?php if (isset($job->salary) && $job->salary !== ''): ?>
                                    <span class="badge badge-light">
                                        ₱
                                        <?= $job->salary ?>
                                    </span>
                                <?php endif; ?>

                                <?php if (isset($job->shift) && $job->shift !== ''): ?>
                                    <span class="badge badge-light">
                                        <?= $job->shift ?>
                                    </span>
                                <?php endif; ?>

                                <?php if (isset($job->job_type) && $job->job_type !== ''): ?>
                                    <span class="badge badge-light">
                                        <?= $job->job_type ?>
                                    </span>
                                <?php endif; ?>
                            </h5>

                        </div>

                        <div class="card-text mb-0 text-muted " style="max-height: 250px; overflow-y: hidden; font-size: 12px">
                            <?= ucwords(@$job->description) ?>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">No Jobs Found</h1>
                    <p class="lead">We can't find the jobs that you are looking for or there are no jobs available.</p>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-md-5 job-details"></div>
</div>
