<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile_service extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        $model_list = [
            'employee_profile/service/employee_profile_services_model' => 'esModel',
            'employee/Employee_model',
        ];
        $this->load->model($model_list);
    }

    /**
     * @throws JsonException
     */
    public function update_profile(): void
    {
        $img = NULL;

        $file['upload_path'] = './assets/images/employee/profile_pic/';
        $file['allowed_types'] = 'jpg|png|jpeg|JPG';
        $file['max_size'] = '2000';

        $this->load->library('upload', $file);

        if (!$this->upload->do_upload('Employee_image')) {
            $response['file_error'] = $this->upload->error_msg;
        } else {
            $img = $this->upload->data();
            $response['file_success'] = 'File ' . $img['file_name'] . ' uploaded successfully';
        }

        $data = $this->input->post();

        if (isset($img)) {
            $data['Employee_image'] = $img['file_name'];
        }

        $response = $this->Employee_model->update($this->userdata->ID, $data);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function update_introduction(): void
    {
        $data = [
            'ID' => $this->userdata->ID,
            'Introduction' => $this->input->post("Introduction"),
        ];

        $response = $this->Employee_model->update($data['ID'], $data);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function set_employment(): void
    {
        $data = $this->input->post(NULL, TRUE);

        if (isset($data['id'])) {
            $response = $this->Employment_model->update($data['id'], $data);
        } else {
            $response = $this->Employment_model->add($data);

            $employed_data = $data;
            $employed_data['employee_id'] = $this->userdata->ID;
            $employed_data['is_active'] = 0;

            $this->Employed_model->add($employed_data);
        }

        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    // ------------------ LEGACY CODES ------------------

    public function update_train()
    {
        $data = [
            'ID' => $this->input->post("ID"),
            'Employee_id' => $this->input->post("Employee_id"),
            'title' => $this->input->post("title"),
            'training_description' => $this->input->post("training_description"),
            'venue' => $this->input->post("venue"),
            'city' => $this->input->post("t_city"),
            's_date' => $this->input->post("s_date"),
            'e_date' => $this->input->post("e_date"),
            'hours' => $this->input->post("hours"),
        ];

        $response = $this->esModel->update('tbl_training', 'ID', $data['ID'], $data);
        echo json_encode($response);
    }

    public function save_training()
    {
        $data = [
            'employee_id' => $this->input->post("employee_id"),
            'title' => $this->input->post("title"),
            'training_description' => $this->input->post("training_description"),
            'venue' => $this->input->post("venue"),
            'city' => $this->input->post("city"),
            's_date' => $this->input->post("s_date"),
            'e_date' => $this->input->post("e_date"),
            'hours' => $this->input->post("hours"),
        ];

        $response = $this->esModel->save('tbl_training', $data);
        echo json_encode($response);
    }

    public function save_skill()
    {
        $data = [
            'employee_id' => $this->input->post("employee_id"),
            'skill' => $this->input->post("skill"),
            'proficiency' => $this->input->post("proficiency"),
            'years_exp' => $this->input->post("years_exp"),
        ];

        $response = $this->esModel->save('tbl_employee_skill', $data);
        echo json_encode($response);
    }

    public function edit_skill()
    {
        $data = [
            'id' => $this->input->post("skill_id"),
            'employee_id' => $this->input->post("employee_id"),
            'skill' => $this->input->post("skill"),
            'proficiency' => $this->input->post("proficiency"),
            'years_exp' => $this->input->post("years_exp"),
        ];

        $response = $this->esModel->update('tbl_employee_skill', 'id', $data['id'], $data);
        echo json_encode($response);
    }

    public function delete_skill()
    {
        $id = $this->input->post("id");

        $response = $this->esModel->delete('tbl_employee_skill', 'id', $id);
        echo json_encode($response);
    }

    public function delete_training()
    {
        $id = $this->input->post("ID");

        $response = $this->esModel->delete('tbl_training', 'ID', $id);
        echo json_encode($response);
    }
}
