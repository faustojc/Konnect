<?php
$totalJobPostings = count($jobpostings);
?>
<style>
    /* Add a custom class for the container to create a flex column layout */
    .search-results-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* Add a margin to the total job postings to separate it from the "Search Results" text */
    .total-job-postings {
        margin-left: 10px;
    }

    .badge-light {
        color: #313131;
        background-color: #D9D9D9;
        font-weight: 600;
        font-size: 13px;
        padding: 7px;
        border-radius: 7px;
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        /* border: 3px solid green;  */
    }

    .btn-outline-secondary:hover {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .job-card-<?= $jobpost->id ?> {
        background-color: <?= $randomBackgroundColor ?>;
    }

    html {
        font-size: 16px; /* You can adjust this value to control the base font size */
    }

    @media (max-width: 767px) {
        html {
            font-size: 14px;
        }
    }

    @media (max-width: 575px) {
        html {
            font-size: 12px;
        }
    }

    @media (max-width: 575px) {
        .card-body {
            padding: 1rem; /* Adjust the padding as needed for smaller screens */
        }

        .job-card-<?= $jobpost->id ?> {
            height: auto; /* Change the height to 'auto' for smaller screens to allow proper wrapping */
        }

        .job-description {
            max-height: none; /* Remove the max-height to allow full content display on smaller screens */
        }
    }

    @media (max-width: 575px) {
        .job-status-container {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }
</style>

<div class="col-12">
    <div class="card ">
        <div class="card-body">
            <div class="search-results-container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center">
                        <h4 class="m-0 pr-1" style="font-weight:600; line-height:auto;">Search Results</h4>

                        <div class="total-job-postings">
                            <h4 class="outline-gray m-0" style="font-weight:300; line-height:auto;"><?= $totalJobPostings ?></h4>

                            <!-- <span>Sort by: </span>
                            <select name="" id="">
                                <option value="">Last Updated</option>
                                <option value="">Alphabetical</option>

                            </select>
                            <i class="fa-solid fa-sliders" style="font-size:12px;"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

$totalJobPostings = count($jobpostings);
$backgroundColors = array('#FDCEDF', '#ebdef0', '#d6eaf8', '#d1f2eb', '#fcf3cf', '#fadbd8', '#D2E9E9', '#B2A4FF', '#FFD966', '#FD8A8A');
shuffle($backgroundColors); // Randomize the order of colors inside the array
$usedColors = array();


if (!empty($jobpostings)) {
    $totalColors = count($backgroundColors); // Get the total number of available colors in the array

    foreach ($jobpostings as $key => $jobpost) {
        $timeDifference = time() - strtotime($jobpost->date_posted);
        $timeAgo = "";
        // $usedColors = array(); // Array to keep track of colors used for each card

        // Generate a random index to select a color from the available colors
        $colorIndex = array_rand($backgroundColors);

        // Select the color for this job card using the random index
        $randomBackgroundColor = $backgroundColors[$colorIndex];

        // Store the used color for this card
        $usedColors[] = $randomBackgroundColor;


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

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card grow text-wrap">
                <div class="card-body pt-2 mx-3 my-3 px-2 job-post job-card-<?= $jobpost->id ?> pb-2" style="border-radius:15px; background-color: <?= $randomBackgroundColor ?>">
                    <div class="row px-2 pb-4 pt-2">
                        <div class="col-8 pt-2">
                            <div class="d-flex justify-content-between py-1 px-2">
                                <div class="card " style="border-radius:80px;">
                                    <div class="card-body py-1 px-2" style="">
                                        <p class="py-1" style="font-size: 12px; margin:0; font-weight: 500;">
                                            <?= date('d M, Y', strtotime($jobpost->date_posted)) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <h6 class="m-0 px-2 pt-3" style="font-size: 0.75rem; /* Adjust the value as needed */">
                                <a href="<?= base_url() ?>employer_profile?id=<?= $jobpost->employer_id ?>" class="job-title fw-bold text-decoration-none" style="color:#000; font-size: 12px; font-weight:300;">
                                    <?= ucwords($jobpost->EmployerTradename) ?>
                                </a>
                            </h6>
                            <div class="job-details pt-1" style="border: 0;">
                                <h5 class="pb-2 pt-1 px-2" style="font-weight: bold;">
                                    <?= ucwords($jobpost->title) ?>
                                </h5>

                                <div class="job-description px-2" style="max-height: 150px; overflow-y: hidden">
                                    <div class="" style="font-weight: bold;">
                                        <?php if (isset($jobpost->shift) && $jobpost->shift !== '') : ?>
                                            <div class="btn btn-outline-secondary" style="font-size:12px; border-radius:15px;">
                                                <?= $jobpost->shift ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (isset($jobpost->job_type) && $jobpost->job_type !== '') : ?>
                                            <div class="btn btn-outline-secondary" style="font-size:12px; border-radius:15px;">
                                                <?= $jobpost->job_type ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- <?php if ($auth['user_type'] != 'EMPLOYER'): ?>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 col-md-4 col-sm-12">
                                    <button type="button" class="btn btn-light btn-block apply-button" data-id="<?= $jobpost->id ?>">APPLY</button>
                                </div>
                            </div>
                        <?php endif; ?> -->

                            </div>
                        </div>
                        <div class="col-4 pt-2">
                            <div class="d-flex justify-content-end py-1 px-2 job-status-container">
                                <div class="card m-0" style="height:34px; background-color:#6c757d; color:white; border-radius:80px;">
                                    <div class="card-body center py-1 px-2" style="padding:0;text-align:center;">
                                        <div class="d-flex align-content-center px-2">
                                            <div class="d-flex" style="align-content:center;">
                                                <?php $circleColor = (strtolower($jobpost->filled) === "open") ? " #7bff79 " : " #ff7979 "; ?>
                                                <h8 class=" py-2 pr-1" style="color: <?= $circleColor ?>; font-size: 0.75rem;">●</h8>
                                                <h8 class="py-2" style="font-size: 0.75rem; font-weight: 650;"><?= $jobpost->filled ?></h8>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-end center pb-5  pr-3">
                                <img class="img-circle img-fluid " src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $jobpost->EmployerLogo ?>" alt="Employer Profile Pic"
                                     style="border:4px solid white;object-fit: cover; height:4rem; width:4rem; position:absolute;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row px-2 pb-4 pt-2">
                    <div class="col-12 col-md-6">
                        <h6 class=" m-0 px-2" style="font-weight: bold;">
                            ₱ <?= $jobpost->salary ?>
                        </h6>
                        <p class="text-muted px-2 m-0" style="font-size: 0.625rem; /* Adjust the value as needed */">
                            Bacolod City, Negros Occidental
                        </p>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-center align-self-center">
                        <div class="px-2">
                            <button class="btn btn-info" style="border-radius: 0.9375rem; /* Adjust the value as needed */" data-toggle="modal" data-target="#modal<?= $key ?>">Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade px-0 border-0" id="modal<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="modalTitle<?= $key ?>" aria-hidden="true" style="border-radius:15px;">
            <div class="modal-dialog modal-dialog-centered" style="border-radius:15px;" role="document">
                <div class="modal-content border-0 shadow-none" style="border-radius:15px;">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="modalTitle<?= $key ?>"><?= ucwords($jobpost->title) ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <?= $jobpost->description ?>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // Store the used color for this card and remove it from the array
        // $usedColors[] = $randomBackgroundColor;
        // unset($backgroundColors[$randomColorIndex]);
    }

    // Reset the keys of $backgroundColors to avoid potential issues with array_rand()
    $backgroundColors = array_values($backgroundColors);
    // If there are remaining colors after all cards are generated, you can re-add them back to the $backgroundColors array to be used in future refreshes.
    $backgroundColors = array_merge($backgroundColors, $usedColors);
    $totalJobPostings++;
} ?>

