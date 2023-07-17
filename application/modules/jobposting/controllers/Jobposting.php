<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting extends MY_Controller
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
            'jobposting/Jobposting_model' => 'job_model',
        ];
        $this->load->model($model_list);
    }

    /** load main page */
    public function index()
    {
        $id = $this->input->get('id');

        $this->data['details'] = $this->job_model->get_employer_jobposts($id);
        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    public function get_jobpostings()
    {
        $this->data['details'] = $this->job_model->get_all_jobposts();
        $this->data['content'] = 'grid/load_jobposting';
        $this->load->view('layout', $this->data);
    }

    public function create_job()
    {
        $id = $this->input->get('id');

        $this->data['content'] = 'create_job';
        $this->load->view('layout', $this->data);
    }

    public function job_info()
    {
        $id = $this->uri->segment(3);

        $this->data['details'] = $this->job_model->job_info($id);
        $this->data['content'] = 'job_info';
        $this->load->view('layout', $this->data);
    }
}
