<style>
    h1 {
        font-size: 25px;
    }

    .circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #f1f1f1;
        text-align: center;
        line-height: 30px;
    }

    .img-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
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
                    <h5 class="card-title font-weight-bold text-dark mb-2">
                        <?= ucwords($job->title) ?>
                        <span class="badge badge-pill">

                        </span>
                    </h5>
                    <small class="text-muted mb-2">Posted
                        <?= $formattedTimeDiff ?>
                    </small>
                    <div class="card-tools">
                        <span class="badge job-status">
                            <?= ucwords($job->filled) ?>
                        </span>
                    </div>
                    <div class="card-body pb-3 pl-0">
                        <div class="card-text mb-0 text-muted" style="max-height: 250px; overflow-y: hidden; font-size: 12px">
                            <?= ucwords(@$job->description) ?>
                        </div>
                    </div>
                    <div class="card-footer p-1">
                        <div class="row align-items-center px-2">
                            Applicant(s):
                            <?php if (!empty($applicants)):
                                $max_display = 8;
                                $counter = 0;

                                foreach ($applicants as $applicant):
                                    if ($applicant->job_id == $job->id) {
                                        if ($counter < $max_display && $applicant->status == 'PENDING') {
                                            $counter++; ?>
                                            <div class="col-1">
                                                <a href="<?= base_url() ?>employee_profile/index/<?= $applicant->employee_id ?>">
                                                    <img src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $applicant->employeeImage ?>" class="img-circle" width="30" height="30" alt="<?= $applicant->employeeName ?>">
                                                </a>
                                            </div>
                                        <?php } else if ($counter == $max_display) {
                                            echo '<div class="col-1"><div class="circle">' . (count($applicants) - $max_display) . '+</div></div>';
                                            break;
                                        }
                                    }
                                endforeach;
                                if ($counter == 0): ?>
                                    <div class="badge badge-info m-0 p-1 ml-3" role="alert">
                                        No applicants yet.
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="badge badge-info m-0 p-1" role="alert">
                                    No applicants yet.
                                </div>
                            <?php endif; ?>
                        </div>
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