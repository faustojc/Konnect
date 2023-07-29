<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    protected $userdata;
    private array $data = [];

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
    public function index(): void
    {
        if (!empty($this->userdata)) {
            redirect(base_url() . 'beu_dashboard');
        }

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function logout(): void
    {

        $this->load->driver('cache');
        $this->db->cache_delete_all();

        unset_userdata(USER);
        unset_userdata(AUTH);

        redirect(base_url() . 'login', 'refresh');
    }

    /**
     * @throws JsonException
     */
    public function authenticate(): void
    {
        $info = [
            'email' => $this->input->post("email"),
            'password' => $this->input->post("password"),
            'user_type' => $this->input->post("user_type"),
        ];

        $response = $this->login_model->authenticate($info);

        if (!$response['has_error']) {
            set_userdata(AUTH, $info);

            echo json_encode(['redirect' => base_url() . 'beu_dashboard'], JSON_THROW_ON_ERROR);
        } else {
            echo json_encode($response, JSON_THROW_ON_ERROR);
        }
    }

    public function getChooseForm(): void
    {
        $this->data['content'] = 'grid/choose';
        $this->load->view('layout', $this->data);
    }

    public function getLoginForm(): void
    {
        $this->data['content'] = 'grid/login';
        $this->load->view('layout', $this->data);
    }
}
