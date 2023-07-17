<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employment_service extends MY_Controller
{
    protected $session;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'employment/service/Employment_services_model' => 'esModel'
        ];
        $this->load->model($model_list);
    }

    public function save()
    {
        $data = array(
            'employee_id' => $this->input->post("employee_id"),
            'employer_id' => $this->input->post("employer_id"),
            'position' => $this->input->post("position"),
            'start_date' => $this->input->post("start_date"),
            'end_date' => $this->input->post("end_date"),
            'status' => $this->input->post("status"),
            'rating' => $this->input->post("rating"),
            'show_status' => $this->input->post("show_status")
        );

        $response = $this->esModel->save($data);
        echo json_encode($response);
    }

    public function edit()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'employee_id' => $this->input->post("employee_id"),
            'employer_id' => $this->input->post("employer_id"),
            'position' => $this->input->post("position"),
            'start_date' => $this->input->post("start_date"),
            'end_date' => $this->input->post("end_date"),
            'status' => $this->input->post("status"),
            'rating' => $this->input->post("rating"),
            'show_status' => $this->input->post("show_status")
        );

        $response = $this->esModel->update($data['ID'], $data);
        echo json_encode($response);
    }

    public function delete()
    {
        $employment_id = $this->input->post("employment_id");
        $response = $this->esModel->delete($employment_id);

        echo json_encode($response);
    }
}
