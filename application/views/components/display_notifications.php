<?php if (!empty($notifications)) {
    // Count all unread notifications and display the count in badge, else don't display
    $count = 0;

    foreach ($notifications as $notification) {
        if ($notification->is_read == 0) {
            ++$count;
        }
    }
    ?>

    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <?php if ($count != 0): ?>
            <span class="badge badge-warning navbar-badge"><?= $count ?></span>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">
            <?php if ($count != 0): ?>
                <?= $count ?> Unread Notification<?= $count > 1 ? 's' : '' ?>
            <?php else: ?>
                No Unread Notifications
            <?php endif; ?>
        </span>

        <?php foreach ($notifications as $notification) {
            $timeAgo = '';

            $currentTime = new DateTime();
            $diff = null;
            try {
                $diff = $currentTime->diff(new DateTime($notification->date_created));
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $minutes = $diff->i;
            $hours = $diff->h;
            $days = $diff->d;

            if ($minutes < 60) {
                $timeAgo = $minutes . "min";
            } else if ($hours < 24) {
                $timeAgo = $hours . "hr";
            } else {
                $timeAgo = $days . "day";
            }
            ?>
            <div class="dropdown-item d-flex align-items-center p-3" style="max-height: 100px; overflow-y: hidden">
                <img class="img-fluid rounded-circle mr-2"
                     src="<?= base_url() ?>assets/images/<?= $user_type == 'EMPLOYER' ? 'employer' : 'employee' ?>/profile_pic/<?= $notification->userImage ?>"
                     alt="<?= $notification->userName ?>"
                     width="30"
                >
                <div>
                    <p class="mb-0 d-block text-truncate"><?= $notification->message ?></p>
                    <small class="text-muted"><?= $timeAgo ?></small>
                </div>
            </div>
            <div class="dropdown-divider"></div>
        <?php } ?>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer" id="see_all_notifications">See All Notifications</a>
    </div>
<?php } else { ?>
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">No Notifications</span>
    </div>
<?php } ?>
