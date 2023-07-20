<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('follow/Follow_model');
    }

    public function get_following($id)
    {
        return $this->Follow_model->get_following($id);
    }

    public function get_followers($id)
    {
        return $this->Follow_model->get_followers($id);
    }
}