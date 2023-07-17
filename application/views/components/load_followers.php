<div class="card card-white">
    <div class="card-header">
        <h3 class="card-title fw-500">Followers</h3>
    </div>

    <div class="row">
        <!-- follower -->
        <?php foreach ($followers as $follower) { ?>
            <div class="col-6 col-md-6">
                <div class="card-body card-widget widget-user-2">
                    <div class="widget-user-header">
                        <div class="widget-user-image">
                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $follower->employeeImage ?>" alt="User Avatar"
                                 style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                        </div>
                        <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 500;"><?= $follower->employeeName ?></h5>
                        <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;"><?= $follower->employeeTitle ?></h6>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
