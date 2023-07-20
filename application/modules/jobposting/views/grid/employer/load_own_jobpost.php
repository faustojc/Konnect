<style>
    h1 {
        font-size: 25px;
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
                        <?= ucwords(@$job->title) ?>
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