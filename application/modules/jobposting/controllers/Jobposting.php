<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting extends MY_Controller
{
    protected $userdata;
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'jobposting/Jobposting_model' => 'job_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {
        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function get_selected_job()
    {
        $id = $this->input->post('id');

        $this->data['job'] = $this->job_model->job_info($id);
        $this->data['content'] = 'grid/load_selected_job';
        echo $this->load->view('layout', $this->data, true);
    }

    public function job_info()
    {
        $id = $this->uri->segment(3);

        $this->data['details'] = $this->job_model->job_info($id);
        $this->data['content'] = 'job_info';
        $this->load->view('layout', $this->data);
    }

    public function job_feed()
    {
        $this->data['details'] = $this->job_model->get_all_jobposts();
        $this->data['content'] = 'grid/load_jobposting';
        $view = $this->load->view('layout', $this->data, true);

        $this->output->set_content_type('text/html')->set_output($view);
    }

    public function create_job()
    {
        $id = $this->input->get('id');

        $this->data['content'] = 'create_job';
        $this->load->view('layout', $this->data);
    }

    public function own_jobpost()
    {
        $this->data['details'] = $this->job_model->get_employer_jobposts($this->userdata->id);
        $this->data['content'] = 'grid/load_own_jobpost';
        $view = $this->load->view('layout', $this->data, true);

        $this->output->set_content_type('text/html')->set_output($view);
    }

    public function get_own_selected_job()
    {
        $id = $this->input->post('id');

        $this->data['job'] = $this->job_model->job_info($id);
        $this->data['content'] = 'grid/load_own_selected_job';
        echo $this->load->view('layout', $this->data, true);
    }
}
