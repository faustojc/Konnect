<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beu_dashboard extends MY_Controller
{
    protected $userdata;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
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
        $this->load->driver('session');
        $auth = $this->session->flashdata('auth');

        if ($auth['user_type'] == 'EMPLOYEE') {
            $this->data['details'] = $this->employee_model->get_specific_employee($this->userdata->ID);
        } else if ($auth['user_type'] == 'EMPLOYER') {
            $this->data['details'] = $this->employer_model->where('id', $this->userdata->id);
        }

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }
}
