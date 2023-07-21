<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile_service extends MY_Controller
{
    private $userdata;
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        $this->auth = get_userdata(AUTH);

        $model_list = [
            'employee_profile/service/employee_profile_services_model' => 'esModel'
        ];
        $this->load->model($model_list);
    }

    public function update_profile()
    {
        $img = null;

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

        $response = $this->esModel->update('tbl_employee', 'ID', $this->userdata->ID, $data);
        echo json_encode($response);
    }

    public function update_introduction()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'Introduction' => $this->input->post("Introduction")
        );

        $response = $this->esModel->update('tbl_employee', 'ID', $data['ID'], $data);
        echo json_encode($response);
    }

    public function update_train()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'Employee_id' => $this->input->post("Employee_id"),
            'title' => $this->input->post("title"),
            'training_description' => $this->input->post("training_description"),
            'venue' => $this->input->post("venue"),
            'city' => $this->input->post("t_city"),
            's_date' => $this->input->post("s_date"),
            'e_date' => $this->input->post("e_date"),
            'hours' => $this->input->post("hours")
        );

        $response = $this->esModel->update('tbl_training', 'ID', $data['ID'], $data);
        echo json_encode($response);
    }


    public function update_address()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'Address' => $this->input->post("Address"),
            'Barangay' => $this->input->post("Barangay"),
            'City' => $this->input->post("City")
        );

        $response = $this->esModel->update('tbl_employee', 'ID', $data['ID'], $data);
        echo json_encode($response);
    }

    public function update_id()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'SSS' => $this->input->post("SSS"),
            'Tin' => $this->input->post("Tin"),
            'Phil_health' => $this->input->post("Phil_health"),
            'Pag_ibig' => $this->input->post("Pag_ibig")
        );

        $response = $this->esModel->update('tbl_employee', 'ID', $data['ID'], $data);
        echo json_encode($response);
    }

    public function edit_employment()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'employee_id' => $this->input->post("Employee_id"),
            'employer_id' => $this->input->post("Employer_id"),
            'position' => $this->input->post("Position"),
            'start_date' => $this->input->post("Start_date"),
            'end_date' => $this->input->post("End_date"),
            'status' => $this->input->post("Status"),
            'rating' => $this->input->post("Rating"),
            'show_status' => $this->input->post("Show_status")
        );

        $response = $this->esModel->update('tbl_employment', 'ID', $data['ID'], $data);
        echo json_encode($response);
    }

    public function delete_employment()
    {
        $employment_id = $this->input->post("employment_id");

        $response = $this->esModel->delete('tbl_employment', 'ID', $employment_id);
        echo json_encode($response);
    }

    public function delete_education()
    {
        $ID = $this->input->post("ID");

        $response = $this->esModel->delete('tbl_employee_educ', 'ID', $ID);
        echo json_encode($response);
    }

    public function save_education()
    {
        $data = array(
            'Employee_id' => $this->input->post("Employee_id"),
            'Level' => $this->input->post("Level"),
            'Title' => $this->input->post("Title"),
            'Institution' => $this->input->post("Institution"),
            'Description' => $this->input->post("Description"),
            'End_date' => $this->input->post("End_date"),
            'Hours' => $this->input->post("Hours")
        );

        $response = $this->esModel->save('tbl_employee_educ', $data);
        echo json_encode($response);
    }

    public function save_training()
    {
        $data = array(
            'employee_id' => $this->input->post("employee_id"),
            'title' => $this->input->post("title"),
            'training_description' => $this->input->post("training_description"),
            'venue' => $this->input->post("venue"),
            'city' => $this->input->post("city"),
            's_date' => $this->input->post("s_date"),
            'e_date' => $this->input->post("e_date"),
            'hours' => $this->input->post("hours"),
        );

        $response = $this->esModel->save('tbl_training', $data);
        echo json_encode($response);
    }

    public function edit_educ()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'Employee_id' => $this->input->post("Employee_id"),
            'Level' => $this->input->post("Level"),
            'Title' => $this->input->post("Title"),
            'Institution' => $this->input->post("Institution"),
            'Description' => $this->input->post("Description"),
            'Start_date' => $this->input->post("Start_date"),
            'End_date' => $this->input->post("End_date"),
            'Hours' => $this->input->post("Hours")
        );

        $response = $this->esModel->update('tbl_employee_educ', 'ID', $data['ID'], $data);
        echo json_encode($response);
    }

    public function save_skill()
    {
        $data = array(
            'employee_id' => $this->input->post("employee_id"),
            'skill' => $this->input->post("skill"),
            'proficiency' => $this->input->post("proficiency"),
            'years_exp' => $this->input->post("years_exp")
        );

        $response = $this->esModel->save('tbl_employee_skill', $data);
        echo json_encode($response);
    }

    public function edit_skill()
    {
        $data = array(
            'id' => $this->input->post("skill_id"),
            'employee_id' => $this->input->post("employee_id"),
            'skill' => $this->input->post("skill"),
            'proficiency' => $this->input->post("proficiency"),
            'years_exp' => $this->input->post("years_exp")
        );

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