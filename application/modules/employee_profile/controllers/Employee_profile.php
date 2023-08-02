<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile extends MY_Controller
{
    protected $userdata;
    protected array $auth;
    protected $has_permission;
    private $current_user;
    private array $data = [];
    private $curr_id;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
        } else {
            $this->auth = (array)$this->Auth_model->get_auth($this->userdata->user_id);
        }

        if ($this->auth['user_type'] == 'EMPLOYEE') {
            $this->curr_id = $this->userdata->ID;
        } else {
            $this->curr_id = $this->userdata->id;
        }

        $model_list = [
            'employee_profile/Employee_profile_model' => 'eModel',
            'employee/Employee_model' => 'employee_model',
            'follow/Follow_model' => 'follow_model',
            'education/Education_model' => 'education_model',
        ];
        $this->load->model($model_list);

        $ID = $this->input->get('id');
        if (!empty($ID) && empty($this->current_user)) {
            $this->current_user = $this->employee_model->getEmployee($ID);
            $this->data['curr_auth'] = (array)$this->Auth_model->get_auth($this->current_user->user_id);

            set_userdata('current_user', $this->current_user);
            set_userdata('curr_auth', $this->data['curr_auth']);
        } else {
            $this->current_user = get_userdata('current_user');
            $this->data['curr_auth'] = get_userdata('curr_auth');
        }

        $this->has_permission = $this->Auth_model->check_permission($this->userdata, $this->current_user);
        $this->data['userdata'] = $this->userdata;
    }

    /** load main page */
    public function index(): void
    {
        $this->data['has_permission'] = $this->has_permission;
        $this->data['auth'] = $this->auth;
        $this->data['user_id'] = $this->current_user->user_id;

        $ID = $this->input->get('id');

        $this->load->driver('cache');
        $this->db->cache_on();

        $this->data['details'] = $this->eModel->get_employee($ID);
        $this->data['educations'] = $this->education_model->getEmployeeEducations($ID);
        $this->data['train_val'] = $this->eModel->get_training();
        $this->data['employments'] = $this->Employed_model->getEmployeeEmployed($ID);
        $this->data['skills'] = $this->eModel->get_skill($ID);
        $this->data['employers'] = $this->Employer_model->get_employers(4);
        $this->data['employees'] = $this->employee_model->get_all_employees(4, $ID);
        $this->data['feedbacks'] = $this->Feedback_model->getAllUsersFeedback($this->current_user->user_id);

        if ($this->has_permission) {
            $this->data['following'] = $this->follow_model->get_following($this->userdata->ID);
        } else {
            $this->data['following'] = $this->follow_model->get_following($ID);
        }

        $this->data['current_following'] = $this->follow_model->get_following($this->curr_id);

        $this->db->cache_off();

        $this->data['educations_section_view'] = $this->load->view('grid/load_educations', $this->data, TRUE);
        $this->data['employments_section_view'] = $this->load->view('grid/load_employments', $this->data, TRUE);
        $this->data['skills_section_view'] = $this->load->view('grid/load_skill', $this->data, TRUE);
        $this->data['training_section_view'] = $this->load->view('grid/load_training', $this->data, TRUE);

        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function getIntro(): void
    {
        $this->data['has_permission'] = $this->has_permission;
        $intro = $this->employee_model->getEmployee($this->current_user->ID, 'Introduction');

        echo $intro->Introduction;
    }

    public function getEducations(): void
    {
        $this->data['has_permission'] = $this->has_permission;
        $this->data['educations'] = $this->education_model->getEmployeeEducations($this->current_user->ID);
        $this->data['content'] = 'grid/load_educations';
        $this->load->view('layout', $this->data);
    }

    public function getEmployments(): void
    {
        $this->data['has_permission'] = $this->has_permission;
        $this->data['employments'] = $this->Employed_model->getEmployeeEmployed($this->current_user->ID);
        $this->data['content'] = 'grid/load_employments';
        $this->load->view('layout', $this->data);
    }

    public function getSkills(): void
    {
        $this->data['has_permission'] = $this->has_permission;
        $this->data['skills'] = $this->EmployeeSkills_model->getEmployeeSkills($this->current_user->ID);
        $this->data['content'] = 'grid/load_skill';
        $this->load->view('layout', $this->data);
    }

    public function edit(): void
    {
        $this->data['employee'] = $this->employee_model->getEmployee($this->userdata->ID);
        $this->data['auth'] = $this->auth;

        $this->data['content'] = 'edit';
        $this->load->view('layout', $this->data);
    }

    // ------------------ LEGACY CODES ------------------

    public function get_training()
    {
        $ID = $this->uri->segment(3);
        $this->eModel->ID = $ID;

        $this->data['train_val'] = $this->eModel->get_training();
        $this->data['content'] = 'grid/load_training';
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
}
