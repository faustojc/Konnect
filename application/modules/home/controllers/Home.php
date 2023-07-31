<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
            'employee/Employee_model' => 'employee_model',
            'employer/Employer_model' => 'employer_model',
            'jobposting/Jobposting_model' => 'jobposting_model',
            'follow/Follow_model' => 'follow_model',
        ];

        $this->load->model($model_list);
        $this->load->driver('cache');
    }

    /** load main page */
    public function index(): void
    {
        $this->data['auth'] = $this->auth;

        if ($this->auth['user_type'] == 'EMPLOYER') {
            $id = $this->userdata->id;
        } else {
            $id = $this->userdata->ID;
        }

        // Enable query caching
        $this->db->cache_on();

        $this->data['details'] = $this->userdata;
        $this->data['employees'] = $this->employee_model->get_all_employees(4);
        $this->data['employers'] = $this->employer_model->get_employers(4, $id);
        $this->data['jobpostings'] = $this->jobposting_model->get_all_jobposts();

        if ($this->auth['user_type'] == 'EMPLOYEE') {
            $this->data['skills'] = $this->EmployeeSkills_model->getEmployeeSkills($id);
            $this->data['following'] = $this->follow_model->get_following($id);
            $this->data['applicant'] = $this->Applicant_model->getJobApplied($id);

            $sortHandler = new SortHandler();
            $this->data['jobpostings'] = $sortHandler->sortEmployeeRelevantJobposts($this->data['jobpostings']);
        }

        $this->db->cache_off();


        if ($this->auth['user_type'] == 'EMPLOYER') {
            $this->data['user_display'] = $this->load->view('grid/load_employer', $this->data, TRUE);
        } else {
            $this->data['skills_section_view'] = $this->load->view('grid/dash_load_skill', $this->data, TRUE);
            $this->data['user_display'] = $this->load->view('grid/load_employee', $this->data, TRUE);
        }

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }
}
