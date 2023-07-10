<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends MY_Controller
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
			'employee/Employee_model' => 'eModel',
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

	public function get_employee(){
		$this->data['details'] = $this->eModel->get_employee();
		$this->data['content'] = 'grid/load_employee';
		$this->load->view('layout',$this->data);
	}

	public function register(){
		// $ID = $this->uri->segment(3);
		// $this->eModel->ID = $ID;
		
		// $this->data['details'] = $this->eModel->register();
		$this->data['content'] = 'register';
		$this->load->view('layout',$this->data);
	}

	public function profile()
    {
        $ID = $this->uri->segment(3);
        $data['details'] = $this->eModel->get_employees($ID);
        $data['content'] = 'profile';
        $this->load->view('layout', $data);
    }

	public function get_educ(){
		$this->data['details'] = $this->eModel->get_educ();
		// $this->data['employee_educ'] = $this->eModel->employee_profile();
		$this->data['content'] = 'grid/load_educ';
		// $this->data['content'] = 'education';
		$this->load->view('layout',$this->data);
		// echo json_encode($this->eModel->get_employee());
	}

}
