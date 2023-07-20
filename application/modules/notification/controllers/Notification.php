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
        $notifications = $this->Notification_model->getNotifications($this->userdata->user_id);

        // Filter the notifications that have not been displayed yet
        $new_notifications = array_filter($notifications, function ($notification) {
            return !$notification->is_displayed && $this->userdata->user_id == $notification->user_id;
        });

        // Mark the new notifications as displayed
        foreach ($new_notifications as $notification) {
            echo "event: notification\n";
            echo 'data: ' . json_encode($notification) . "\n\n";

            $this->Notification_model->update($notification->id, array('is_displayed' => 1));
            usleep(400);
        }

        // Flush the output buffer
        ob_flush();
        flush();
    }


    public function sendNotification()
    {
        $data = json_decode($this->input->raw_input_stream, true);

        $result = $this->Notification_model->add($data);
        echo json_encode($result);
    }

    public function viewNotifications()
    {
        $data['notifications'] = $this->Notification_model->getNotifications($this->userdata->user_id);
        $view = $this->load->view('notif_nav', $data, true);

        $this->output->set_content_type('text/html')->set_output($view);
    }
}