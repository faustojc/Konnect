<?php
if (!empty($skills)) {
    foreach ($skills as $key => $value) { ?>
        <div class="px-2 py-2">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#view_skill<?= $key ?>">
                <?= ucwords(@$value->skill) ?>
            </button>
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