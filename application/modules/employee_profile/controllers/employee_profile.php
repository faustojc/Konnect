<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile extends MY_Controller
{
    protected $session;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'employee_profile/employee_profile_model' => 'eModel',
            'employer/Employer_model' => 'employer_model',
            'employee/Employee_model' => 'employee_model'
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

        $this->load->driver('cache');

        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;

        $this->data['details'] = $this->eModel->get_employee($ID);
        $this->data['educ_val'] = $this->eModel->get_educations();
        $this->data['train_val'] = $this->eModel->get_training();
        $this->data['employments'] = $this->eModel->get_all_employments($ID);
        $this->data['skills'] = $this->eModel->get_skill($ID);

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
        if (!$employers_follow_section_view = $this->cache->get('employers_follow_section_view')) {
            // If not, generate the view and cache it for 10 minutes
            $this->data['employers'] = $this->employer_model->get_employers(4);
            $employers_follow_section_view = $this->load->view('grid/load_employers', $this->data, TRUE);
            $this->cache->save('employers_follow_section_view', $employers_follow_section_view, 600);
        }
        if (!$employees_follow_section_view = $this->cache->get('employees_follow_section_view')) {
            // If not, generate the view and cache it for 10 minutes
            $this->data['employees'] = $this->employee_model->get_all_employees(4, $ID);
            $employees_follow_section_view = $this->load->view('grid/load_employees', $this->data, TRUE);
            $this->cache->save('employees_follow_section_view', $employees_follow_section_view, 600);
        }

        $this->data['educations_section_view'] = $educations_section_view;
        $this->data['employments_section_view'] = $employments_section_view;
        $this->data['skills_section_view'] = $this->load->view('grid/load_skill', $this->data, TRUE);
        $this->data['training_section_view'] = $this->load->view('grid/load_training', $this->data, TRUE);
        $this->data['employers_follow_section_view'] = $employers_follow_section_view;
        $this->data['employees_follow_section_view'] = $employees_follow_section_view;

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