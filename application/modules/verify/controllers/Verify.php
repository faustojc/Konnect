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
        $this->auth = (array)$this->Auth_model->get_auth($this->userdata->user_id);
    }

    /**
     * @throws JsonException
     */
    public function index(): void
    {
        // get the verify code from link
        $verification = $this->input->get('v');

        $isVerified = $this->Auth_model->verifyUser($this->userdata, $verification);

        if ($isVerified) {
            set_userdata(AUTH, $this->Auth_model->get_auth($this->userdata->user_id));
            redirect(base_url() . 'verify/success');
        } else {
            redirect(base_url() . 'verify/error');
        }
    }

    public function success(): void
    {
        $data['auth'] = $this->auth;

        $this->load->view('success', $data);
    }

    public function error(): void
    {
        $data['auth'] = $this->auth;

        $this->load->view('error', $data);
    }

    /**
     * @throws JsonException
     */
    public function resend(): void
    {
        sendEmail(
            'unofficial.konnect.me@gmail.com',
            'Konnect',
            $this->auth['email'],
            'Email Verification',
            'Please click on the link below to verify your email address: ' . base_url() . 'verify?v=' . $this->auth['locker'],
        );

        echo json_encode(['status' => 'success', 'message' => 'Resend successfully, please check your email.'], JSON_THROW_ON_ERROR);
    }
}
