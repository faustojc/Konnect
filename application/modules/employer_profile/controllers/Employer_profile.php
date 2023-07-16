<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_profile extends MY_Controller
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
            'employer_profile/Employer_profile_model' => 'employer_profile_model',
            'employee/Employee_model' => 'employee_model',
            'employer/Employer_model' => 'employer_model',
            'jobposting/Jobposting_model' => 'jobposting_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {
        $id = $this->input->get('id');

        $this->load->driver('cache');

        // Enable query caching
        $this->db->cache_on();

        // Your existing queries
        $this->data['current_employer'] = $this->employer_profile_model->get_current_employer($id);
        $this->data['current_employer']->summary = $this->load->view('grid/load_summary', $this->data, TRUE);
        $this->data['employees'] = $this->employee_model->get_all_employees(4);
        $this->data['employers'] = $this->employer_model->get_employers(4, $id);
        $this->data['jobpostings'] = $this->jobposting_model->get_employer_jobposts($id, 4);

        // Disable query caching
        $this->db->cache_off();

        // Check if the views are cached
        if (!$jobpostings_view = $this->cache->get('jobpostings_view')) {
            // If not, generate the view and cache it for 10 minutes
            $jobpostings_view = $this->load->view('grid/load_jobpostings', $this->data, TRUE);
            $this->cache->save('jobpostings_view', $jobpostings_view, 600);
        }
        if (!$employers_follow_section_view = $this->cache->get('employers_follow_section_view')) {
            // If not, generate the view and cache it for 10 minutes
            $employers_follow_section_view = $this->load->view('grid/load_employers', $this->data, TRUE);
            $this->cache->save('employers_follow_section_view', $employers_follow_section_view, 600);
        }
        if (!$employees_follow_section_view = $this->cache->get('employees_follow_section_view')) {
            // If not, generate the view and cache it for 10 minutes
            $employees_follow_section_view = $this->load->view('grid/load_employees', $this->data, TRUE);
            $this->cache->save('employees_follow_section_view', $employees_follow_section_view, 600);
        }

        $this->data['jobpostings_view'] = $jobpostings_view;
        $this->data['employers_follow_section_view'] = $employers_follow_section_view;
        $this->data['employees_follow_section_view'] = $employees_follow_section_view;

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
        $id = $this->uri->segment(3);

        $this->data['employer'] = $this->employer_profile_model->get_current_employer($id);
        $this->data['content'] = 'profile';
        $this->load->view('layout', $this->data);
    }

    public function get_employees_follow_section()
    {
        $this->data['employees'] = $this->employee_model->get_all_employees(4);
        $this->data['content'] = 'grid/load_employees';
        $this->load->view('layout', $this->data);
    }

    public function get_employers_follow_section()
    {
        $id = $this->input->get('id');

        $this->data['employers'] = $this->employer_model->get_employers(4, $id);
        $this->data['content'] = 'grid/load_employers';
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
