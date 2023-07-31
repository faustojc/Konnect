<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);

        $this->load->model('follow/Follow_model');
    }

    /**
     * @throws JsonException
     */
    public function follow(): void
    {
        $data = [
            'employee_id' => $this->userdata->ID,
            'employer_id' => $this->input->post('employer_id'),
        ];

        $following = $this->Follow_model->get_following($data['employee_id']);

        foreach ($following as $follow) {
            if ($follow->employer_id == $data['employer_id'] && $follow->employee_id == $data['employee_id']) {
                $this->Follow_model->delete($data);

                echo json_encode(['status' => 'unfollowed'], JSON_THROW_ON_ERROR);
                return;
            }
        }

        $this->Follow_model->save($data);
        echo json_encode(['status' => 'followed'], JSON_THROW_ON_ERROR);
    }

    public function get_following($id)
    {
        return $this->Follow_model->get_following($id);
    }

    public function get_followers($id)
    {
        return $this->Follow_model->get_followers($id);
    }
}
