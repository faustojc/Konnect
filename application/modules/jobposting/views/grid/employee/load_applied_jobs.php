<?php if (!empty($applied_jobs)): ?>
    <div class="row justify-content-center job-content">
        <div class="col-md-4 pl-1" style="height: auto; ">
            <?php foreach ($applied_jobs as $info) {
                $formattedTimeDiff = formatTime($info->jobDatePosted); ?>
                <div class="card card-light p-3 mb-3 job-link" role="button" data-id="<?= $info->id ?>">
                    <h5 class="card-title font-weight-bold text-dark mb-2">
                        <?= ucwords($info->jobTitle) ?>
                    </h5>
                    <h5 class="" style="font-weight:normal; font-size:14px;">
                        <?= ucwords($info->employerName) ?>
                    </h5>
                    <small class="text-muted mb-2">Posted
                        <?= $formattedTimeDiff ?>
                    </small>
                    <div class="card-tools">
                        <span class="badge job-status">
                            <?= ucwords($info->jobStatus) ?>
                        </span>
                    </div>
                    <div class="card-body pb-3 pl-0">
                        <div class="card-text mb-0 text-muted " style="max-height: 250px; overflow-y: hidden; font-size: 12px">
                            <h5>
                                <?php if (isset($info->jobSalary) && $info->jobSalary !== ''): ?>
                                    <span class="badge badge-light">
                                        ₱
                                        <?= $info->jobSalary ?>
                                    </span>
                                <?php endif; ?>

                                <?php if (isset($info->jobShift) && $info->jobShift !== ''): ?>
                                    <span class="badge badge-light">
                                        <?= $info->jobShift ?>
                                    </span>
                                <?php endif; ?>

                                <?php if (isset($info->jobType) && $info->jobType !== ''): ?>
                                    <span class="badge badge-light">
                                        <?= $info->jobType ?>
                                    </span>
                                <?php endif; ?>
                            </h5>
                            <?= $info->jobDescription ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-5 job-details"></div>
    </div>
<?php else: ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">You don't have any jobs applied</h1>
            <p class="lead">Still can find the job that you are looking for? Head to the Job Feed</p>
        </div>
    </div>
<?php endif; ?>