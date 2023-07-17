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
            'employer/Employer_model' => 'employer_model',
            'jobposting/Jobposting_model' => 'jobposting_model',
            'follow/Follow_model' => 'follow_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {
        $this->data['user_type'] = $this->user_type;
        if ($this->user_type == 'EMPLOYER') {
            $id = $this->userdata->id;
        } else {
            $id = $this->userdata->ID;
        }

        $this->data['user_type'] = $this->user_type;

        $this->load->driver('cache');
        // Enable query caching
        $this->db->cache_on();

        $this->data['details'] = $this->userdata;
        $this->data['employees'] = $this->employee_model->get_all_employees(4);
        $this->data['employers'] = $this->employer_model->get_employers(4, $id);
        $this->data['skills'] = $this->dashboard_model->get_skill($id);
        $this->data['jobpostings'] = $this->jobposting_model->get_all_jobposts();

        if ($this->user_type == 'EMPLOYEE') {
            $this->data['following'] = $this->follow_model->get_following($id);
        }

        $this->db->cache_off();

        $this->data['skills_section_view'] = $this->load->view('grid/dash_load_skill', $this->data, TRUE);
        $this->data['jobpost_section_view'] = $this->load->view('grid/load_jobposts', $this->data, TRUE);

        if ($this->user_type == 'EMPLOYER') {
            $this->data['user_display'] = $this->load->view('grid/load_employer', $this->data, true);
        } else {
            $this->data['user_display'] = $this->load->view('grid/load_employee', $this->data, true);
        }

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function get_skill()
    {
        $id = $this->uri->segment(3);

        $this->data['skills'] = $this->dashboard_model->get_skill($id);
        $this->data['content'] = 'grid/dash_load_skill';
        $this->load->view('layout', $this->data);
    }
}