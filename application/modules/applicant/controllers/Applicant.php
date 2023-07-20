<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends MY_Controller
{
    private $userdata;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);

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

        if ($result->apply_status == 'PENDING') {
            // Send a notification to the employer by adding a new notification
            $info = array(
                'user_id' => $targetDetails->user_id,
                'title' => 'New Applicant in your job post',
                'message' => 'A new applicant has applied to your job post.',
            );

            $this->Notification_model->add($info);
        }

        echo json_encode($result);
    }

    public function accept()
    {
        $data = json_decode($this->input->raw_input_stream, true);
        $result = $this->Applicant_model->setApplicantStatus($data['application_id'], 'ACCEPTED');

        // Get the employee details by getting the user_id
        $employeeDetails = $this->Applicant_model->getApplicant($data['application_id']);

        // Send a notification to the applicant by adding a new notification
        $info = array(
            'user_id' => $employeeDetails->employeeUserID,
            'title' => 'Application Accepted',
            'message' => 'Your application has been accepted.',
        );

        $this->Notification_model->add($info);

        echo json_encode($result);
    }

    public function reject()
    {
        $data = json_decode($this->input->raw_input_stream, true);
        $result = $this->Applicant_model->setApplicantStatus($data['application_id'], 'REJECTED');

        // Get the employee details by getting the user_id
        $employeeDetails = $this->Employee_model->getEmployee($data['user_id']);

        // Send a notification to the applicant by adding a new notification
        $info = array(
            'user_id' => $employeeDetails->user_id,
            'title' => 'Application Rejected',
            'message' => 'Your application has been rejected.',
        );

        $this->Notification_model->add($info);

        echo json_encode($result);
    }
}