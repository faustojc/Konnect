<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_service extends MY_Controller
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
            'register/service/Register_services_model' => 'registerServicesModel',
        ];
        $this->load->model($model_list);
    }

    public function save()
    {
        $response = $this->registerServicesModel->save();

        echo json_encode($response);
    }

}
