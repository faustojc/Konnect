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
        <div class="card">
            <div class="card-body">
                <div class="job-post">
                    <div class="row">
                        <div class="col-1 d-flex justify-content-center">
                            <img class="img-circle img-fluid " src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $jobpost->EmployerLogo ?>" alt="Employer Profile Pic" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                        </div>
                        <div class="col-11 pt-2 pl-3">
                            <div class="d-flex justify-content-between">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <a href="<?= base_url() ?>employer_profile?id=<?= $jobpost->employer_id ?>" class="job-title fw-bold text-decoration-none">
                                                <?= ucwords($jobpost->EmployerTradename) ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-muted" style="font-size: 12px;"><?= $timeAgo ?> in <?= $jobpost->date_posted ?></p>
                                    </div>
                                </div>
                                <a href="<?= base_url() ?>jobpost?id=<?= $jobpost->id ?>" class="btn btn-outline-info btn-sm h-50 w-25">View</a>
                            </div>
                        </div>
                    </div>

                    <div class="job-details pt-2">
                        <h5>
                            <?= ucwords($jobpost->title) ?>
                            <span class="badge job-status"><?= $jobpost->filled ?></span>
                        </h5>
                        <hr>
                        <div class="job-description" style="max-height: 450px; overflow-y: hidden">
                            <p class="fs-14 mb-0 text-muted">
                                <?= $jobpost->description ?>
                            </p>
                        </div>
                        <a class="text-center see-more" data-target=".job-description" style="display: block" role="button">See more</a>
                        <hr>
                        <h6 class="pt-2">Requirements</h6>
                        <div class="row">
                            <div class="col-12">
                                <span class="badge badge-light py-2" style="margin-right:10px;border-radius:10px; width:6rem; font-weight:normal;">PHP</span>
                                <span class="badge badge-light py-2" style="margin-right:10px;border-radius:10px; width:6rem; font-weight:normal;">Laravel</span>
                                <span class="badge badge-light py-2" style="margin-right:10px;border-radius:10px; width:6rem; font-weight:normal;">HTML</span>
                                <span class="badge badge-light py-2" style="margin-right:10px;border-radius:10px; width:6rem; font-weight:normal;">Figma</span>
                                <span class="badge badge-light py-2" style="margin-right:10px;border-radius:10px; width:6rem; font-weight:normal;">Java</span>
                                <span class="badge badge-light py-2" style="margin-right:10px;border-radius:10px; width:6rem; font-weight:normal;">C++</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>