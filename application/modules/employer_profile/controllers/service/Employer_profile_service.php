<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_profile_service extends MY_Controller
{
    /**
     * @throws JsonException
     */
    public function save(): void
    {
        $response = [];
        $data = NULL;

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

        $info = $this->input->post();

        // Check if employer has image already
        $image = $this->input->post('image');

        if (empty($image)) {
            $info['image'] = isset($data) ? $data['file_name'] : 'default.png';
        }

        $response = array_merge($response, $this->Employer_model->save($info));
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function update_summary(): void
    {
        $info = [
            'id' => $this->input->post("id"),
            'summary' => $this->input->post('summary'),
        ];

        $response = $this->Employer_model->update($info);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function update(): void
    {
        $img = NULL;

        $file['upload_path'] = './assets/images/employer/profile_pic/';
        $file['allowed_types'] = 'jpg|png|jpeg';
        $file['max_size'] = '2000';

        $this->load->library('upload', $file);

        if (!$this->upload->do_upload('image')) {
            $response['file_error'] = $this->upload->error_msg;
        } else {
            $img = $this->upload->data();
            $response['file_success'] = 'File ' . $img['file_name'] . ' uploaded successfully';
        }

        $data = $this->input->post();

        if (isset($img)) {
            $data['image'] = $img['file_name'];
        }

        $response = $this->Employer_model->update($data);
        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function setActive(): void
    {
        $data = $this->input->post();
        $response = $this->Employed_model->update($data['id'], ['is_active' => $data['is_active']]);

        echo json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function setVerified(): void
    {
        $data = $this->input->post();
        $response = $this->Employed_model->update($data['id'], ['is_verified' => $data['is_verified']]);

        echo json_encode($response, JSON_THROW_ON_ERROR);
    }
}
