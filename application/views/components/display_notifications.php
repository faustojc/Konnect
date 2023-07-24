<?php if (!empty($notifications)) {
    // Count all unread notifications and display the count in badge, else don't display
    $count = 0;

    foreach ($notifications as $notification) {
        if ($notification->is_read == 0) {
            ++$count;
        }
    }

    function imageExists($url): bool
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode == 200;
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

            $image = base_url() . 'assets/images/employee/profile_pic/' . $notification->userImage;

            if (!imageExists($image)) {
                $image = base_url() . 'assets/images/employer/profile_pic/' . $notification->userImage;
            }

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
            <div class="dropdown-item p-2 <?= ($notification->is_read == 0) ? 'bg-gray-light' : ''; ?>" style="max-height: 100px; overflow-y: hidden">
                <a href="<?= base_url() . $notification->link ?>" class="d-flex align-items-center text-decoration-none text-dark">
                    <img class="img-fluid rounded-circle mr-2"
                         src="<?= $image ?>"
                         alt="<?= $notification->userName ?>"
                         style="width: 70px; height: 50px; object-fit: cover;"
                    >
                    <div>
                        <p class="mb-0 d-block text-truncate"><?= $notification->message ?></p>
                        <small class="text-muted"><?= $timeAgo ?></small>
                    </div>
                </a>
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
