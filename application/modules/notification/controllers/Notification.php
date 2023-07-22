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

        $model_list = array(
            'jobposting/Jobposting_model',
            'employee/Employee_model',
            'employer/Employer_model',
        );

        $this->load->model($model_list);
    }

    public function notify()
    {
        // Set the appropriate headers for SSE
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        // Check for new notifications
        $newNotifications = $this->Notification_model->getNewNotifications($this->userdata->user_id);

        // Mark the new notifications as displayed
        if (!empty($newNotifications)) {
            $ids = array_map(function ($notification) {
                return $notification->id;
            }, $newNotifications);
            $this->Notification_model->updateBatch($ids, array('is_displayed' => 1));

            foreach ($newNotifications as $notification) {
                echo "event: notification\n";
                echo 'data: ' . json_encode($notification) . "\n\n";

                usleep(300000);
            }
        } else {
            echo json_encode(array());
        }

        // Flush the output buffer
        ob_flush();
        flush();
    }

    public function viewNotifications()
    {
        $data['notifications'] = $this->Notification_model->getNotifications($this->userdata->user_id);
        $view = $this->load->view('notif_nav', $data, true);

        $this->output->set_content_type('text/html')->set_output($view);
    }
}