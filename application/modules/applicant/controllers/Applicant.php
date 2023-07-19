<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);
    }

    public function apply()
    {
        $data = json_decode($this->input->raw_input_stream, true);

        // Load the security library
        $this->load->library('security');

        // Filter the job_id for potential XSS attacks
        $job_id = $this->security->xss_clean($data['job_id']);

        $result = $this->Applicant_model->setApplication($job_id, $this->userdata->ID);
        echo json_encode($result);
    }

}