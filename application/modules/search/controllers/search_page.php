<?php
defined('BASEPATH') or exit('No direct script access allowed');

class search_page extends MY_Controller
{
    protected $userdata;
    protected $auth;
    private array $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
        } else {
            $this->auth = get_userdata(AUTH);
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
        $this->data['auth'] = $this->auth;

        if ($this->auth['user_type'] == 'EMPLOYER') {
            $id = $this->userdata->id;
        } else {
            $id = $this->userdata->ID;
        }

        $this->load->driver('cache');
        // Enable query caching
        $this->db->cache_on();

        $this->data['details'] = $this->userdata;
        $this->data['employees'] = $this->employee_model->get_all_employees(4);
        $this->data['employers'] = $this->employer_model->get_employers(4, $id);
        $this->data['skills'] = $this->dashboard_model->get_skill($id);
        $this->data['jobpostings'] = $this->jobposting_model->get_all_jobposts();

        $this->db->cache_off();

        $this->data['jobpost_section_view'] = $this->load->view('grid/load_jobposts', $this->data, TRUE);

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }
}