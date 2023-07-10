<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_service extends MY_Controller
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'login/service/Login_services_model' => 'login_services_model',
        ];
        $this->load->model($model_list);
    }
}
