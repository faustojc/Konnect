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

    .badge-secondary {
        color: #313131;
        background-color: #D9D9D9;
    }
</style>

<div class="row justify-content-center job-content">
    <div class="col-md-4 pl-1" style="height: auto; ">
        <?php
        $ci = &get_instance();
        if (!empty($own_jobposts)) {
            foreach ($own_jobposts as $job) {
                $formattedTimeDiff = formatTime($job->date_posted);
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
                            <h6 class="pt-2" style="font-size:13px;">Applicant(s):</h6>
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
                                    <div class="badge badge-secondary m-0 p-1 ml-2" role="alert">
                                        No applications yet
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="badge badge-secondary m-0 p-1" role="alert">
                                    No applications yet
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
        <?php } ?>
    </div>

    <div class="col-md-5 job-details"></div>
</div>
