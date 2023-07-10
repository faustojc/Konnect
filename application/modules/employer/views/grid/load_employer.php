<?php
$ci = get_instance();
if (!empty($employers)) {
    foreach ($employers as $key => $employer) { ?>
        <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><?= ucwords($employer->employer_name) ?></td>
            <td><?= ucwords($employer->tradename) ?></td>
            <td><?= ucwords($employer->business_type) ?></td>
            <td><?= $employer->sss ?></td>
            <td><?= $employer->tin ?></td>
            <td>
                <a class="btn btn-danger" id="delete_employer" data-id="<?= $employer->id ?>">
                    <i class="fa fa-x"></i>
                </a>
                <a href="<?= base_url() ?>employer_profile?id=<?= $employer->id ?>" class="btn btn-info" id="redirect_to_profile">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>
        </tr>
    <?php }
} else {
    ?>
    <tr>
        <td colspan="8">
            <div style="text-align: center;"><h6 class="text-danger font-weight-bold">No Data Found.</h6></div>
        </td>
    </tr>
    <?php
}