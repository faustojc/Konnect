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
        $info = array(
            'email' => $this->input->post("email"),
            'password' => $this->input->post("password"),
            'user_type' => $this->input->post("user_type"),
        );

        if (empty($info['email']) || empty($info['password']) || empty($info['user_type'])) {
            $this->data['content'] = 'index';
            $this->load->view('layout', $this->data);
        } else {
            $response = $this->register_model->register($info);

            if (!$response['has_error']) {
                redirect(base_url() . 'login', 'refresh');
            } else {
                $this->load->library('session');
                $this->session->set_flashdata('error_message', $response['message']);

                redirect(base_url() . 'Register', 'refresh');
            }
        }
    }

    public function create()
    {
        $this->data['content'] = 'create';
        $this->load->view('layout', $this->data);
    }
}
