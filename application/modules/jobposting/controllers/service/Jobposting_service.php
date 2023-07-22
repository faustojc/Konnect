<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting_service extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'jobposting/service/Jobposting_services_model' => 'job_service_model',
            'employer/Employer_model' => 'employer_model',
        ];
        $this->load->model($model_list);
    }

    public function postJob()
    {
        $data = $this->input->post();
        $data['employer_id'] = $this->userdata->id;

        $response = $this->job_service_model->save($data);
        $employer_image = $this->employer_model->getEmployerOnly('image', $this->userdata->id);

        $info['jobpost'] = $data;
        $info['jobpost']['EmployerLogo'] = $employer_image->image;

        if (!$response['has_error']) {
            echo $this->load->view('components/load_jobpost', $info, true);
        } else {
            echo json_encode($response);
        }
    }

    public function save()
    {
        $info = $this->input->post();

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
}