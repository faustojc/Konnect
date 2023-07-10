<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employee_educ_service extends MY_Controller
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
            'employee_educ/service/employee_educ_services_model' => 'esModel'
        ];
        $this->load->model($model_list);
    }

    public function submit()
    {
        // $this->esModel->Fname = $this->input->post("Fname");
        // $this->esModel->Mname = $this->input->post("Mname");
        // $this->esModel->Lname = $this->input->post("Lname");
        $this->esModel->Employee_id = $this->input->post("Employee_id");
        $this->esModel->Level = $this->input->post("Level");
        $this->esModel->Title = $this->input->post("Title");
        $this->esModel->Institution = $this->input->post("Institution");
        $this->esModel->Description = $this->input->post("Description");
        $this->esModel->Start_date = $this->input->post("Start_date");
        $this->esModel->End_date = $this->input->post("End_date");
        $this->esModel->Hours = $this->input->post("Hours");

        $response = $this->esModel->submit();
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

    public function edit()
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

        $response = $this->esModel->edit($data);
        echo json_encode($response);
    }

    public function delete()
    {
        $ID = $this->input->post("ID");
        $response = $this->esModel->delete($ID);

        echo json_encode($response);
    }

}
