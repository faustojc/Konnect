<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verify extends MY_Controller
{
    /**
     * @var array|mixed|null
     */
    private $userdata;
    /**
     * @var array|mixed|null|object
     */
    private $auth;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);
        $this->auth = $this->Auth_model->get_user($this->userdata->user_id);
    }

    /**
     * @throws JsonException
     */
    public function index(): void
    {
        // get the verify code from link
        $verification = $this->uri->segment(3);

        $isVerified = $this->Auth_model->verifyUser($this->userdata, $verification);

        if ($isVerified) {
            redirect(base_url() . 'verify/success');
        } else {
            redirect(base_url() . 'verify/error');
        }
    }

    public function success(): void
    {
        $this->load->view('success');
    }

    public function error(): void
    {
        $this->load->view('error');
    }

    /**
     * @throws JsonException
     */
    public function resend(): void
    {
        sendEmail(
            'no-reply@konnect.com',
            'Konnect',
            $this->auth['email'],
            'Email Verification',
            'Please click on the link below to verify your email address: ' . base_url() . 'verify/' . $this->auth['locker'],
        );

        echo json_encode(['status' => 'success', 'message' => 'Resend successfully, please check your email.'], JSON_THROW_ON_ERROR);
    }
}
