<?php if (!empty($jobpostings)) {
    foreach ($jobpostings as $jobpost) {
        $timeDifference = time() - strtotime($jobpost->date_posted);
        $timeAgo = "";

        if ($timeDifference < 60) {
            $timeAgo = "Less than a minute ago";
        } else if ($timeDifference < 3600) {
            $minutesAgo = floor($timeDifference / 60);
            $timeAgo = $minutesAgo . " mins ago";
        } else if ($timeDifference < 86400) {
            $hoursAgo = floor($timeDifference / 3600);
            $timeAgo = $hoursAgo . ($hoursAgo == 1 ? " hr ago" : " hrs ago");
        } else if ($timeDifference < 604800) {
            $daysAgo = floor($timeDifference / 86400);
            $timeAgo = $daysAgo . ($daysAgo == 1 ? " day ago" : " days ago");
        } else if ($timeDifference < 2592000) {
            $weeksAgo = floor($timeDifference / 604800);
            $timeAgo = $weeksAgo . ($weeksAgo == 1 ? " week ago" : " weeks ago");
        } else if ($timeDifference < 31536000) {
            $monthsAgo = floor($timeDifference / 2592000);
            $timeAgo = $monthsAgo . ($monthsAgo == 1 ? " month ago" : " months ago");
        } else if ($timeDifference < 315360000) {
            $yearsAgo = floor($timeDifference / 31536000);
            $timeAgo = $yearsAgo . ($yearsAgo == 1 ? " year ago" : " years ago");
        }
        ?>
        <style>
            .badge-light {
                color: #313131;
                background-color: #D9D9D9;
                font-weight: 600;
                font-size: 13px;
                padding: 7px;
                border-radius: 7px;
            }
        </style>

        <div class="card">
            <div class="card-body ">
                <div class="job-post">
                    <div class="row">
                        <div class="col-1 d-flex justify-content-center">
                            <img class="img-circle img-fluid " src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $jobpost->EmployerLogo ?>" alt="Employer Profile Pic"
                                 style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                        </div>
                        <div class="col-10 pt-2 pl-3">
                            <div class="d-flex justify-content-between">
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="m-0">
                                            <a href="<?= base_url() ?>employer_profile?id=<?= $jobpost->employer_id ?>" class="job-title fw-bold text-decoration-none" style="color:#000;">
                                                <?= ucwords($jobpost->EmployerTradename) ?>
                                            </a>
                                        </h6>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-muted" style="font-size: 12px;">
                                            <?= $timeAgo ?> in
                                            <?= $jobpost->date_posted ?>
                                        </p>
                                    </div>
                                </div>
                                <!-- <a href="<?= base_url() ?>jobpost?id=<?= $jobpost->id ?>" class="btn btn-outline-info btn-sm h-50 w-25 ">View</a> -->
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="btn-group dropleft" style="">
                                <button type="button" class="btn card-tool text-muted " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu" style="border-radius:10px; box-shadow: none;">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job-details pt-2" style="border:0;">
                        <h6 class="pb-2" style="font-weight:650;">
                            <?= ucwords($jobpost->title) ?>
                            <span class="badge job-status">
                                <?= $jobpost->filled ?>
                            </span>
                        </h6>
                        <!-- <hr> -->
                        <div class="job-description" style="max-height: 150px; overflow-y: hidden">
                            <div class="" style="font-weight:300;">
                                <h5>
                                    <?php if (isset($jobpost->salary) && $jobpost->salary !== '') : ?>
                                        <span class="badge badge-light">
                                        ₱ <?= $jobpost->salary ?>
                                    </span>
                                    <?php endif; ?>

                                    <?php if (isset($jobpost->shift) && $jobpost->shift !== '') : ?>
                                        <span class="badge badge-light">
                                        <?= $jobpost->shift ?>
                                    </span>
                                    <?php endif; ?>

                                    <?php if (isset($jobpost->job_type) && $jobpost->job_type !== '') : ?>
                                        <span class="badge badge-light">
                                        <?= $jobpost->job_type ?>
                                    </span>
                                    <?php endif; ?>
                                </h5>

                            </div>
                            <div class="" style="font-size:14px">
                                <?= $jobpost->description ?>
                            </div>

                        </div>
                        <a class="text-center see-more" data-target=".job-description" style="display: block;" role="button">See more</a>

                        <?php if ($auth['user_type'] != 'EMPLOYER') {
                            $hasApplied = false;

                            foreach ($applicant as $applied) {
                                if ($applied->job_id == $jobpost->id) {
                                    apply_button($applied->job_id, $applied->status);
                                    $hasApplied = true;
                                    break;
                                }
                            }

                            if (!$hasApplied) {
                                apply_button($jobpost->id, 'APPLY');
                            }
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>