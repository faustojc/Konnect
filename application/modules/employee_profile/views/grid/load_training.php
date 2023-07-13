<?php
// $ci = & get_instance();

if (!empty($train_val)) {
    foreach ($train_val as $key => $value) { ?>
        <div class="col-6 px-2">
            <div class="card training-hover">
                <div class="card-body">
                    <h5 class="pb-2 " style="font-weight:650;"><?= ucwords(@$value->title) ?></h5>
                    <h6 class="widget-user-desc mb-2 text-muted">Venue: <?= (@$value->venue) ?> - <?= (@$value->t_city) ?></h6>
                    <h6 class="widget-user-desc mb-2 text-muted">Date: <?= date("M d,Y", strtotime(@$value->s_date)) ?> - <?= date("M d,Y", strtotime(@$value->e_date)) ?></h6>
                    <h6 class="widget-user-desc mb-2 text-muted">Duration: <?= (@$value->hours) ?> hours</h6>
                    <p class="card-text text-justify"><?= (@$value->training_description) ?></p>
                    <div class="d-flex justify-content-end px-3 py-3">
                        <button class="btn btn-tool  delete" id="delete_train" data-id="<?= @$value->ID ?>">
                            <i class="fa fa-trash"></i>
                        </button>

                        <button class="btn btn-tool" data-toggle="modal" data-target="#ModlaEditTrain<?= $key ?>">
                            <i class="fa fa-pen"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="ModlaEditTrain<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="ModlaEditTrain<?= $key ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Training</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="px-2 py-2" id="needs-validation">
                            <input type="text" name="ID" value="<?= @$value->ID ?>" id="ID" hidden readonly>
                            <input type="text" name="Employee_id" value="<?= @$value->Employee_id ?>" id="Employee_id" hidden readonly>
                            <div class="row pb-3">
                                <div class="col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" name="Title" class="form-control" value="<?= @$value->title ?>" id="title" placeholder="Enter Title" required>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-md">
                                    <label for="training_description">Description</label>
                                    <div>
                                        <textarea class="form-control" value="" name="training_description" id="training_description" rows="4" placeholder="Enter Description" required><?= @$value->training_description ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <section class="pb-3">
                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label>Venue</label>
                                        <input type="text" class="form-control" value="<?= @$value->venue ?>" id="venue" name="venue" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <div>
                                            <input type="text" class="form-control" value="<?= @$value->t_city ?>" id="t_city" name="t_city" required>
                                        </div>
                                    </div>
                            </section>
                            <div class="row pb-3">
                                <div class="col-md-4">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" value="<?= @$value->s_date ?>" id="s_date" name="s_date" required>
                                </div>
                                <div class="col-md-4">
                                    <label>End Date</label>
                                    <div>
                                        <input type="date" class="form-control" value="<?= @$value->e_date ?>" id="e_date" name="e_date" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Hours</label>
                                    <input type="Number" class="form-control" id="hours" value="<?= @$value->hours ?>" name="hours" placeholder="Enter Hours" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="btn_edit_train" data-dismiss="modal">Save changes</button>
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
