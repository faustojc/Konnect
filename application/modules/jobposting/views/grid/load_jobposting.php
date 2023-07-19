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
        <?php
        $ci = &get_instance();
        if (!empty($details)) {
            foreach ($details as $job) {
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
                <div class="card card-light p-3 mb-3 job-link" role="button" data-id="<?= $job->id ?>">
                    <h5 class="card-title font-weight-bold text-dark mb-0">
                        <?= ucwords(@$job->title) ?>
                    </h5>
                    <p>
                        <?= ucwords($job->EmployerTradename) ?>
                    </p>
                    <small class="text-muted">Posted
                        <?= $formattedTimeDiff ?>
                    </small>
                    <div class="card-tools">
                        <span class="badge job-status">
                            <?= ucwords($job->filled) ?>
                        </span>
                    </div>
                    <div class="card-body pb-3 pl-0">
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
                    <div class="card-footer bg-transparent p-0">
                        <button type="button" class="btn btn-outline-info btn-sm">Apply now</button>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">No Jobs Found</h1>
                    <p class="lead">We can't find the jobs that you are looking for or there are no jobs available.</p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="col-md-5 job-details"></div>
</div>