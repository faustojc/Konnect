<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MY_Controller
{
    private array $data = [];

    public function __construct()
    {
        parent::__construct();

        $model_list = [
            'register/Register_model' => 'register_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page
     *
     * @throws JsonException
     */
    public function index(): void
    {
        $user = [
            'email' => $this->input->post("email"),
            'password' => $this->input->post("password"),
            'user_type' => $this->input->post("user_type"),
        ];

        if (empty($user['email']) || empty($user['password'])) {
            $this->data['content'] = 'index';
            $this->load->view('layout', $this->data);
        } else {
            if ($user['user_type'] == 'EMPLOYEE') {
                $info = [
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
                    'Employee_image' => 'default.png',
                    'Email' => $user['email'],
                ];
            } else {
                $info = [
                    'employer_name' => $this->input->post("employer_name"),
                    'tradename' => $this->input->post("tradename"),
                    'business_type' => $this->input->post("business_type"),
                    'address' => $this->input->post("address"),
                    'barangay' => $this->input->post("barangay"),
                    'city' => $this->input->post("city"),
                    'contact_number' => $this->input->post("contact_number"),
                    'image' => 'default.png',
                    'email' => $user['email'],
                ];
            }

            $response = $this->register_model->register($user, $info);

            if (!$response['has_error']) {
                $this->load->driver('session');
                $this->session->set_flashdata('has_registered', TRUE);

                echo json_encode(['redirect' => base_url() . 'register/thankyou'], JSON_THROW_ON_ERROR);
            } else {
                echo json_encode($response, JSON_THROW_ON_ERROR);
            }
        }
    }

    public function thankyou(): void
    {
        $this->load->driver('session');
        if (!$this->session->flashdata('has_registered')) {
            redirect(base_url() . 'login', 'refresh');
        }

        $this->data['content'] = 'thankyou';
        $this->load->view('layout', $this->data);
    }

    public function employerForm(): void
    {
        $this->data['content'] = 'grid/create_employer';
        $this->load->view('layout', $this->data);
    }

    public function employeeForm(): void
    {
        $this->data['content'] = 'grid/create_employee';
        $this->load->view('layout', $this->data);
    }

    /**
     * @throws JsonException
     */
    public function records(): void
    {
        echo json_encode($this->register_model->records(), JSON_THROW_ON_ERROR);
    }
}
