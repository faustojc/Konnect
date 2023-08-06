<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resume extends MY_Controller
{
    /**
     * @var array|mixed|null
     */
    private $userdata;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);
    }

    public function getResume(): void
    {
        $resume = $this->Resume_model->getResume($this->userdata->ID);

        resumeDisplay($resume);
    }
}
