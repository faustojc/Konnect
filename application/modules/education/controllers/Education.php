<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education extends MY_Controller
{
    protected $session;

    public function __construct()
    {
        parent::__construct();

        $model_list = [
            'education/Education_model',
        ];
        $this->load->model($model_list);
    }

    /**
     * @throws JsonException
     */
    public function add(): void
    {
        $data = $this->input->post(NULL, TRUE);

        $result = $this->Education_model->add($data);
        echo json_encode($result, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function update(): void
    {
        $data = $this->input->post(NULL, TRUE);

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
