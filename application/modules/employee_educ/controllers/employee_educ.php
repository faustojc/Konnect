<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employee_educ extends MY_Controller
{
	private $data = [];
	protected $session;
	public function __construct()
	{
		parent::__construct();
		$this->session = (object)get_userdata(USER);

		// if(is_empty_object($this->session)){
		// 	redirect(base_url().'login/authentication', 'refresh');
		// }

		$model_list = [
			'employee_educ/employee_educ_model' => 'eModel',
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
		$this->data['content'] = 'index';
		$this->load->view('layout', $this->data);
	}

	

	public function add_employee_educ()
    {
		$this->data['details'] = $this->eModel->get_employees();
		$this->data['content'] = 'education';
		$this->load->view('layout',$this->data);
	}
	

    public function get_educations()
    {
        $this->data['details'] = $this->eModel->get_educations();
        $this->data['content'] = 'grid/load_educations';
        $this->load->view('layout',$this->data);
    }

	public function education_edit()
    {

		$ID = $this->uri->segment(3);
		$this->eModel->ID = $ID; 
		
		$this->data['educ_val'] = $this->eModel->education_edit();
		
		$this->data['content'] = 'education_edit';	
		// $this->data['content'] = 'education';
		
		
		$this->load->view('layout',$this->data);
	}


}
