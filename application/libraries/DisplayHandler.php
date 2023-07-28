<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DisplayHandler
{
    private CI_Controller $CI;
    private $userdata;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->userdata = get_userdata(USER);
    }

    public function updateNotification(): void
    {
        $notifications = $this->CI->Notification_model->getNotifications($this->userdata->user_id);

        displayNotifications($notifications);
    }
}
