<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting_service extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);


        $model_list = [
            'jobposting/service/Jobposting_services_model' => 'job_service_model',
            'jobposting/Jobposting_model',
            'employer/Employer_model' => 'employer_model',
        ];
        $this->load->model($model_list);
    }

    /**
     * @throws JsonException
     */
    public function postJob(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['employer_id'] = $this->userdata->id;

        $response = $this->job_service_model->save($data);
        $data = $this->Jobposting_model->job_info($response['id']);

        if (!$response['has_error']) {
            displayJobpost($data);
        } else {
            echo json_encode($response, JSON_THROW_ON_ERROR);
        }
    }

    /**
     * @throws JsonException
     */
    public function save(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['employer_id'] = $this->userdata->id;

        $response = $this->job_service_model->save($data);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function update(): void
    {
        $data = $this->input->post(NULL, TRUE);
        $data['employer_id'] = $this->userdata->id;

        $response = $this->job_service_model->update($data);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }


    /**
     * @throws JsonException
     */
    public function delete(): void
    {
        $id = $this->input->post("id");
        $response = $this->job_service_model->delete($id);

        echo json_encode($response, JSON_THROW_ON_ERROR);
    }
}
