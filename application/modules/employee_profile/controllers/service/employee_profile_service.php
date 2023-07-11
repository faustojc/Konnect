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

    public function update()
    {
        // echo json_encode("a00");
        $this->esModel->ID = $this->input->post("ID");
        $this->esModel->Introduction = $this->input->post("Introduction");

        $response = $this->esModel->update();
        echo json_encode($response);
    }

    public function update_address()
    {
        // echo json_encode("a00");
        $this->esModel->ID = $this->input->post("ID");
        $this->esModel->Address = $this->input->post("Address");
        $this->esModel->Barangay = $this->input->post("Barangay");
        $this->esModel->City = $this->input->post("City");

        $response = $this->esModel->update_address();
        echo json_encode($response);
    }

    public function update_id()
    {

        $this->esModel->ID = $this->input->post("ID");
        $this->esModel->SSS = $this->input->post("SSS");
        $this->esModel->Tin = $this->input->post("Tin");
        $this->esModel->Phil_health = $this->input->post("Phil_health");
        $this->esModel->Pag_ibig = $this->input->post("Pag_ibig");

        $response = $this->esModel->update_id();

        var_dump($response);

        echo json_encode($response);
    }

    public function edit_employment()
    {
        $this->esModel->employment_id = $this->input->post("ID");
        $this->esModel->employee_id = $this->input->post("employee_id");
        $this->esModel->employer_id = $this->input->post("employer_id");
        $this->esModel->position = $this->input->post("position");
        $this->esModel->start_date = $this->input->post("start_date");
        $this->esModel->end_date = $this->input->post("end_date");
        $this->esModel->status = $this->input->post("status");
        $this->esModel->rating = $this->input->post("rating");
        $this->esModel->show_status = $this->input->post("show_status");
        // $this->esModel->job_description = $this->input->post("job_description");

        $response = $this->esModel->edit_employment();
        echo json_encode($response);
    }

    public function save_employment()
    {
        $this->esModel->employment_id = $this->input->post("employment_id");
        $this->esModel->employee_id = $this->input->post("employee_id");
        $this->esModel->employer_id = $this->input->post("employer_id");
        $this->esModel->position = $this->input->post("position");
        $this->esModel->start_date = $this->input->post("start_date");
        $this->esModel->end_date = $this->input->post("end_date");
        $this->esModel->status = $this->input->post("status");
        $this->esModel->rating = $this->input->post("rating");
        $this->esModel->show_status = $this->input->post("show_status");

        $response = $this->esModel->save_employment();
        echo json_encode($response);
    }

    public function delete_employment()
    {
        $employment_id = $this->input->post("employment_id");
        $response = $this->esModel->delete_employment($employment_id);

        echo json_encode($response);
    }

    public function delete()
    {
        $ID = $this->input->post("ID");
        $response = $this->esModel->delete($ID);

        echo json_encode($response);
    }

    public function save()
    {
        $this->esModel->Employee_id = $this->input->post("Employee_id");
        $this->esModel->Level = $this->input->post("Level");
        $this->esModel->Title = $this->input->post("Title");
        $this->esModel->Institution = $this->input->post("Institution");
        $this->esModel->Description = $this->input->post("Description");
        $this->esModel->Start_date = $this->input->post("Start_date");
        $this->esModel->End_date = $this->input->post("End_date");
        $this->esModel->Hours = $this->input->post("Hours");

        $response = $this->esModel->save();
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

        $response = $this->esModel->save_training($data);
        echo json_encode($response);
    }

    public function edit_educ()
    {
        $this->esModel->ID = $this->input->post("ID");
        $this->esModel->Employee_id = $this->input->post("Employee_id");
        $this->esModel->Level = $this->input->post("Level");
        $this->esModel->Title = $this->input->post("Title");
        $this->esModel->Institution = $this->input->post("Institution");
        $this->esModel->Description = $this->input->post("Description");
        $this->esModel->Start_date = $this->input->post("Start_date");
        $this->esModel->End_date = $this->input->post("End_date");
        $this->esModel->Hours = $this->input->post("Hours");


        $response = $this->esModel->edit_educ();
        echo json_encode($response);
    }

    public function save_skill()
    {
        $this->esModel->employee_id = $this->input->post("employee_id");
        $this->esModel->skill = $this->input->post("skill");
        $this->esModel->proficiency = $this->input->post("proficiency");
        $this->esModel->years_exp = $this->input->post("years_exp");

        $response = $this->esModel->save_skill();
        echo json_encode($response);
    }

    public function edit_skill()
    {
        $this->esModel->id = $this->input->post("skill_id");
        $this->esModel->employee_id = $this->input->post("employee_id");
        $this->esModel->skill = $this->input->post("skill");
        $this->esModel->proficiency = $this->input->post("proficiency");
        $this->esModel->years_exp = $this->input->post("years_exp");

        $response = $this->esModel->edit_skill();
        echo json_encode($response);
        // echo json_encode($this->esModel->id);
    }

    public function delete_training()
    {
        $id = $this->input->post("ID");

        $response = $this->esModel->delete_training($id);
        echo json_encode($response);
    }

    // public function edit_skill()
    // {
    // 	$info = array(
    // 		'skill_id' => $this->input->post("id"),
    // 		'employee_id' => $this->input->post("employee_id")

    // 	);

    // 	$this->esModel->employee_id = $this->input->post("employee_id");
    // 	$this->esModel->id = $this->input->post("id");
    // 	$this->esModel->skill = $this->input->post("skill");
    // 	$this->esModel->proficiency = $this->input->post("proficiency");
    // 	$this->esModel->years_exp = $this->input->post("years_exp");

    // 	// $this->esModel->job_description = $this->input->post("job_description");
    // 	// $this->esModel->show_status = $this->input->post("show_status");

    // 	$response = $this->esModel->edit_skill();


    // 	echo json_encode($response);
    // }


}