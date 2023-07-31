<?php if (!empty($employers)): ?>
    <style>
        small.summary * {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: pre-wrap;
            max-height: 30px;
        }
    </style>

    <?php foreach ($employers as $employer):
        $ratings = explode(',', $employer->ratings);
        $total_followers = numberShortForm(count(explode(',', $employer->follower_ids)));
        $total_rating = number_format(array_sum($ratings) / count($ratings), 1);

        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card grow">
                <div class="card-body">
                    <div class="card-body p-2" style="border-radius: 15px;">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img class="img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $employer->image ?>" alt="<?= $employer->tradename ?>" style="border-radius:15px; object-fit: cover;">
                            </div>
                            <div class="col-9">
                                <div class="pt-0 pb-0 d-flex">
                                    <h5 class="m-0 align-middle pr-1 text-truncate">
                                        <?= ucwords($employer->tradename) ?>
                                    </h5>
                                    <?php if ($employer->is_verified == 1): ?>
                                        <i class="fa-solid fa-circle-check" style="color: #0dcaf0; scale:0.8;"></i>
                                    <?php endif; ?>
                                    <!-- <span class="badge badge-pill badge-light text-muted" style="border-radius:80px; scale:0.8; font-weight:400;">COMPANY</span> -->
                                </div>
                                <div class="p-0">
                                    <p class="px-0 text-muted mb-0" style="font-size: 11px;"><?= ucwords($employer->business_type) ?></p>
                                </div>
                                <div class="p-0">
                                    <p class="px-0 text-muted mb-0" style="font-size: 11px;">
                                        <?= ucwords($employer->city) ?>
                                    </p>
                                </div>
                                <div class="p-0 d-flex">
                                    <p class="px-0 text-dark mb-0 pr-1" style="font-size: 12px; font-weight:600;"><?= $total_followers ?></p>
                                    <p class="px-0 text-muted mb-0" style="font-size: 12px;">
                                        <?php if ($total_followers == 1) {
                                            echo 'Follower';
                                        } else {
                                            echo 'Followers';
                                        } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-12">
                                <!-- <small class="text-muted summary" style="font-size:13px; max-height: 60px">

                                </small> -->
                                <a href="<?= base_url() ?>employer_profile?id=<?= $employer->id ?>" class="btn btn-outline-info mt-1" style="border-radius:80px; width:100%;">
                                    <i class="fas fa-solid fa-user-plus"></i> View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="alert text-center">
                    <h5 class="alert-heading">No results found</h5>
                    <p class="mb-0">Try adjusting your search or filter to find what you're looking for.</p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
