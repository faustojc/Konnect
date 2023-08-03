<?php
if (!empty($skills)) {
    foreach ($skills as $key => $value) { ?>
        <div class="px-2 py-2">
            <button type="button" class="btn btn-light" style="border-radius:10px;" data-toggle="modal" data-target="#view_skill<?= $key ?>">
                <?= ucwords(@$value->skill) ?>
            </button>
        </div>

        <!-- View Skill Modal -->
        <div class="modal fade" id="view_skill<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="view_skill<?= $key ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 pl-4">
                                <h3 style="font-weight:600;">
                                    <?= ucwords(@$value->skill) ?>
                                </h3>
                            </div>
                            <div class="col-5">
                            </div>
                            <div class="col-1 pr-2">
                                <!-- <button type="button" id="delete_skill" class="btn btn-tool"><i class="fa-solid fa-trash"></i>
                                </button> -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                        <div class="px-3 py-3">
                            <h5 class="widget-user-desc mb-1" style="font-weight: normal; font-size: 16px;">
                                <b>Proficiency:</b>
                                <?= ucwords($value->proficiency) ?>
                            </h5>

                            <h5 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">
                                <b>Years of Experience:</b>
                                <?= ($value->years_exp) ?>
                            </h5>
                        </div>
                    </div>
                    <?php if ($has_permission): ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary delete-skill" data-dismiss="modal" data-id="<?= $value->id ?>">
                                Delete
                            </button>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#skill<?= $key ?>" data-proficiency="<?= ucwords(@$value->proficiency) ?>">
                                Edit
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if ($has_permission): ?>
            <!-- Edit Skill Modal -->
            <div class="modal fade" id="skill<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="skill<?= $key ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="text" id="id" name="id" value="<?= @$value->id ?>" hidden>
                                <div class="form-group">
                                    <label for="skill" class="col-form-label">Skill Name:</label>
                                    <input type="text" class="form-control" id="skill" name="skill" value="<?= @$value->skill ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="proficiency">Proficiency</label>

                                    <select class="form-control" style="width:100%;" name="proficiency" id="proficiency">
                                        <option value="beginner" <?php if ($value->proficiency == 'beginner')
                                            echo 'selected'; ?>>Beginner
                                        </option>
                                        <option value="intermediate" <?php if ($value->proficiency == 'intermediate')
                                            echo 'selected'; ?>>Intermediate
                                        </option>
                                        <option value="advance" <?php if ($value->proficiency == 'advance')
                                            echo 'selected'; ?>>Advance
                                        </option>
                                        <option value="expert" <?php if ($value->proficiency == 'expert')
                                            echo 'selected'; ?>>Expert
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="years_exp" class="col-form-label">Years of Experience:</label>
                                    <input type="text" class="form-control" id="years_exp" name="years_exp" value="<?= @$value->years_exp ?>" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info update-skill" data-dismiss="modal">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
    }
} else { ?>

    <div class="d-flex flex-column flex-grow-1 px-2 py-2">
        <?php if ($has_permission): ?>
            <div class="d-flex align-items-center mb-1">
                <h5 class=" ml-1"><i class="fa-solid fa-pen-to-square "></i> Add Skills</h5>
            </div>
            <div class="d-flex flex-column flex-grow-1">
                <p class="fs-14">Showcase your skills to increase visibility to potential employers or clients.</p>
                <button type="button" class="btn btn-light rounded-pill edit-summary" style="border-width: 2px" data-toggle="modal" data-target="#skill_modal">
                    Add Skill
                </button>
            </div>
        <?php else: ?>
            <div>
                This user has not added any skills yet.
            </div>
        <?php endif; ?>
    </div>

<?php } ?>
