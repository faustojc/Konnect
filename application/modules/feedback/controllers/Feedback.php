<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);

        $this->load->model('employee/Employee_model');
    }

    /**
     * @throws JsonException
     */
    public function submitFeedback(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['from_user_id'] = $this->userdata->user_id;

        $result = $this->Feedback_model->add($data);

        if (!$result['has_error']) {
            echo json_encode(['status' => 'success', 'message' => $result['message']], JSON_THROW_ON_ERROR);
        } else {
            echo json_encode(['status' => 'error', 'message' => $result['message']], JSON_THROW_ON_ERROR);
        }
    }

    public function getFeedbacks(): void
    {
        $id = $this->input->get('id');

        $curr_user = $this->Employee_model->getEmployee($id, 'ID, user_id');

        if (empty($curr_user)) {
            $curr_user = $this->Employer_model->getEmployerOnly('id, user_id', $id);
        }

        $feedbacks = $this->Feedback_model->getAllUsersFeedback($curr_user->user_id);
        $is_account = $this->Auth_model->check_permission($this->userdata, $curr_user);


        load_feedback($feedbacks, $is_account);
    }
}
