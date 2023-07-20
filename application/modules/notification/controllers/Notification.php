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

    public function notifications()
    {
        // Set the appropriate headers for SSE
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        while (!empty($this->userdata)) {
            // Check for new notifications
            $notifications = $this->Notification_model->getNotifications($this->userdata->user_id);

            // If there are any new notifications, send them to the client
            if (!empty($notifications)) {
                foreach ($notifications as $notification) {
                    if (!$notification->is_displayed && $this->userdata->user_id == $notification->user_id) {
                        echo "event: notification\n";
                        echo 'data: ' . json_encode($notification) . "\n\n";

                        // Mark the notification as displayed
                        $this->Notification_model->update($notification->id, array('is_displayed' => 1));
                    }
                    usleep(400);
                }
            }

            if (connection_aborted()) {
                break;
            }

            // Flush the output buffer
            ob_flush();
            flush();

            // Sleep for 1 second before checking for new notifications again
            sleep(1);
        }
    }

    public function sendNotification()
    {
        $data = json_decode($this->input->raw_input_stream, true);

        $result = $this->Notification_model->add($data);
        echo json_encode($result);
    }
}