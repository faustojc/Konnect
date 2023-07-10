<?php
    $ci = & get_instance();
    if(!empty($details)){
        foreach ($details as $job) {
            ?>
            <div class="col-md-4">
                <div class="card card-dark">
                    <div class="card-header">
                        <a href="<?php echo base_url()?>jobposting/job_info/<?=@$job->id?>" class="card-title text-truncate" style="width: 250px;"><?=ucwords(@$job->title)?></a>
                        <div class="card-tools">
                            <span class="badge job-status"><?= ucwords($job->filled) ?></span>
                            <button class="btn btn-outline" type="button" id="delete_job" data-id="<?= $job->id ?>">
                                <i class="fa fa-x"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-truncate text-wrap" style="height: 200px"><?= ucwords(@$job->description) ?></p>
                    </div>
                    <div class="card-footer">
                        Posted on <?= $job->date_posted ?>
                    </div>
                </div>
            </div>
            <?php  
        }        
    }else{
        ?>
            <div class="col">
                <div class="jumbotron">
                    <div class="container">
                        <h1 class="display-4">No Jobs Found</h1>
                        <p class="lead">We cant find the jobs that you are looking for or there are no jobs available.</p>
                    </div>
                </div>
            </div>
        <?php
    }
?>

