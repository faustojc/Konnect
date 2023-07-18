<?php
$ci = &get_instance();
if (!empty($employments['employers'])) {
    for ($i = 0; $i < count($employments['employers']); ++$i) {
        $employer = $employments['employers'][$i];
        $employment = $employments['employments'][$i];
        ?>
        <div class="card-body card-widget widget-user-2 py-0" style="padding-bottom:0.5rem; padding-top:0.5rem;">
            <div class="row">
                <div class="col-10">
                    <ul class="timeline">
                        <li>
                            <h5 style="font-size: 18px; font-weight: 650;">
                                <a href="<?php echo base_url() ?>employer_profile?id=<?= $employer->id ?>" style="width: 250px;"><?= ucwords($employer->employer_name) ?></a>
                            </h5>
                            <h6 style="margin-bottom:0px; font-size: 16px;">
                                <?= ucwords(@$employment->position) ?>
                            </h6>
                            <p class="text-muted" style="margin:0px;">
                                <?= date("M Y", strtotime(@$employment->start_date)) ?> to
                                <?= date("M Y", strtotime(@$employment->end_date)) ?>
                            </p>
                            <?php if ($employment->show_status == 1): ?>
                                <p class="status" style="margin:0px;">
                                    <?= ucwords(@$employment->status) ?>
                                </p>
                            <?php endif; ?>
                            <div class="star-rating" style="background-image: linear-gradient(
                                to right,
                                gold 0%,
                                gold 100%,
                                transparent 33.333%,
                                transparent 100%);
                            "
                            ><?= @$employment->rating ?></div>
                        </li>
                    </ul>
                </div>

                <div class="col-2 text-right">
                    <button class="delete_btn btn-tool" id="delete_employment" data-id="<?= @$employment->ID ?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <button type="button" class="edit_btn btn-tool edit-employment" data-toggle="modal" data-target="#emp<?= $i ?>">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                </div>
            </div>
        </div>
        &nbsp;

        <!-- Modal -->
        <div class="modal fade" id="emp<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?= $i ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal<?= $i ?>">Update Employment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="px-2 py-2" id="needs-validation">
                            <input type="text" class="form-control" id="ID" name="ID" value="<?= $employment->ID ?>" hidden readonly>
                            <input type="text" class="form-control" id="employer_id" name="employer_id" value="<?= $employment->employer_id ?>" hidden readonly>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" value="<?= $employment->employee_id ?>" hidden readonly>
                            <div class="row pb-3">
                                <div class="col-md">
                                    <label for="employer_name">Employer Name</label>
                                    <input type="text" class="form-control" id="employer_name" value="<?= ucwords(@$employer->employer_name) ?>" disabled>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col-md">
                                    <label for="positionEmp">Position</label>
                                    <input type="text" class="form-control" id="position" name="position" value="<?= @$employment->position ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <label for="statusEmp">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="<?= @$employment->status ?>">
                                </div>
                            </div>

                            <div class="row px-3">
                                <div class="d-flex align-items-center">
                                    <p class="text-muted" style="font-weight: normal; font-size: 15px;">
                                        <input type="checkbox" name="inputCheck" id="show_status" value="<?= $employment->show_status ?>" <?php if ($employment->show_status == 1): ?> checked <?php endif; ?> />
                                        Show Status
                                    </p>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col-md">
                                    <label for="ratingEmp">Rating</label>
                                    <input type="number" class="form-control" id="rating" name="rating" value="<?= @$employment->rating ?>">
                                </div>
                            </div>

                            <div class="row pb-2">
                                <div class="col-md-6">
                                    <label for="startDate">Start Date</label>
                                    <input type="date" id="startDate" name="start_date" value="<?= date('Y-m-d', strtotime(@$employment->start_date)) ?>" style="width:200px;">
                                </div>

                                <div class="col-md-6">
                                    <label for="endDate">End Date</label>
                                    <input type="date" id="endDate" name="end_date" value="<?= date('Y-m-d', strtotime(@$employment->end_date)) ?>" style="width:200px;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="edit_employment" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
} else {
    ?>

    <div class="d-flex flex-column flex-grow-1 px-2 py-2">
        <div class="d-flex align-items-center mb-1">
            <h5 class=" ml-1"><i class="fa-solid fa-pen-to-square "></i> Add Employment</h5>
        </div>
        <div class="d-flex flex-column flex-grow-1">
            <p class="fs-14">Share your professional experience to establish credibility for potential employers.</p>
            <!-- <button type="button" class="btn btn-light rounded-pill edit-summary" style="border-width: 2px" data-toggle="modal" data-target="#modalAddEmp">Add Employment</button> -->
        </div>
    </div>

    <?php
} ?>

<style>
    a {
        color: black;
    }

    .edit_btn,
    .delete_btn {
        padding-top: 2px;
        border: none;
    }

    a:hover {
        color: #435861;
    }

    ul.timeline {
        list-style-type: none;
        position: relative;
        margin: 0;
    }

    ul.timeline:before {
        content: ' ';
        background: #ececec;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 143%;
        z-index: 400;
    }

    ul.timeline > li {
        margin: 0;
        padding-left: 50px;
    }

    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #0dcaf0;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }

    .star-rating::before {
    content: "⭐⭐⭐⭐⭐";
    }

    .star-rating {
        display: inline-block;
        background-clip: text;
        -webkit-background-clip: text;
        color: rgba(0, 0, 0, 0.1);
    }
</style>