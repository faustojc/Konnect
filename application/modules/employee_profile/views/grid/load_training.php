<?php
// $ci = & get_instance();

if (!empty($train_val)) {
    foreach ($train_val as $key => $value) { ?>
        <div class="col-6 px-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="pb-2 " style="font-weight:650;"><?= ucwords(@$value->title) ?></h5>
                    <h6 class="widget-user-desc mb-2 text-muted">Venue: <?= (@$value->venue) ?> - <?= (@$value->city) ?></h6>
                    <h6 class="widget-user-desc mb-2 text-muted">Date: <?= date("M d,Y", strtotime(@$value->s_date)) ?> - <?= date("M d,Y", strtotime(@$value->e_date)) ?></h6>
                    <h6 class="widget-user-desc mb-2 text-muted">Duration: <?= (@$value->hours) ?> hours</h6>
                    <p class="card-text text-justify"><?= (@$value->training_description) ?></p>
                    <div class="d-flex justify-content-end px-3 py-3">
                        <button class="btn btn-tool  delete" id="delete_train" data-id="<?= @$value->ID ?>">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
} else {
    ?>
    <h6 class="text-center text-danger font-weight-bold">No Data Found.</h6>
    <?php
} ?>
