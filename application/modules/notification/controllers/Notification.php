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
    }

    /**
     * @throws JsonException
     */
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
                echo 'data: ' . json_encode($notification, JSON_THROW_ON_ERROR) . "\n\n";

                usleep(300000);
            }

            $ids = array_map(static function ($notification) {
                return $notification->id;
            }, $newNotifications);
            $this->Notification_model->updateBatch($ids, ['is_displayed' => 1]);

            // Update the notification display from DisplayHandler
            $this->DisplayHandler->updateNotification();
        } else {
            echo json_encode([], JSON_THROW_ON_ERROR);
        }

        // Flush the output buffer
        ob_flush();
        flush();
    }

    /**
     * @throws JsonException
     */
    public function setRead(): void
    {
        $id = $this->input->get('id');
        $response = $this->Notification_model->update($id, ['is_read' => 1]);

        echo json_encode($response, JSON_THROW_ON_ERROR);
    }
}
