<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow_service extends MY_Controller
{
    /**
     * @var array|mixed|null
     */
    private $userdata;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
        }

        $model_list = [
            'follow/service/Follow_service_model' => 'follow_service_model',
            'follow/Follow_model' => 'follow_model',
        ];

        $this->load->model($model_list);
    }

    public function follow()
    {
        $data = array(
            'employee_id' => $this->userdata->ID,
            'employer_id' => $this->input->post('employer_id'),
        );

        $following = $this->follow_model->get_following($data['employee_id']);

        foreach ($following as $follow) {
            if ($follow->employer_id == $data['employer_id'] && $follow->employee_id == $data['employee_id']) {
                $this->follow_service_model->delete($data);
                echo json_encode(['status' => 'unfollowed']);
                return;
            }
        }


        $this->follow_service_model->save($data);
        echo json_encode(['status' => 'followed']);
    }
}