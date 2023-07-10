<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employer_profile_service extends MY_Controller
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
            'employer_profile/service/Employer_profile_services_model' => 'employer_profile_service_model'
        ];
        $this->load->model($model_list);
    }

    public function save()
    {
        $response = [];
        $data = null;

        $file['upload_path'] = './assets/images/employer/profile_pic/';
        $file['allowed_types'] = 'jpg|png|jpeg';
        $file['max_size'] = '2000';

        $this->load->library('upload', $file);

        if (!$this->upload->do_upload('image')) {
            $response['file_error'] = $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
            $response['file_success'] = 'File ' . $data['file_name'] . ' uploaded successfully';
        }

        $info = array(
            'employer_name' => $this->input->post('employer_name'),
            'tradename' => $this->input->post("tradename"),
            'city' => $this->input->post('city'),
            'barangay' => $this->input->post('barangay'),
            'address' => $this->input->post('address'),
            'business_type' => $this->input->post("business_type"),
            'contact_number' => $this->input->post("contact_number"),
            'email' => $this->input->post("email"),
            'sss' => $this->input->post('sss'),
            'tin' => $this->input->post('tin'),
            'image' => isset($data) ? $data['file_name'] : 'default.png',
        );

        $response[] = $this->employer_profile_service_model->save($info);
        echo json_encode($response);
    }

    public function update_summary()
    {
        $info = array(
            'id' => $this->input->post("id"),
            'summary' => $this->input->post('summary'),
        );

        $response = $this->employer_profile_service_model->update($info);
        echo json_encode($response);
    }

    public function update()
    {
        $response = [];
        $data = null;

        $file['upload_path'] = './assets/images/employer/profile_pic/';
        $file['allowed_types'] = 'jpg|png|jpeg';
        $file['max_size'] = '2000';

        $this->load->library('upload', $file);

        if (!$this->upload->do_upload('image')) {
            $response['file_error'] = $this->upload->error_msg;
        } else {
            $data = $this->upload->data();
            $response['file_success'] = 'File ' . $data['file_name'] . ' uploaded successfully';
        }

        $info = array(
            'id' => $this->input->post("id"),
            'employer_name' => $this->input->post('employer_name'),
            'tradename' => $this->input->post("tradename"),
            'city' => $this->input->post('city'),
            'barangay' => $this->input->post('barangay'),
            'address' => $this->input->post('address'),
            'business_type' => $this->input->post("business_type"),
            'contact_number' => $this->input->post("contact_number"),
            'email' => $this->input->post("email"),
            'sss' => $this->input->post('sss'),
            'tin' => $this->input->post('tin'),
            'image' => isset($data) ? $data['file_name'] : null,
        );

        if (!isset($data)) {
            unset($info['image']);
        }

        $response[] = $this->employer_profile_service_model->update($info);
        echo json_encode($response);
    }
}
