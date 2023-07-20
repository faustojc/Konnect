<?php 


$backgroundColors = array(' #FDCEDF ', ' #ebdef0 ', ' #d6eaf8 ', ' #d1f2eb ', ' #fcf3cf ',' #fadbd8 ','#D2E9E9');


if (!empty($jobpostings)) {
    foreach ($jobpostings as $jobpost) {
        $timeDifference = time() - strtotime($jobpost->date_posted);
        $timeAgo = "";
        $usedColors = array(); // Array to keep track of colors used for each card

        $randomColorIndex = array_rand($backgroundColors);
        $randomBackgroundColor = $backgroundColors[$randomColorIndex];


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
           
        </style>
        
        <div class="col-4" >
        <div class="card" style="height:300px;">
            <div class="card-body py-2 px-2">
                <div class="container job-post job-card-<?= $jobpost->id ?>" style="border-radius:15px; height:200px;">
                    <div class="row">
                        
                            <!-- <img class="img-circle img-fluid " src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $jobpost->EmployerLogo ?>" alt="Employer Profile Pic"
                                 style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;"> -->
                        
                        <div class="col-6 pt-2 ">
                            <div class="d-flex justify-content-between py-1 px-2">
                                        <div class="card " style="border-radius:80px;">
                                            <div class="card-body py-1 px-2" style="">
                                                <p class="py-1" style="font-size: 12px; margin:0; font-weight: 400;">
                                                <?= date('d M, Y', strtotime($jobpost->date_posted)) ?>

                                                </p>
                                            </div>

                                        </div>
                                
                                <!-- <a href="<?= base_url() ?>jobpost?id=<?= $jobpost->id ?>" class="btn btn-outline-info btn-sm h-50 w-25 ">View</a> -->
                            </div>
                                <h6 class="m-0 px-2">
                                    <a href="<?= base_url() ?>employer_profile?id=<?= $jobpost->employer_id ?>" class="job-title fw-bold text-decoration-none" style="color:#000; font-size: 12px; font-weight:300;">
                                        <?= ucwords($jobpost->EmployerTradename) ?>
                                    </a>
                                </h6>
                        </div>
                        <div class="col-6 pt-2">

                            <div class="d-flex justify-content-end py-1 px-2">
                                <div class="card m-0 " style="height:34px; background-color:#6c757d; color:white; border-radius:80px;">
                                    <div class="card-body center py-1 px-2" style="padding:0;text-align:center; ">
                                    
                                    <!-- <div class="">
                                        <i class="fa-solid fa-circle"></i> 
                                    </div> -->
                                    <div class="d-flex align-content-center px-2">
                                    
                                        
                                    <div class="d-flex" style="align-content:center;">
                                    <?php 
                                    $circleColor = (strtolower($jobpost->filled) === "open") ? " #7bff79 " : " #ff7979 ";
                                    ?>
                                        <h8 class=" py-2 pr-1" style="color: <?= $circleColor ?>; font-size:12px;">●</h8> <h8 class="py-2" style="font-size:12px;font-weight:650;"><?= $jobpost->filled ?></h8> 
                                    </div>
                                    </div>
                                    
                                    
                                    <!-- <span class="badge job-status"> </span> -->


                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="job-details pt-1" style="border:0;">
                        <h5 class="pb-2 px-2" style="font-weight:500;">
                            <?= ucwords($jobpost->title) ?>
                            
                        </h5>
                        
                        <!-- <hr> -->
                        <div class="">
                        <div class="job-description px-2" style="max-height: 150px; overflow-y: hidden">
                            <div class="" style="font-weight:300;">
                                
                                    <!-- <?php if (isset($jobpost->salary) && $jobpost->salary !== '') : ?>
                                    <div class="btn btn-outline-secondary" style="font-size:12px; border-radius:15px;">
                                        ₱ <?= $jobpost->salary ?>
                                    </div>
                                    <?php endif; ?> -->

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
                            <div class="" style="font-size:14px">
                                <!-- <?= $jobpost->description ?> -->
                            </div>

                        </div>
                        </div>
                        
                        <!-- <a class="text-center see-more" data-target=".job-description" style="display: block;" role="button">See more</a> -->

                        <?php if ($auth['user_type'] != 'EMPLOYER'): ?>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 col-md-4 col-sm-12">
                                    <button type="button" class="btn btn-light btn-block apply-button" data-id="<?= $jobpost->id ?>">APPLY</button>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="row">
                        <div class="col-6 ">
                            <h6 class="pt-3 m-0 px-2" style="font-weight:600;">
                                ₱ <?= $jobpost->salary ?>/month
                            </h6>
                            <p class="text-muted px-2" style="font-size:10px;">
                                Bacolod City, Negros Occidental
                            </p>
                        </div>
                        <div class="col-6">

                        </div>

                </div>
                
                                    
            </div>
        </div>
        </div>
    <?php 
    // Store the used color for this card and remove it from the array
        $usedColors[] = $randomBackgroundColor;
        unset($backgroundColors[$randomColorIndex]);
    }

    // Reset the keys of $backgroundColors to avoid potential issues with array_rand()
    $backgroundColors = array_values($backgroundColors);

    // If there are remaining colors after all cards are generated, you can re-add them back to the $backgroundColors array to be used in future refreshes.
    $backgroundColors = array_merge($backgroundColors, $usedColors);
}
?>