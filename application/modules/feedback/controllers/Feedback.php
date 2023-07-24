<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);

        // The Feedback_model is already loaded in autoload.php
    }

    public function submitFeedback()
    {
        $data = $this->input->post();
        $data['from_user_id'] = $this->userdata->user_id;

        $result = $this->Feedback_model->add($data);

        if (!$result['has_error']) {
            echo json_encode(array('status' => 'success', 'message' => $result['message']));
        } else {
            echo json_encode(array('status' => 'error', 'message' => $result['message']));
        }
    }
}