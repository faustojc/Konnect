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
                                    <a class="dropdown-item" data-toggle="modal" data-target="#jobposteditmodal">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal -->
                    <div class="modal fade" id="jobposteditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-radius:15px;">
                        <div class="modal-dialog modal-lg modal-dialog-centered " role="document" style="width:;">
                            <div class="modal-content border-0" style="border-radius:15px;">
                                <div class="border-0">

                                    <h5 class="text-center pt-3 pb-2" id="exampleModalLabel" style="font-weight:650;">
                                        <i class="fa-solid fa-pen-to-square"></i> Create Jobpost
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="pr-3" aria-hidden="true">&times;</span>
                                        </button>
                                    </h5>

                                </div>

                                <div class="modal-body border-0">
                                    <div class="pb-1">

                                        <label for="" style="">Job Title</label>
                                        <input id="title" name="title" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:10px;" value="<?= ucwords($jobpost->title) ?>" type="text" placeholder="Enter Job Name">
                                    </div>

                                    <div class="row pt-2">
                                        <div class="col-5">
                                            <label for="" style="">Salary</label>
                                            <div class="input-group mb-3 ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text border-0" style="border-radius:10px 0 0 10px;">₱</span>
                                                </div>
                                                <input id="salary" name="salary" value="<?= $jobpost->salary ?>" type="text" maxlength="16" id="salary" onclick="disableDotZero()" onblur="formatInput()" oninput="formatInput2()"
                                                       class="form-control border-0"
                                                       style="background-color: #F4F6F7; border-radius:0 10px 10px 0; " placeholder="Input Salary ">
                                                <!-- <div class="input-group-append">
                                                    <span class="input-group-text border-0" style="border-radius:0 10px 10px 0;">.00</span>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Job Type</label>
                                                <select id="job_type" name="job_type" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" name="" id="">
                                                    <option>Full time</option>
                                                    <option>Part time</option>
                                                    <option>Internship</option>
                                                    <option>Permanent</option>
                                                    <option>Shift work</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label>Schedule</label>
                                                <select id="shift" name="shift" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;" name="" id="">
                                                    <option>Day</option>
                                                    <option>Night</option>
                                                    <option>Flextime</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-3">
                                            <label>Start Date</label>
                                            <input id="start_date" name="start_date" type="date" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="form-group" style="border: 0;">
                                                <label>Skills Requirements</label>
                                                <label class="text-muted" style="font-size: 13px;">(click enter to separate skills)</label>
                                                <input id="skills_req" name="skills_req" class="form-control border-0" style="resize: none; background-color: #F4F6F7; border-radius: 10px;" type="text" placeholder="Skill#1, Skill#2">
                                            </div>
                                        </div>

                                        <div class=" col-2">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select id="filled" name="filled" class="form-control border-0" style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                                    <option>Open</option>
                                                    <option>Closed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <textarea id="description" name="description" class="form-control border-0" style="resize:none;background-color: #F4F6F7; border-radius:15px;" name="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button id="btn_post" type="button" class="btn text-dark" style="border-radius:10px; width:100%; background-color: #F4F6F7;">Post</button>
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

