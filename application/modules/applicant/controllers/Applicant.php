<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends MY_Controller
{
    public const PENDING = 'PENDING';
    public const ACCEPTED = 'ACCEPTED';
    public const REJECTED = 'REJECTED';
    public const UNDER_REVIEW = 'UNDER REVIEW';
    public const SCHEDULED = 'SCHEDULE FOR INTERVIEW';

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
    public function getApplicant(): void
    {
        $data = $this->input->post();
        $applicant = $this->Applicant_model->getApplicant($data['id'], $data['job_id']);

        echo json_encode($applicant, JSON_THROW_ON_ERROR);
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
        $data = $this->input->post();
        $this->Applicant_model->setApplicantStatus($data['id'], self::UNDER_REVIEW);

        // Get the employee details by getting the user_id
        $applicant = $this->Applicant_model->getApplicant($data['id'], $data['job_id']);

        // Send a notification to the applicant by adding a new notification
        $notif_data = [
            'user_id' => $applicant->user_id,
            'from_user_id' => $this->userdata->user_id,
            'title' => 'Application Accepted',
            'message' => ucwords($this->userdata->tradename) . ' has accepted your application in the job post ' . $applicant->job_title . ' and is now under review. Thank you',
            'link' => 'jobposting?id=' . $data['job_id'],
        ];

        $this->Notification_model->add($notif_data);

        sendEmail(
            $this->auth['email'],
            'no-reply-Konnect',
            $applicant->email,
            'Application Accepted',
            ucwords($this->userdata->tradename) . ' has accepted your application for the ' . $applicant->job_title . ' and is now ' . $applicant->status . '. You can contact ' . ucwords($this->userdata->tradename) . ' at ' . $this->auth['email'] . ' for more details. Thank you!',
        );
    }

    /**
     * @throws JsonException
     */
    public function reject(): void
    {
        $data = $this->input->post();
        $this->Applicant_model->setApplicantStatus($data['id'], self::REJECTED);

        // Get the employee details by getting the user_id
        $applicant = $this->Applicant_model->getApplicant($data['id']);

        // Send a notification to the applicant by adding a new notification
        $notif_data = [
            'user_id' => $applicant->user_id,
            'from_user_id' => $this->userdata->user_id,
            'title' => 'Application Rejected',
            'message' => ucwords($this->userdata->tradename) . ' has rejected your application in the job post ' . $applicant->job_title . '.',
            'link' => 'jobposting?id=' . $data['job_id'],
        ];

        $this->Notification_model->add($notif_data);

        sendEmail(
            $this->auth['email'],
            'no-reply-Konnect',
            $applicant->email,
            'Application Rejected',
            ucwords($this->userdata->tradename) . ' has rejected your application for the ' . $applicant->job_title . '. Thank you!',
        );
    }

    public function setStatus(): void
    {
        $data = $this->input->post();
        $this->Applicant_model->setApplicantStatus($data['id'], $data['status']);

        $applicant = $this->Applicant_model->getApplicant($data['id'], $data['job_id']);
        $job = $this->Jobposting_model->job_info($data['job_id']);

        // Send a notification to the applicant by adding a new notification
        $notif_data = [
            'user_id' => $applicant->user_id,
            'from_user_id' => $this->userdata->user_id,
            'title' => 'Application Status',
            'message' => 'Your application in the job post ' . $applicant->job_title . ' has been ' . $data['status'] . '.',
            'link' => 'jobposting?id=' . $data['job_id'],
        ];
        $this->Notification_model->add($notif_data);

        // Send email when the application is accepted
        if ($data['status'] == self::ACCEPTED) {
            $employed_data = [
                'employer_id' => $this->userdata->id,
                'employee_id' => $applicant->employee_id,
                'job_title' => $job->title,
                'job_type' => $job->job_type,
            ];
            $this->Employed_model->add($employed_data);

            sendEmail(
                $this->auth['email'],
                'no-reply-Konnect',
                $applicant->email,
                'Application Accepted',
                ucwords($this->userdata->tradename) . ' has accepted your application for the ' . $applicant->job_title . ' and is now ' . $applicant->status . '. You can contact ' . ucwords($this->userdata->tradename) . ' at ' . $this->auth['email'] . ' for more details. Thank you!',
            );
        }
    }
}
