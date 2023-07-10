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
        $this->esModel->employment_id = $this->input->post("employment_id");
        $this->esModel->employee_id = $this->input->post("employee_id");
        $this->esModel->employer_id = $this->input->post("employer_id");
        $this->esModel->position = $this->input->post("position");
        $this->esModel->start_date = $this->input->post("start_date");
        $this->esModel->end_date = $this->input->post("end_date");
        $this->esModel->status = $this->input->post("status");
        $this->esModel->rating = $this->input->post("rating");
        $this->esModel->job_description = $this->input->post("job_description");
        $this->esModel->show_status = $this->input->post("show_status");

        $response = $this->esModel->save();
        echo json_encode($response);
    }

    public function edit()
    {
        $this->esModel->ID = $this->input->post("ID");
        $this->esModel->employee_id = $this->input->post("employee_id");
        $this->esModel->employer_id = $this->input->post("employer_id");
        $this->esModel->position = $this->input->post("position");
        $this->esModel->start_date = $this->input->post("start_date");
        $this->esModel->end_date = $this->input->post("end_date");
        $this->esModel->status = $this->input->post("status");
        $this->esModel->show_status = $this->input->post("show_status");
        $this->esModel->rating = $this->input->post("rating");
        
        $response = $this->esModel->edit();
        echo json_encode($response);
    }

    public function delete()
    {
        $employment_id = $this->input->post("employment_id");
        $response = $this->esModel->delete($employment_id);

        echo json_encode($response);
    }
}
