<?php if ($auth['user_type'] == 'EMPLOYEE'):
    $userdata = get_userdata(USER);
    $auth = get_userdata(AUTH);

    $is_followed = !empty(array_filter($following, static function ($follow) use ($employer_id, $userdata) {
        return $follow->employer_id == $employer_id && $follow->employee_id == $userdata->ID;
    }));

    if ($is_followed): ?>
        <button type="button" class="btn btn-outline-success btn-sm rounded d-flex align-items-center follow" data-id="<?= $employer_id ?>">
            <i class="fa fa-check mr-1"></i>
            Following
        </button>
    <?php else: ?>
        <button type="button" class="btn btn-outline-info btn-sm rounded d-flex align-items-center follow" data-id="<?= $employer_id ?>">
            Follow
        </button>
    <?php endif; ?>
<?php endif; ?>
