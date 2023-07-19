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

        $model_list = [
            'login/Login_model' => 'login_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {
        if (!empty($this->userdata)) {
            redirect(base_url() . 'beu_dashboard');
        }

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function logout()
    {
        unset_userdata(USER);
        unset_userdata(AUTH);

        redirect(base_url() . 'login', 'refresh');
    }

    public function authenticate()
    {
        $info = array(
            'email' => $this->input->post("email"),
            'password' => $this->input->post("password"),
            'user_type' => $this->input->post("user_type"),
        );

        $response = $this->login_model->authenticate($info);

        if (!$response['has_error']) {
            set_userdata(AUTH, $info);

            echo json_encode(['redirect' => base_url() . 'beu_dashboard']);
        } else {
            echo json_encode($response);
        }

    }

    public function getChooseForm()
    {
        $this->data['content'] = 'grid/choose';
        echo $this->load->view('layout', $this->data, true);
    }

    public function getLoginForm()
    {
        $this->data['content'] = 'grid/login';
        echo $this->load->view('layout', $this->data, true);
    }
}
