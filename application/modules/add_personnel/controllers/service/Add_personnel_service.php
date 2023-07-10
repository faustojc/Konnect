<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_personnel_service extends MY_Controller
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
            'add_personnel/service/Add_personnel_services_model' => 'apsModel'
        ];
        $this->load->model($model_list);
    }

    public function save()
    {


        $response = $this->apsModel->save();

        echo json_encode($response);
    }

}
