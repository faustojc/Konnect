<?php
// $ci = & get_instance();

if (!empty($details)) {

    foreach ($details as $key => $value) {
        ?>


        <div class="col-6 py-1">
            <div class="card card-white">
                <div class="card-header">
                    <h3 class="card-title fw-500" style="font-weight:600;">
                        <?= ucwords(@$value->skill) ?>
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#skill<?= $key ?>" data-proficiency="<?= ucwords(@$value->proficiency) ?>"><i class="fa-solid fa-pen" style=""></i>
                        </button>
                    </div>
                </div>
                <div class="px-3 py-3">
                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;"><b>Proficiency:</b>
                        <?= ucwords(@$value->proficiency) ?>
                    </h6>
                    <p class="widget-user-desc mb-0 mt-0 text-muted" style="font-weight: normal; font-size: 16px;"><b>Years of Experience:</b>
                        <?= (@$value->years_exp) ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Edit Skill Modal -->
        <div class="modal fade" id="skill<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="skill<?= $key ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Edit Skill</h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool"><i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="text" id="skill_id" value="<?= @$value->id ?>" hidden>
                            <div class="form-group">
                                <label for="skill" class="col-form-label">Skill Name:</label>
                                <input type="text" class="form-control" id="skill" value="<?= @$value->skill ?>">
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
                                <input type="text" class="form-control" id="years_exp" value="<?= @$value->years_exp ?>">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn_update_skill">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>

    <div>
        <center>
            <h6 style="color:red">No Data Found.</h6>
        </center>
    </div>

<?php
}
?>