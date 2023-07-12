<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{
    protected $userdata;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'register/Register_model' => 'register_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {
        $user = array(
            'email' => $this->input->post("email"),
            'password' => $this->input->post("password"),
            'user_type' => $this->input->post("user_type"),
        );

        if (empty($user['email']) || empty($user['password'])) {
            $this->data['content'] = 'index';
            $this->load->view('layout', $this->data);
        } else {
            $info = array();

            if ($user['user_type'] == 'EMPLOYEE') {
                $info = array(
                    'Fname' => $this->input->post("Fname"),
                    'Mname' => $this->input->post("Mname"),
                    'Lname' => $this->input->post("Lname"),
                    'Cnum' => $this->input->post("Cnum"),
                    'Barangay' => $this->input->post("Barangay"),
                    'City' => $this->input->post("City"),
                    'Address' => $this->input->post("Address"),
                    'Religion' => $this->input->post('Religion'),
                    'Gender' => $this->input->post('Gender'),
                    'Cstat' => $this->input->post('Cstat'),
                    'Bday' => $this->input->post('Bday'),
                );
            } else {
                $info = array(
                    'employer_name' => $this->input->post("employer_name"),
                    'tradename' => $this->input->post("tradename"),
                    'address' => $this->input->post("address"),
                    'barangay' => $this->input->post("barangay"),
                    'city' => $this->input->post("city"),
                    'contact_number' => $this->input->post("contact_number"),
                );
            }

            $response = $this->register_model->register($info);

            if (!$response['has_error']) {
                redirect(base_url() . 'login', 'refresh');
            } else {
                echo json_encode($response);
            }
        }
    }

    public function employerForm()
    {
        $this->data['content'] = 'grid/create_employer';
        echo $this->load->view('layout', $this->data, true);
    }

    public function employeeForm()
    {
        $this->data['content'] = 'grid/create_employee';
        echo $this->load->view('layout', $this->data, true);
    }

    public function records()
    {
        echo json_encode($this->register_model->records());
    }
}
