<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends MY_Controller
{
    private array $data = [];
    protected $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        $model_list = [
            'employee/Employee_model' => 'eModel',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {

        // $this->data['session'] =  $this->session;
        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

}
