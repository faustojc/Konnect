<?php
if (!empty($skills)) {
    foreach ($skills as $value) { ?>
        <div class="px-1 py-1" style="border-radius:10px; font-weight:normal;">
            <h5>
                <span class="badge badge-pill badge-secondary">
                    <?= ucwords($value->skill) ?>
                </span>
            </h5>
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