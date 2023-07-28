<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
        }

        $model_list = [
            'jobposting/Jobposting_model',
            'employee/Employee_model',
            'employer/Employer_model',
        ];

        $this->load->model($model_list);
    }

    public function notify(): void
    {
        // Set the appropriate headers for SSE
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        // Check for new notifications
        $newNotifications = $this->Notification_model->getNewNotifications($this->userdata->user_id);

        // Mark the new notifications as displayed
        if (!empty($newNotifications)) {
            foreach ($newNotifications as $notification) {

                echo "event: notification\n";
                echo 'data: ' . json_encode($notification) . "\n\n";

                usleep(300000);
            }

            $ids = array_map(function ($notification) {
                return $notification->id;
            }, $newNotifications);
            $this->Notification_model->updateBatch($ids, ['is_displayed' => 1]);

            // Update the notification display from DisplayHandler
            $this->DisplayHandler->updateNotification();
        } else {
            echo json_encode([]);
        }

        // Flush the output buffer
        ob_flush();
        flush();
    }

    public function displayNotifications()
    {
        $result = $this->Notification_model->getNotifications($this->userdata->user_id);

        $data = [
            'notifications' => $result,
        ];

        $this->load->view('components/display_notifications', $data);
    }
}
