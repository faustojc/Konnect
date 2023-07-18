<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile extends MY_Controller
{
    protected $userdata;
    protected $auth;
    protected $has_permission;
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
            'employee_profile/employee_profile_model' => 'eModel',
            'employer/Employer_model' => 'employer_model',
            'employee/Employee_model' => 'employee_model',
            'follow/Follow_model' => 'follow_model',
        ];
        $this->load->model($model_list);

        $ID = $this->uri->segment(3);
        $currentUser = $this->eModel->get_employee($ID);
        $this->has_permission = $this->Auth_model->check_permission($this->userdata, $currentUser);
    }

    /** load main page */
    public function index()
    {
        $this->data['has_permission'] = $this->has_permission;

        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;

        $this->load->driver('cache');
        $this->db->cache_on();

        $this->data['details'] = $this->eModel->get_employee($ID);
        $this->data['educ_val'] = $this->eModel->get_educations();
        $this->data['train_val'] = $this->eModel->get_training();
        $this->data['employments'] = $this->eModel->get_all_employments($ID);
        $this->data['skills'] = $this->eModel->get_skill($ID);
        $this->data['employers'] = $this->employer_model->get_employers(4);
        $this->data['employees'] = $this->employee_model->get_all_employees(4, $ID);
        $this->data['following'] = $this->follow_model->get_following($ID);

        $this->db->cache_off();

        if (!$educations_section_view = $this->cache->get('educations_section_view')) {
            // If not, generate the view and cache it for 10 minutes
            $educations_section_view = $this->load->view('grid/load_educations', $this->data, TRUE);
            $this->cache->save('educations_section_view', $educations_section_view, 600);
        }
        if (!$employments_section_view = $this->cache->get('employments_section_view')) {
            // If not, generate the view and cache it for 10 minutes
            $employments_section_view = $this->load->view('grid/load_employments', $this->data, TRUE);
            $this->cache->save('employments_section_view', $employments_section_view, 600);
        }

        $this->data['educations_section_view'] = $educations_section_view;
        $this->data['employments_section_view'] = $employments_section_view;
        $this->data['skills_section_view'] = $this->load->view('grid/load_skill', $this->data, TRUE);
        $this->data['training_section_view'] = $this->load->view('grid/load_training', $this->data, TRUE);

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function get_educations()
    {
        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;

        $this->data['educ_val'] = $this->eModel->get_educations();
        $this->data['content'] = 'grid/load_educations';
        $this->load->view('layout', $this->data);
    }

    public function get_training()
    {
        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;


        $this->data['train_val'] = $this->eModel->get_training();
        $this->data['content'] = 'grid/load_training';
        $this->load->view('layout', $this->data);
    }

    public function get_all_employments()
    {
        $ID = $this->uri->segment(3);

        $this->data['employments'] = $this->eModel->get_all_employments($ID);
        $this->data['content'] = 'grid/load_employments';
        $this->load->view('layout', $this->data);
    }

    public function get_skill()
    {
        $ID = $this->uri->segment(3);

        $this->data['skills'] = $this->eModel->get_skill($ID);
        $this->data['content'] = 'grid/load_skill';
        $this->load->view('layout', $this->data);
    }

    // Employee Education Section

    public function edit()
    {
        $ID = $this->input->get('id');

        $this->data['employee'] = $this->eModel->get_employee($ID);
        $this->data['content'] = 'edit';
        $this->load->view('layout', $this->data);
    }

    public function add_skill()
    {
        $ID = $this->uri->segment(3);

        $this->data['details'] = $this->eModel->get_skill($ID);
        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function edit_skill()
    {
        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;

        $this->data['details'] = $this->eModel->edit_skill();
        $this->data['content'] = 'edit_skill';
        $this->load->view('layout', $this->data);
    }
    // /Employee Education Section

    // Training

    public function add_employee_educ()
    {
        $this->data['details'] = $this->eModel->get_employees();
        $this->data['content'] = 'education';
        $this->load->view('layout', $this->data);
    }

    public function add_employee_train()
    {
        $this->data['details'] = $this->eModel->get_employees();
        $this->data['content'] = 'education';
        $this->load->view('layout', $this->data);
    }

    public function training_edit()
    {

        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;

        $this->data['train_val'] = $this->eModel->education_edit();
        $this->data['content'] = 'education_edit';
        $this->load->view('layout', $this->data);
    }

    // /Training

    public function education_edit()
    {

        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;

        $this->data['educ_val'] = $this->eModel->education_edit();
        $this->data['content'] = 'education_edit';
        $this->load->view('layout', $this->data);
    }

    public function edit_employment()
    {
        $ID = $this->uri->segment(3);

        $data['details'] = $this->eModel->get_employment($ID);
        $data['content'] = 'grid/load_employments';
        $this->load->view('layout', $data);
    }
}