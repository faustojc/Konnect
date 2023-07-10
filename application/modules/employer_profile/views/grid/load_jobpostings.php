<?php
if (!empty($jobpostings)) {
    foreach ($jobpostings as $index => $job) {
        $datePosted = strtotime($job->date_posted);
        $timeDifference = time() - $datePosted;
        $timeAgo = "";

        if ($timeDifference < 60) {
            $timeAgo = "Less than a minute ago";
        } elseif ($timeDifference < 3600) {
            $minutesAgo = floor($timeDifference / 60);
            $timeAgo = $minutesAgo . " mins ago";
        } elseif ($timeDifference < 86400) {
            $hoursAgo = floor($timeDifference / 3600);
            $timeAgo = $hoursAgo . ($hoursAgo == 1 ? " hr ago" : " hrs ago");
        } elseif ($timeDifference < 604800) {
            $daysAgo = floor($timeDifference / 86400);
            $timeAgo = $daysAgo . ($daysAgo == 1 ? " day ago" : " days ago");
        } elseif ($timeDifference < 2592000) {
            $weeksAgo = floor($timeDifference / 604800);
            $timeAgo = $weeksAgo . ($weeksAgo == 1 ? " week ago" : " weeks ago");
        } else {
            $monthsAgo = floor($timeDifference / 2592000);
            $timeAgo = $monthsAgo . ($monthsAgo == 1 ? " month ago" : " months ago");
        }
        ?>

        <div class="card m-0">
            <div class="card-header px-3 py-2" id="job<?= $index ?>">
                <div class="mb-0">
                    <div class="row" data-toggle="collapse" data-target="#collapse<?= $index ?>" aria-expanded="false" aria-controls="collapse<?= $index ?>" role="button">
                        <div class="col-md-9 d-flex align-items-center justify-content-between">
                            <span class="font-weight-bold text-dark text-break"><?= ucwords($job->title) ?></span>
                            <span class="ml-2 badge status "><?= $job->filled ?></span>
                        </div>
                        <div class="col-md-3" style="vertical-align: middle">
                            <p class="m-0"><?= $timeAgo ?> at</p>
                            <span class="text-muted"><?= $job->date_posted ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="collapse<?= $index ?>" class="collapse bg-gray-light" aria-labelledby="job<?= $index ?>" data-parent="#load_jobpostings">
                <div class="card-body">
                    <?= $job->description ?>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    ?>
    <div class="jumbotron m-0">
        <div class="container">
            <h1 class="display-4">No Job postings Found</h1>
            <p class="lead">We can't find the job posted that you are looking for or there are no jobs posted.</p>
        </div>
    </div>
    <?php
}
?>
