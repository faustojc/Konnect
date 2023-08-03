<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeSkills extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('employeeskills/EmployeeSkills_model');
    }

    /**
     * @throws JsonException
     */
    public function saveSkill(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['employee_id'] = $this->userdata->ID;

        $response = $this->EmployeeSkills_model->save($data);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function editSkill(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['employee_id'] = $this->userdata->ID;

        $response = $this->EmployeeSkills_model->update($data['id'], $data);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function deleteSkill(): void
    {
        $id = $this->input->post('id');

        $response = $this->EmployeeSkills_model->delete($id);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }
}
