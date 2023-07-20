<?php if (!empty($notifications)) {
    $timeAgo = '';

    // Count all unread notifications and display the count in badge, else don't display
    $count = 0;
    foreach ($notifications as $notification) {
        if ($notification->is_read == 0) {
            ++$count;
        }

        $currentTime = new DateTime();
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
    } ?>

    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <?php if ($count != 0): ?>
            <span class="badge badge-warning navbar-badge"><?= $count ?></span>
        <?php endif; ?>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>

        <?php foreach ($notifications as $notification): ?>
            <div class="dropdown-item">
                <div class="d-flex">
                    <i class="fas fa-envelope mr-2"></i>
                    <div class="bg-gray-light">
                        <strong><?= $notification->title ?></strong>
                        <div><?= $notification->message ?></div>
                    </div>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="notificationMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notificationMenu">
                                <button class="dropdown-item delete-notification" data-id="<?= $notification->id ?>">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-muted text-sm"><?= timeAgo($notification->timestamp) ?></span>
            </div>
        <?php endforeach; ?>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
<?php } else { ?>
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">No Notifications</span>
    </div>
<?php } ?>
