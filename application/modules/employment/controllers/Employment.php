<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employment extends MY_Controller
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
			'employment/Employment_model' => 'eModel',
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

	public function get_all_employments()
    {
		$this->data['details'] = $this->eModel->get_all_employments();
		$this->data['content'] = 'grid/load_employment';
		$this->load->view('layout',$this->data);
	}

	public function edit()
    {
        $ID = $this->uri->segment(3);

        $data['details'] = $this->eModel->get_employment($ID);
        $data['content'] = 'edit';
        $this->load->view('layout', $data);
    }

	public function profile()
    {
        $data['details'] = $this->eModel->get_employees_employers();
        $data['content'] = 'profile';
        $this->load->view('layout', $data);
    }
}
