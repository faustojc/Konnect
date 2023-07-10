<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_service extends MY_Controller
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
			'employee/service/Employee_services_model' => 'esModel'
		];
		$this->load->model($model_list);
	}

	public function register()
	{
		$this->esModel->Fname = $this->input->post("Fname");
		$this->esModel->Mname = $this->input->post("Mname");
		$this->esModel->Lname = $this->input->post("Lname");
		$this->esModel->Cnum = $this->input->post("Cnum");
		$this->esModel->Address = $this->input->post("Address");
		$this->esModel->Gender = $this->input->post("Gender");
		$this->esModel->Cstat = $this->input->post("Cstat");
		$this->esModel->Religion = $this->input->post("Religion");
		$this->esModel->Bday = $this->input->post("Bday");
		$this->esModel->Email = $this->input->post("Email");
		$this->esModel->City = $this->input->post("City");
		$this->esModel->Barangay = $this->input->post("Barangay");
		$this->esModel->Title = $this->input->post("Title");
		$this->esModel->SSS = $this->input->post("SSS");
		$this->esModel->Tin = $this->input->post("Tin");
		$this->esModel->Phil_health = $this->input->post("Phil_health");
		$this->esModel->Pag_ibig = $this->input->post("Pag_ibig");


		$response = $this->esModel->register();
		echo json_encode($response);

	}

	public function update()
	{
		$data = null;

		$file['upload_path'] = './assets/images/employee/profile_pic/';
		$file['allowed_types'] = 'jpg|png|jpeg|JPG';
		$file['max_size'] = '2000';

		$this->load->library('upload', $file);

		if (!$this->upload->do_upload('Employee_image')) {
			$response['file_error'] = $this->upload->error_msg;
		} else {
			$data = $this->upload->data();
			$response['file_success'] = 'File ' . $data['file_name'] . ' uploaded successfully';
		}

		if (isset($data)) {
			$this->esModel->Employee_image = $data['file_name'];
		}

		$this->esModel->employee_ID = $this->input->post("employee_ID");
		$this->esModel->Fname = $this->input->post("Fname");
		$this->esModel->Mname = $this->input->post("Mname");
		$this->esModel->Lname = $this->input->post("Lname");
		$this->esModel->Cnum = $this->input->post("Cnum");
		$this->esModel->Address = $this->input->post("Address");
		$this->esModel->Title = $this->input->post("Title");
		$this->esModel->Gender = $this->input->post("Gender");
		$this->esModel->Cstat = $this->input->post("Cstat");
		$this->esModel->Religion = $this->input->post("Religion");
		$this->esModel->Bday = $this->input->post("Bday");
		$this->esModel->Email = $this->input->post("Email");
		$this->esModel->City = $this->input->post("City");
		$this->esModel->Barangay = $this->input->post("Barangay");
		$this->esModel->SSS = $this->input->post("SSS");
		$this->esModel->Tin = $this->input->post("Tin");
		$this->esModel->Phil_health = $this->input->post("Phil_health");
		$this->esModel->Pag_ibig = $this->input->post("Pag_ibig");
		



		$response = $this->esModel->update();
		echo json_encode($response);
		// $info = array(
		// 	'ID' =>  $this->input->post("employee_ID"),
		// 	'Fname' =>  $this->input->post("Fname"),
		//     'Mname' =>  $this->input->post("Mname"),
		//     'Lname' =>  $this->input->post("Lname"),
		//     'Cnum' =>  $this->input->post("Cnum"),
		//     'Address' =>  $this->input->post("Address"),
		// 	'Title' =>  $this->input->post("Title"),
		//     'Gender' =>  $this->input->post("Gender"),
		//     'Cstat' =>  $this->input->post("Cstat"),
		//     'Religion' =>  $this->input->post("Religion"),
		//     'Bday' =>  $this->input->post("Bday"),
		// 	'Email' =>  $this->input->post("Email"),
		//     'City' =>  $this->input->post("City"),
		//     'Barangay' =>  $this->input->post("Barangay"),
		//     'SSS' =>  $this->input->post("SSS"),
		//     'Tin' =>  $this->input->post("Tin"),
		// 	'Phil_health' =>  $this->input->post("Phil_health"),
		//     'Pag_ibig' =>  $this->input->post("Pag_ibig"),
		//     'Employee_image' =>  isset($data) ? $data['file_name'] : null,
		// );


	}

	public function search_employee()
	{
		$this->esModel->search_text = $this->input->post("search_text");

		$this->data['details'] = $this->esModel->search_employee();
		$this->data['content'] = 'grid/load_employee';
		$this->load->view('layout', $this->data);
	}




}