<?php

class DisplayHandler
{
    private CI_Controller $CI;
    private $userdata;
    private $auth;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->userdata = get_userdata(USER);
        $this->auth = get_userdata(AUTH);
    }

    public function updateNotification()
    {
        $notifications = $this->CI->Notification_model->getNotifications($this->userdata->user_id);

        displayNotifications($notifications);
    }
}
