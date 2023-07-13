<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beu_dashboard extends MY_Controller
{
    protected $userdata;
    private $user_type = '';
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
        } else {
            $this->user_type = get_userdata('auth')['user_type'];
        }

        $model_list = [
            'beu_dashboard/beu_dashboard_model' => 'dashboard_model',
            'employee/Employee_model' => 'employee_model',
            'employer/Employer_model' => 'employer_model'
        ];
        $this->load->model($model_list);
    }


    /** load main page */
    public function index()
    {
        $this->data['details'] = $this->userdata;

        if ($this->user_type == 'EMPLOYER') {
            $this->data['user_display'] = $this->load->view('grid/load_employer', $this->data, true);
        } else {
            $this->data['user_display'] = $this->load->view('grid/load_employee', $this->data, true);
        }

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }
}
