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

        $id = $this->input->get('id');

        $this->load->driver('cache');

        // Enable query caching
        $this->db->cache_on();
        
        $this->data['details'] = $this->userdata;
        $this->data['employees'] = $this->employee_model->get_all_employees(4);
        $this->data['employers'] = $this->employer_model->get_employers(4, $id);

        if ($this->user_type == 'EMPLOYER') {
            $this->data['user_display'] = $this->load->view('grid/load_employer', $this->data, true);
        } else {
            $this->data['user_display'] = $this->load->view('grid/load_employee', $this->data, true);
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

        $this->data['employers_follow_section_view'] = $employers_follow_section_view;
        $this->data['employees_follow_section_view'] = $employees_follow_section_view;

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }
}
