<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_service extends MY_Controller
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
			'employer/service/Employer_services_model' => 'employer_service_model'
		];
		$this->load->model($model_list);
	}

    public function save()
    {
        $this->employer_service_model->employer_name = $this->input->post('employer_name');
        $this->employer_service_model->tradename = $this->input->post('tradename');
        $this->employer_service_model->city = $this->input->post("city");
        $this->employer_service_model->barangay = $this->input->post('barangay');
        $this->employer_service_model->address = $this->input->post('address');
        $this->employer_service_model->business_type = $this->input->post('business_type');
        $this->employer_service_model->contact_number = $this->input->post('contact_number');
        $this->employer_service_model->email = $this->input->post('email');
        $this->employer_service_model->sss = $this->input->post('sss');
        $this->employer_service_model->tin = $this->input->post('tin');

        $response = $this->employer_service_model->save();
        echo json_encode($response);
    }

    public function update()
    {
        $info = array(
            'id' => $this->input->post('id'),
            'employer_name' => $this->input->post('employer_name'),
            'email' => $this->input->post('email'),
            'tradename' => $this->input->post("tradename"),
            'city' => $this->input->post('city'),
            'barangay' => $this->input->post('barangay'),
            'address' => $this->input->post('address'),
            'business_type' => $this->input->post("business_type"),
            'contact_number' => $this->input->post("contact_number"),
            'sss' => $this->input->post('sss'),
            'tin' => $this->input->post('tin')
        );

        $response = $this->employer_service_model->update($info);
        echo json_encode($response);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $response = $this->employer_service_model->delete($id);

        return json_encode($response);
    }

    public function search_employers()
    {
        $this->employer_service_model->search_text = $this->input->post("search_text");

        $this->data['employers'] = $this->employer_service_model->search_employers();
        $this->data['content'] = 'grid/load_employer';
        $this->load->view('layout', $this->data);
    }
}
