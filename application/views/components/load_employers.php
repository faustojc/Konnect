<?php
$user_type = get_userdata('auth')['user_type'];

if (!empty($employers)) {
    foreach ($employers as $index => $employer) {
        $followed = false;

        if ($user_type == 'EMPLOYEE' && !empty($following)) {

            foreach ($following as $follow) {
                if ($follow->employer_id == $employer->id && $follow->employee_id == $details->ID) {
                    $followed = true;
                    break;
                }
            }
        }

        ?>
        <div class="card card-hover my-3 sec-color" style="border-radius:15px; height:80px;">
            <div class="card-body border-0 py-2">
                <div class="widget-user-header <?php if ($index + 1 > 1)
                    echo 'border-0'; ?>" style="padding:0.2rem;">
                    <div class="widget-user-image">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $employer->image ?>" alt="User Avatar" style="object-fit: cover; width: 3rem; height: 3rem;  border: 3px solid #fff;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo base_url() ?>employer_profile?id=<?= $employer->id ?>" class="card-title text-truncate text-info" style="width: 250px; margin-left: 10px; "><?= ucwords($employer->employer_name) ?></a>
                        <?php if ($user_type == 'EMPLOYEE'): ?>
                            <?php if ($followed): ?>
                                <button type="button" class="btn btn-outline-success btn-sm rounded d-flex align-items-center follow" data-id="<?= $employer->id ?>">
                                    <i class="fa fa-check mr-1"></i>
                                    Followed
                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-outline-info btn-sm rounded d-flex align-items-center follow" data-id="<?= $employer->id ?>">Follow</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px; margin-left: 60px">
                        <?= $employer->business_type ?>
                    </h6>
                </div>
            </div>
        </div>
    <?php }
} ?>

<script src="<?= base_url() ?>assets/js/follow/index.js"></script>
