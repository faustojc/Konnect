<?php
if (!empty($skills)) {
    foreach ($skills as $value) { ?>
        <div class="px-2 py-2">
            <button type="button" class="btn btn-light">
                <?= ucwords($value->skill) ?>
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