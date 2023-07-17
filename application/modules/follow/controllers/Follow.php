<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $model_list = [
            'follow/Follow_model' => 'follow_model',
        ];

        $this->load->model($model_list);
    }

    public function get_following($id)
    {
        return $this->follow_model->get_following($id);
    }

    public function get_followers($id)
    {
        return $this->follow_model->get_followers($id);
    }
}