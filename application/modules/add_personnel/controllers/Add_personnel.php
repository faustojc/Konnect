<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_personnel extends MY_Controller
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
            'add_personnel/Add_personnel_Model' => 'personnel_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {
        // if (
        // 	!check_permission($this->session->User_type, ['admin'])
        // ) {
        // 	redirect(base_url() . 'landing_page', 'refresh');
        // }

        $info = array(
            'username' => $this->input->post("username"),
            'password' => $this->input->post("password"),
            'user_type' => $this->input->post("user_type"),
        );

        if (empty($info['username']) || empty($info['password']) || empty($info['user_type'])) {
            $this->data['content'] = 'index';
            $this->load->view('layout', $this->data);
        } else {
            $response = $this->personnel_model->add_personnel($info);

            if (!$response['has_error']) {
                redirect(base_url() . 'dashboard', 'refresh');
            } else {
                $this->load->library('session');
                $this->session->set_flashdata('error_message', $response['message']);

                redirect(base_url() . 'login', 'refresh');
            }
        }
    }

    public function register()
    {
        $this->data['content'] = 'login';
        $this->load->view('layout', $this->data);
    }
}
