<?php
// $ci = & get_instance();
if (!empty($educ_val)) {
    foreach ($educ_val as $key => $value) { ?>
        <div class="card-body card-widget widget-user-2 border-top">
            <div class="row">
                <div class="col-10  ">
                    <div class="widget-user-image">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>/assets/images/Logo/Profile/blank.jpg" alt="User Avatar" style="
                              object-fit: cover;
                              min-width: 60px;
                              max-width: 60px;
                              min-height: 60px;
                              max-height: 60px;">
                    </div>
                    <!-- /.widget-user-image -->

                    <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 650;"><?= (@$value->Institution) ?></h5>
                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;"><?= (@$value->Title) ?></h6>
                    <p class="widget-user-desc mb-0 mt-0 text-muted" style="font-weight: normal; font-size: 16px;"><?= (@$value->Level) ?></p>
                    <p class="widget-user-desc mb-0 mt-1 text-muted" style="font-weight: normal; font-size: 16px;"><?= date("Y", strtotime(@$value->Start_date)) ?> - <?= date("Y", strtotime(@$value->End_date)) ?></p>
                    <p class="widget-user-desc mb-0 mt-0 text-justify" style="font-weight: normal; font-size: 16px;">
                        <span style="font-weight:500;"><?= (@$value->Description) ?>
                    </p>
                </div>

                <div class="col-2 text-right">
                    <button class="btn btn-tool  delete" id="delete_educ" data-id="<?= @$value->ID ?>">
                        <i class="fa fa-trash"></i></button>
                    <button class="btn btn-tool" data-toggle="modal" data-target="#ModalEducEdit<?= $key ?>">
                        <i class="fa fa-pen"></i></button>
                </div>

            </div>
            &nbsp;

        </div>
        <div class="modal fade" id="ModalEducEdit<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="ModalEducEdit<?= $key ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalEducEdit">Add Education</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- #Modal Education Content -->
                        <form id="needs-validation">
                            <div class="px-2 py-2">
                                <input type="text" value="<?= @$value->ID ?>" id="ID2" hidden>
                                <input type="text" value="<?= @$value->Employee_id ?>" id="Employee_id2" hidden>

                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label for="Level2">Level</label>
                                        <input type="text" class="form-control dropdown-toggle" id="Level2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Enter Level" value="<?= @$value->Level ?>">
                                        <div class="dropdown-menu level-content" aria-labelledby="Level2">
                                            <p class="dropdown-item">ELEMENTARY</p>
                                            <p class="dropdown-item">JUNIOR HIGH</p>
                                            <p class="dropdown-item">SENIOR HIGH</p>
                                            <p class="dropdown-item">COLLEGE</p>
                                            <p class="dropdown-item">UBRA</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Title</label>
                                        <input type="text" value="<?= @$value->Title ?>" class="form-control" id="Title2" placeholder="Enter Title">
                                    </div>
                                </div>


                                <section class="pb-3">
                                    <label>Institution</label>
                                    <input type="text" class="form-control" value="<?= @$value->Institution ?>" id="Institution2" placeholder="Enter Institution">
                                </section>


                                <div class="row pb-4">
                                    <div class="col-md">
                                        <label>Grade Level</label>
                                        <!-- <input type="text" class="form-control" id="Description"  placeholder="Enter Description"> -->
                                        <div>
                                            <!-- <textarea class="form-control" name="description" id="Description2" rows="4" placeholder="Enter Description"><?= @$value->Description ?></textarea> -->
                                            <input type="text" class="form-control" value="<?= @$value->Description ?>" id="Description2" placeholder="Enter ...">
                                        </div>

                                    </div>

                                </div>

                                <div class="row pb-3">
                                    <div class="col-md-4">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" id="Start_date2" name="start_date" value="<?= @$value->Start_date ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label>End Date</label>
                                        <div>
                                            <input type="date" class="form-control" id="End_date2" name="end_date" value="<?= @$value->End_date ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Hours</label>
                                        <input type="Number" class="form-control" id="Hours2" placeholder="Enter Hours" value="<?= @$value->Hours ?>">
                                    </div>
                                </div>
                                <!-- <label>Password:</label>
                            <input type="password" id="password" name="password"> -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="btn_edit_educ" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    ?>

    <div>
        <center><h6 style="color:red">No Data Found.</h6></center>
    </div>

    <?php
}
?>
