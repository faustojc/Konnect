<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends MY_Controller
{
    private $userdata;
    private $auth;
    private $id;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);
        $this->auth = get_userdata(AUTH);

        if ($this->auth['user_type'] == 'EMPLOYER') {
            $id = $this->userdata->id;
        } else {
            $id = $this->userdata->ID;
        }

        $model_list = array(
            'jobposting/Jobposting_model',
            'employee/Employee_model',
        );

        $this->load->model($model_list);
    }

    public function apply()
    {
        $data = json_decode($this->input->raw_input_stream, true);

        // Load the security library
        $this->load->library('security');

        // Filter the job_id for potential XSS attacks
        $job_id = $this->security->xss_clean($data['job_id']);
        $result = $this->Applicant_model->setApplication($job_id, $this->userdata->ID);
        $targetDetails = $this->Jobposting_model->getEmployerByJobpost($job_id);

        if ($result['apply_status'] == 'PENDING') {
            // Send a notification to the employer by adding a new notification
            $info = array(
                'user_id' => $targetDetails->user_id,
                'from_user_id' => $this->userdata->user_id,
                'title' => 'New Applicant in your job post',
                'message' => 'A new applicant has applied to your job post.',
                'link' => base_url() . 'jobposting?id=' . $job_id,
            );
        } else {
            $info = array(
                'user_id' => $targetDetails->user_id,
                'from_user_id' => $this->userdata->user_id,
                'title' => 'Application Cancelled',
                'message' => 'The applicant has cancelled his/her application.',
            );
        }

        $this->Notification_model->add($info);
    }

    public function accept()
    {
        $data = json_decode($this->input->raw_input_stream, true);
        $this->Applicant_model->setApplicantStatus($data['application_id'], 'ACCEPTED');

        // Get the employee details by getting the user_id
        $employeeDetails = $this->Applicant_model->getApplicant($data['application_id']);
        $employer = $this->Applicant_model->getEmployerByApplicant($data['application_id']);

        // Send a notification to the applicant by adding a new notification
        $info = array(
            'user_id' => $employeeDetails->employeeUserID,
            'from_user_id' => $this->userdata->user_id,
            'title' => 'Application Accepted',
            'message' => $employer->employerName . ' has accepted your application.',
            'link' => 'jobposting?id=' . $data['job_id'],
        );

        $this->Notification_model->add($info);
    }

    public function reject()
    {
        $data = json_decode($this->input->raw_input_stream, true);
        $this->Applicant_model->setApplicantStatus($data['application_id'], 'REJECTED');

        // Get the employee details by getting the user_id
        $employeeDetails = $this->Applicant_model->getApplicant($data['application_id']);
        $employer = $this->Applicant_model->getEmployerByApplicant($data['application_id']);

        // Send a notification to the applicant by adding a new notification
        $info = array(
            'user_id' => $employeeDetails->employeeUserID,
            'from_user_id' => $this->userdata->user_id,
            'title' => 'Application Rejected',
            'message' => $employer->employerName . ' has rejected your application.',
            'link' => 'jobposting?id=' . $data['job_id'],
        );

        $this->Notification_model->add($info);
    }
}