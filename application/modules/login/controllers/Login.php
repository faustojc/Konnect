<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    protected $userdata;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'login/Login_model' => 'login_model',
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

        // $this->data['session'] =  $this->session;
        unset_userdata(USER);

        $info = array(
            'email' => $this->input->post("email"),
            'password' => $this->input->post("password"),
        );

        if (empty($info['username']) || empty($info['password'])) {
            $this->data['content'] = 'login';
            $this->load->view('layout', $this->data);
        } else {
            $response = $this->login_model->authentication($info);

            $this->load->library('session');
            if (!$response['has_error']) {
                $this->session->set_flashdata('auth', $info);

                redirect(base_url() . 'beu_dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('error_message', $response['message']);

                redirect(base_url() . 'login', 'refresh');
            }
        }
    }

    public function login()
    {
        $this->data['content'] = 'login';
        $this->load->view('layout', $this->data);
    }
}
