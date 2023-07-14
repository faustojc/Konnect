<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile_service extends MY_Controller
{
    protected $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'employee_profile/service/employee_profile_services_model' => 'esModel'
        ];
        $this->load->model($model_list);
    }

    public function update_introduction()
    {
        $data = array(
            'ID' => $this->input->post("ID"),
            'Introduction' => $this->input->post("Introduction")
        );

        $response = $this->esModel->update('tbl_employee', $data);
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

        $response = $this->esModel->update('tbl_training', $data);
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

        $response = $this->esModel->update('tbl_employee', $data);
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

        $response = $this->esModel->update('tbl_employee', $data);
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

        $response = $this->esModel->update('tbl_employment', $data);
        echo json_encode($response);
    }

    public function save_employment()
    {
        $data = array(
            'ID' => $this->input->post("employment_id"),
            'employee_id' => $this->input->post("employee_id"),
            'employer_id' => $this->input->post("employer_id"),
            'position' => $this->input->post("position"),
            'start_date' => $this->input->post("start_date"),
            'end_date' => $this->input->post("end_date"),
            'status' => $this->input->post("status"),
            'rating' => $this->input->post("rating"),
            'show_status' => $this->input->post("show_status")
        );

        $response = $this->esModel->update('tbl_employment', $data);
        echo json_encode($response);
    }

    public function delete_employment()
    {
        $employment_id = $this->input->post("employment_id");

        $response = $this->esModel->delete('tbl_employment', $employment_id);
        echo json_encode($response);
    }

    public function delete()
    {
        $ID = $this->input->post("ID");

        $response = $this->esModel->delete($ID);
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
            'Employee_id' => $this->input->post("Employee_id"),
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

        $response = $this->esModel->update('tbl_employee_educ', $data);
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

        $response = $this->esModel->update('tbl_employee_skill', $data);
        echo json_encode($response);
    }

    public function delete_skill()
    {
        $id = $this->input->post("skill_id");

        $response = $this->esModel->delete('tbl_employee_skill', $id);
        echo json_encode($response);
    }

    public function delete_training()
    {
        $id = $this->input->post("ID");

        $response = $this->esModel->delete('tbl_training', $id);
        echo json_encode($response);
    }
}