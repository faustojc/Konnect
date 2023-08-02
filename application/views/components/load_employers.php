<?php
$userdata = get_userdata(USER);
$auth = get_userdata(AUTH);

if (!empty($employers)) {
    foreach ($employers as $index => $employer) { ?>
        <div class="card card-hover my-3 sec-color" style="border-radius:15px; height:80px; text-decoration: none;">
            <div class="card-body border-0 py-2">
                <div class="widget-user-header <?php if ($index + 1 > 1) echo 'border-0'; ?>" style="padding:0.2rem;">
                    <div class="widget-user-image">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $employer->image ?>" alt="User Avatar" style="object-fit: cover; width: 3rem; height: 3rem;  border: 3px solid #fff;">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a class="card-title text-truncate text-info" href="<?php echo base_url() ?>employer_profile?id=<?= $employer->id ?>" style="margin-left: 10px;">
                            <?= ucwords($employer->employer_name) ?>
                            <?php verifyBadge($employer->user_verified); ?>
                        </a>

                        <?php if ($auth['user_type'] == 'EMPLOYEE') {
                            follow_button($employer->id, $following);
                        } ?>

                    </div>
                    <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px; margin-left: 60px">
                        <?= $employer->business_type ?>
                    </h6>
                </div>
            </div>
        </div>
        <?php
    }
}
?>

<script src="<?= base_url() ?>assets/js/follow/index.js"></script>
