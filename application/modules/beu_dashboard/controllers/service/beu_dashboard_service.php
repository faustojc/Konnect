<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beu_dashboard_service extends MY_Controller
{
	private $data = [];
	protected $session;
	public function __construct()
	{
		parent::__construct();
		$this->session = (object) get_userdata(USER);

		// if(is_empty_object($this->session)){
		// 	redirect(base_url().'login/authentication', 'refresh');
		// }

		$model_list = [
			'beu_dashboard/service/beu_dashboard_services_model' => 'bdsModel'
		];
		$this->load->model($model_list);
	}


	public function btn_post()
	{
		$this->bdsModel->employer_id = $this->input->post("employer_id");
		$this->bdsModel->title = $this->input->post("title");
		$this->bdsModel->description = $this->input->post("description");
		$this->bdsModel->start_date = $this->input->post("start_date");
		$this->bdsModel->filled = $this->input->post("filled");
		$this->bdsModel->salary = $this->input->post("salary");
		$this->bdsModel->shift = $this->input->post("shift");
		$this->bdsModel->job_type = $this->input->post("job_type");

		$response = $this->bdsModel->btn_post();
		echo json_encode($response);
	}





}