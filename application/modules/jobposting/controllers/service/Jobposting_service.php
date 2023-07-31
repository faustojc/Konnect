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
            'employer/Employer_model' => 'models\Employer_model',
        ];
        $this->load->model($model_list);
    }

    /**
     * @throws JsonException
     */
    public function postJob(): void
    {
        $data = $this->input->post();
        $data['employer_id'] = $this->userdata->id;

        $response = $this->job_service_model->save($data);
        $employer = $this->employer_model->getEmployerOnly('image, tradename', $this->userdata->id);

        $data['EmployerLogo'] = $employer->image;
        $data['EmployerTradename'] = $employer->tradename;
        $data['id'] = $this->db->insert_id();

        $jobpost = [
            'jobpost' => $data,
        ];

        if (!$response['has_error']) {
            $view = $this->load->view('components/load_jobpost', $jobpost, TRUE);

            $this->output->set_content_type('text/html')->set_output($view);
        } else {
            echo json_encode($response, JSON_THROW_ON_ERROR);
        }
    }

    public function save(): void
    {
        $info = $this->input->post();

        $response = $this->job_service_model->save($info);
        echo json_encode($response);
    }

    public function update(): void
    {
        $info = [
            'id' => $this->input->post("id"),
            'employer_id' => $this->input->post("employer_id"),
            'title' => $this->input->post("title"),
            'description' => $this->input->post("description"),
            'filled' => $this->input->post("filled"),
        ];

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
