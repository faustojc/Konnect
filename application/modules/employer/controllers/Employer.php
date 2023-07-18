<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer extends MY_Controller
{
    private array $data = [];
    protected $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [
            'employer/Employer_model' => 'employer_model',
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

        $this->data['session'] = $this->session;
        $this->data['content'] = 'index';
        $this->load->view('layout', $this->data);
    }

    /** get employer list */
    public function get_employers()
    {
        $data['employers'] = $this->employer_model->get_employers();
        $data['content'] = 'grid/load_employer';
        $this->load->view('layout', $data);
    }

    /** get employer profile */
    public function profile()
    {
        $ID = $this->uri->segment(3);

        redirect('employer_profile/' . $ID, 'refresh');
    }
}
