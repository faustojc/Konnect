<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_profile extends MY_Controller
{
    protected $userdata;
    protected $has_permission;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
        }

        $model_list = [
            'employer_profile/Employer_profile_model' => 'employer_profile_model',
            'employee/Employee_model' => 'employee_model',
            'employer/Employer_model' => 'employer_model',
            'jobposting/Jobposting_model' => 'jobposting_model',
            'follow/Follow_model' => 'follow_model',
        ];
        $this->load->model($model_list);

        // get the id from get request and get the user and check if the user owns the profile
        $id = $this->input->get('id');
        $currentUser = $this->employer_profile_model->get_current_employer($id);
        $this->has_permission = $this->Auth_model->check_permission($this->userdata, $currentUser);
    }

    /** load main page */
    public function index()
    {
        $id = $this->input->get('id');

        $this->data['has_permission'] = $this->has_permission;
        $this->load->driver('cache');
        // Enable query caching
        $this->db->cache_on();

        $this->data['current_employer'] = $this->employer_profile_model->get_current_employer($id);
        $this->data['current_employer']->summary = $this->load->view('grid/load_summary', $this->data, TRUE);
        $this->data['employees'] = $this->employee_model->get_all_employees(4);
        $this->data['employers'] = $this->employer_model->get_employers(4, $id);
        $this->data['jobpostings'] = $this->jobposting_model->get_employer_jobposts($id, 4);
        $this->data['followers'] = $this->follow_model->get_followers($id);

        // Disable query caching
        $this->db->cache_off();

        $this->data['jobpostings_view'] = $this->load->view('grid/load_jobpostings', $this->data, TRUE);

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function get_jobpostings()
    {
        $id = $this->input->get('id');

        $this->data['jobpostings'] = $this->jobposting_model->get_jobpostings($id, 4);
        $this->data['content'] = 'grid/load_jobpostings';
        $this->load->view('layout', $this->data);
    }

    public function edit_profile()
    {
        if (!$this->has_permission) {
            redirect(base_url() . 'employer_profile?id=' . $this->userdata->id, 'refresh');
        }

        $this->data['employer'] = $this->employer_profile_model->get_current_employer($this->userdata->id);
        $this->data['content'] = 'profile';
        $this->load->view('layout', $this->data);
    }

    public function get_summary()
    {
        $id = $this->input->get('id');

        $this->data['current_employer'] = $this->employer_profile_model->get_summary($id);
        $this->data['content'] = 'grid/load_summary';
        $this->load->view('layout', $this->data);
    }
}
