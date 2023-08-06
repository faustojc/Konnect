<style>
    .notification-message {
        /* Allow wrapping */
        white-space: normal;
        word-break: break-word;

        /* Truncate if too tall */
        max-height: 100px;
        overflow: hidden;
    }
</style>

<?php if (!empty($notifications)) {
    // Count all unread notifications and display the count in badge, else don't display
    $count = 0;

    foreach ($notifications as $notification) {
        if ($notification->is_read == 0) {
            ++$count;
        }
    }

    ?>

    <a class="nav-link" data-toggle="dropdown" role="button"> <i class="far fa-bell"></i>
        <?php if ($count != 0): ?>
            <span class="badge badge-warning navbar-badge"><?= $count ?></span>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="d-flex flex-column">
            <span class="dropdown-item dropdown-header">
                <?php if ($count != 0): ?>
                    <?= $count ?> Unread Notification<?= $count > 1 ? 's' : '' ?>
                <?php else: ?>
                    No Unread Notifications
                <?php endif; ?>
            </span>

            <?php foreach ($notifications as $notification) {
                $timeAgo = getTimeDiff($notification->date_created);

                $image = base_url() . 'assets/images/employee/profile_pic/' . $notification->userImage;

                if (!imageExists($image)) {
                    $image = base_url() . 'assets/images/employer/profile_pic/' . $notification->userImage;
                }

                ?>
                <div class="dropdown-item p-2 notification-body <?= ($notification->is_read == 0) ? 'bg-gray-light' : '' ?>" data-id="<?= $notification->id ?>" style="width: 300px; overflow-y: hidden">
                    <a href="<?= base_url() . $notification->link ?>" class="d-flex align-items-center text-decoration-none text-dark">
                        <img class="img-fluid rounded-circle flex-shrink-0 mr-2"
                             src="<?= $image ?>"
                             alt="<?= $notification->userName ?>"
                             style="width: 50px; height: 50px; object-fit: cover;"
                        >
                        <div class="ml-2 w-100">
                            <div class="notification-message text-truncate m-0" style="flex: 1"><?= $notification->message ?></div>
                            <small class="text-muted"><?= $timeAgo ?></small>
                        </div>
                    </a>
                </div>
                <div class="dropdown-divider"></div>
            <?php } ?>
        </div>

        <a href="#" class="dropdown-item dropdown-footer" id="see_all_notifications">See All Notifications</a>
    </div>
<?php } else { ?>
    <a class="nav-link" data-toggle="dropdown" href="#"> <i class="far fa-bell"></i> </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">No Notifications</span>
    </div>
<?php } ?>
