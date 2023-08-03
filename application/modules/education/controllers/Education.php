<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education extends MY_Controller
{


    /**
     * @var array|mixed|null
     */
    private $userdata;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);

        $this->load->model('education/Education_model');
    }

    /**
     * @throws JsonException
     */
    public function add(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['employee_id'] = $this->userdata->ID;

        $result = $this->Education_model->add($data);
        echo json_encode($result, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function update(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['employee_id'] = $this->userdata->ID;

        $result = $this->Education_model->update($data);
        echo json_encode($result, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function delete(): void
    {
        $id = $this->input->post('id');

        $result = $this->Education_model->delete($id);
        echo json_encode($result, JSON_THROW_ON_ERROR);
    }
}
