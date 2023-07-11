<?php
if (!empty($employers)) {
    foreach ($employers as $index => $employer) { ?>
        <div class="widget-user-header bg-white <?php if ($index + 1 > 1) echo 'border-top'; ?>">
            <div class="widget-user-image">
                <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $employer->image ?>" alt="User Avatar" style="object-fit: cover; width: 50px; height: 50px;">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?php echo base_url() ?>employer_profile?id=<?= $employer->id ?>" class="card-title text-truncate" style="width: 250px;margin-left: 10px;"><?= ucwords($employer->employer_name) ?></a>
                <button type="button" class="btn btn-outline-info btn-sm rounded" id="follow" data-id="<?= $employer->id ?>">Follow</button>
            </div>
            <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px; margin-left: 60px">Web Developer</h6>
        </div>
    <?php }
} else {
    ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">No Employers Found</h1>
            <p class="lead">We can't find the employers that you are looking for or there are no employers available.</p>
        </div>
    </div>
    <?php
}
?>
