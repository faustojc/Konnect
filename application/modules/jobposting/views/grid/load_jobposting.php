<style>
.section-line {
    border: none;
    border-bottom: 1px solid #ccc;
    margin: 10px 0;
}
h1{
    font-size: 25px;
}
</style>

<div class="col-md-12 row justify-content-center">
    <div class="col-md-12 mb-3 text-center">
        <div class="d-flex justify-content-center align-items-center">
            <div class="job-feed mr-5">
                <h1>Job Feed</h1>
            </div>
            <div class="your-job-posts">
                <h1>Your Job Posts</h1>
            </div>
        </div>
        <hr class="section-line">
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-4 pl-1" style="height: auto; ">
        <?php
        $ci = & get_instance();
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
                <a href="">
                <div class="card card-light p-3 mb-3">
                    <p href="<?php echo base_url() ?>jobposting/job_info/<?= @$job->id ?>" class="card-title font-weight-bold mb-2" style="font-size: 22px;"><?= ucwords(@$job->title) ?></p>
                    <small class="text-muted">Posted <?= $formattedTimeDiff ?></small>
                    <!-- <div class="card-tools">
                        <span class="badge job-status"><?= ucwords($job->filled) ?></span>
                        <button class="btn btn-outline" type="button" id="delete_job" data-id="<?= $job->id ?>">
                            <i class="fa fa-x"></i>
                        </button>
                    </div> -->
                    
                    <div class="card-body pb-3 pl-0">
                        <div class="card-text mb-0 text-muted description-truncate" style="max-height: 250px; overflow-y: hidden; font-size: 14px">
                            <?= ucwords(@$job->description) ?>
                        </div>
                        
                    </div>
                    <div class="card-footer p-0" style="background-color: transparent;">
                        <button type="button" class="btn btn-info btn-sm">Apply now</button>
                    </div>
                </div>
                </a>
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
    
    <div class="col-md-5" style="position: sticky; top: 0; height: calc(100vh - 150px); overflow-y: auto; padding-top: 50px;">
        <div class="card card-light p-3 mb-0">
            <div id="job-title">
            <h4 href="<?php echo base_url() ?>jobposting/job_info/<?= @$job->id ?>" class="card-title font-weight-bold mb-2" style="font-size: 22px;"><?= ucwords(@$job->title) ?></h4>
            </div>  
            <div class="button" style="background-color: transparent;">
            <button type="button" class="btn btn-info btn-sm">Apply now</button>
            </div>  
            <div class="card-body pl-0" style="max-height: calc(100% - 100px); overflow-y: auto;">
            <p><?= ucwords(@$job->description) ?></p>
            </div>
        </div>
    </div>
</div>