<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beu_login extends MY_Controller
{
    protected $session;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->session = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'beu_login/beu_login_model' => 'blModel',
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

        $this->data['content'] = 'index';
        //index^
        $this->load->view('layout', $this->data);
    }
}
