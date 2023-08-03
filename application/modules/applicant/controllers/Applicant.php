<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends MY_Controller
{
    private $userdata;
    private $auth;

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

        $model_list = [
            'jobposting/Jobposting_model',
            'employee/Employee_model',
        ];

        $this->load->model($model_list);
    }

    /**
     * @throws JsonException
     */
    public function apply(): void
    {
        $data = json_decode($this->input->raw_input_stream, TRUE, 512, JSON_THROW_ON_ERROR);

        // Load the security library
        $this->load->library('security');

        // Filter the job_id for potential XSS attacks
        $job_id = $this->security->xss_clean($data['job_id']);
        $job_info = $this->Jobposting_model->getJob($job_id, 'title');
        $result = $this->Applicant_model->setApplication($job_id, $this->userdata->ID, $job_info->title);
        $targetDetails = $this->Jobposting_model->getEmployerByJobpost($job_id);

        if ($result['apply_status'] == 'PENDING') {
            // Send a notification to the employer by adding a new notification
            $notif_data = [
                'user_id' => $targetDetails->user_id,
                'from_user_id' => $this->userdata->user_id,
                'title' => 'New Applicant in your job post',
                'message' => 'A new applicant has applied to your job post.',
                'link' => 'jobposting?id=' . $job_id,
            ];
        } else {
            $notif_data = [
                'user_id' => $targetDetails->user_id,
                'from_user_id' => $this->userdata->user_id,
                'title' => 'Application Cancelled',
                'message' => 'The applicant has cancelled his/her application.',
            ];
        }

        $this->Notification_model->add($notif_data);
    }

    /**
     * @throws JsonException
     */
    public function accept(): void
    {
        $data = json_decode($this->input->raw_input_stream, TRUE, 512, JSON_THROW_ON_ERROR);
        $this->Applicant_model->setApplicantStatus($data['application_id'], 'ACCEPTED');

        // Get the employee details by getting the user_id
        $applicant = $this->Applicant_model->getApplicant($data['application_id'], $data['job_id']);
        $job = $this->Jobposting_model->getJob($data['job_id']);

        // Send a notification to the applicant by adding a new notification
        $notif_data = [
            'user_id' => $applicant->employeeUserID,
            'from_user_id' => $this->userdata->user_id,
            'title' => 'Application Accepted',
            'message' => ucwords($this->userdata->tradename) . ' has accepted your application in the job post ' . $job->title . '.',
            'link' => 'jobposting?id=' . $data['job_id'],
        ];

        $employment_data = [
            'employer_id' => $this->userdata->id,
            'employee_id' => $applicant->employeeUserID,
            'job_title' => $job->title,
            'status' => $job->job_type,
        ];
        //$employment_id = $this->Employment_model->add($employment_data)['id'];

        $employed_data = [
            'employer_id' => $this->userdata->id,
            'employee_id' => $applicant->employee_id,
            'job_title' => $job->title,
            'job_type' => $job->job_type,
        ];
        $this->Employed_model->add($employed_data);

        $this->Notification_model->add($notif_data);

        sendEmail(
            $this->auth['email'],
            'no-reply-Konnect',
            $applicant->email,
            'Application Accepted',
            ucwords($this->userdata->tradename) . ' has accepted your application for the ' . $job->title . '. You may now contact now ' . ucwords($this->userdata->tradename) . ' at ' . $this->auth['email'] . ' for more details. Thank you!',
        );
    }

    /**
     * @throws JsonException
     */
    public function reject(): void
    {
        $data = json_decode($this->input->raw_input_stream, TRUE, 512, JSON_THROW_ON_ERROR);
        $this->Applicant_model->setApplicantStatus($data['application_id'], 'REJECTED');

        // Get the employee details by getting the user_id
        $applicant = $this->Applicant_model->getApplicant($data['application_id']);
        $job = $this->Jobposting_model->getJob($data['job_id']);

        // Send a notification to the applicant by adding a new notification
        $notif_data = [
            'user_id' => $applicant->employee_id,
            'from_user_id' => $this->userdata->user_id,
            'title' => 'Application Rejected',
            'message' => ucwords($this->userdata->tradename) . ' has rejected your application in the job post ' . $job->title . '.',
            'link' => 'jobposting?id=' . $data['job_id'],
        ];

        $this->Notification_model->add($notif_data);

        sendEmail(
            $this->auth['email'],
            'no-reply-Konnect',
            $applicant->email,
            'Application Rejected',
            ucwords($this->userdata->tradename) . ' has rejected your application for the ' . $job->title . '. Thank you!',
        );
    }
}
