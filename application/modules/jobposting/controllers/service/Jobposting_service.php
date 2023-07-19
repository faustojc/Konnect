<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting_service extends MY_Controller
{
    protected $session;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->session = (object) get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'jobposting/service/Jobposting_services_model' => 'job_service_model'
        ];
        $this->load->model($model_list);
    }

    public function save()
    {
        $info = array(
            'employer_id' => $this->input->post("employer_id"),
            'title' => $this->input->post("title"),
            'start_date' => $this->input->post("start_date"),
            'salary' => $this->input->post("salary"),
            'shift' => $this->input->post("shift"),
            'job_type' => $this->input->post("job_type"),
            'description' => $this->input->post("description"),
            'filled' => $this->input->post("filled")
        );

        var_dump($info);

        $response = $this->job_service_model->save($info);
        echo json_encode($response);
    }

    public function update()
    {
        $info = array(
            'id' => $this->input->post("id"),
            'employer_id' => $this->input->post("employer_id"),
            'title' => $this->input->post("title"),
            'description' => $this->input->post("description"),
            'filled' => $this->input->post("filled")
        );

        $response = $this->job_service_model->update($info);
        echo json_encode($response);
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $response = $this->job_service_model->delete($id);

        echo json_encode($response);
    }

    public function search_jobs()
    {
        $search_text = $this->input->post("search_text");

        $this->data['details'] = $this->job_service_model->search_jobs($search_text);
        $this->data['content'] = 'grid/load_jobposting';
        $this->load->view('layout', $this->data);
    }
}