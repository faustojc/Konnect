<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting extends MY_Controller
{
    private $userdata;
    private $auth;
    private array $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login', 'refresh');
        } else {
            $this->auth = get_userdata(AUTH);
        }

        $model_list = [
            'jobposting/Jobposting_model' => 'job_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index(): void
    {
        $this->data['auth'] = $this->auth;
        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    /**
     * @throws JsonException
     */
    public function job_info(): void
    {
        $id = $this->input->get('id');

        if ($id) {
            // check if the user is an employer, load the employer's jobpost and the selected jobpost views
            if ($this->auth['user_type'] == 'EMPLOYER') {
                $this->data['own_jobposts'] = $this->job_model->get_employer_jobposts($this->userdata->id);
                $view['jobs'] = $this->load->view('grid/employer/load_own_jobpost', $this->data, TRUE);

                $this->data['job'] = $this->job_model->job_info($id);
                $this->data['applicants'] = $this->Applicant_model->getJobApplicants($id);
                $view['selected'] = $this->load->view('grid/employer/load_own_selected_job', $this->data, TRUE);
            } else {
                // check if the user is an employee, load the employee's applied jobs and the selected applied job views
                $this->data['applied_jobs'] = $this->Applicant_model->getAppliedJobs($this->userdata->ID);
                $view['jobs'] = $this->load->view('grid/employee/load_applied_jobs', $this->data, TRUE);

                $applicant_id = $this->Applicant_model->getApplicantByJob($id, $this->userdata->ID, 'id')->id;

                $this->data['applied_job'] = $this->Applicant_model->getSelectedAppliedJob($applicant_id);
                $view['selected'] = $this->load->view('grid/employee/load_selected_applied_job', $this->data, TRUE);
            }

            $view['user_type'] = $this->auth['user_type'];
            echo json_encode($view, JSON_THROW_ON_ERROR);
        }
    }

    public function create_job(): void
    {
        $id = $this->input->get('id');

        $this->data['content'] = 'create_job';
        $this->load->view('layout', $this->data);
    }

    public function job_feed(): void
    {
        $query = $this->input->get('query');

        if (!empty($query)) {
            $this->data['details'] = $this->job_model->getJobsLike('tbl_jobposting.title', $query, 'tbl_jobposting.*, tbl_user.is_verified AS user_verified, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo');
        } else {
            $this->data['details'] = $this->job_model->get_all_jobposts();
        }

        $this->data['auth'] = $this->auth;

        if ($this->auth['user_type'] == 'EMPLOYEE') {
            $sortHandler = new SortHandler();
            $this->data['details'] = $sortHandler->sortEmployeeRelevantJobposts($this->data['details']);
            $this->data['applicant'] = $this->Applicant_model->getApplicant($this->userdata->ID);
        }

        $this->data['content'] = 'grid/load_jobposting';
        $view = $this->load->view('layout', $this->data, TRUE);

        $this->output->set_content_type('text/html')->set_output($view);
    }

    public function get_selected_job(): void
    {
        $id = $this->input->get('id');

        $this->data['job'] = $this->job_model->job_info($id);

        if ($this->auth['user_type'] == 'EMPLOYEE') {
            $this->data['applicant'] = $this->Applicant_model->getApplicant($this->userdata->ID);
        }

        $this->data['content'] = 'grid/load_selected_job';
        $view = $this->load->view('layout', $this->data, TRUE);

        $this->output->set_content_type('text/html')->set_output($view);
    }

    public function own_jobpost(): void
    {
        $query = $this->input->get('query');

        if (!empty($query)) {
            $this->data['own_jobposts'] = $this->job_model->getEmployerJobsLike('tbl_jobposting.title', $query, 'tbl_jobposting.*, tbl_user.is_verified AS user_verified, tbl_employer.id AS employer_id, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo');
        } else {
            $this->data['own_jobposts'] = $this->job_model->get_employer_jobposts($this->userdata->id);
        }

        $this->data['applicants'] = $this->Applicant_model->getEmployerApplicants($this->userdata->id);

        $this->data['content'] = 'grid/employer/load_own_jobpost';
        $view = $this->load->view('layout', $this->data, TRUE);

        $this->output->set_content_type('text/html')->set_output($view);
    }

    public function get_own_selected_job(): void
    {
        $id = $this->input->get('id');

        $this->data['job'] = $this->job_model->job_info($id);
        $this->data['applicants'] = $this->Applicant_model->getJobApplicants($id);

        $this->data['content'] = 'grid/employer/load_own_selected_job';
        $view = $this->load->view('layout', $this->data, TRUE);

        $this->output->set_content_type('text/html')->set_output($view);
    }

    public function get_applied_jobs(): void
    {
        $query = $this->input->get('query');

        if (!empty($query)) {
            $this->data['applied_jobs'] = $this->Applicant_model->getAppliedJobsLike($this->userdata->ID, 'job_title', $query);
        } else {
            $this->data['applied_jobs'] = $this->Applicant_model->getAppliedJobs($this->userdata->ID);
        }

        $this->data['content'] = 'grid/employee/load_applied_jobs';
        $view = $this->load->view('layout', $this->data, TRUE);

        $this->output->set_content_type('text/html')->set_output($view);
    }

    public function get_selected_applied_job(): void
    {
        $id = $this->input->get('id');

        $this->data['applied_job'] = $this->Applicant_model->getSelectedAppliedJob($id);
        $this->data['content'] = 'grid/employee/load_selected_applied_job';
        $view = $this->load->view('layout', $this->data, TRUE);

        $this->output->set_content_type('text/html')->set_output($view);
    }
}
