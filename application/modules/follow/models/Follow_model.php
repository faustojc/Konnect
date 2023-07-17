<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow_model extends CI_Model
{
    private $Table;

    public function __construct()
    {
        parent::__construct();

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function get_following($id)
    {
        return $this->db->select()
            ->from($this->Table->follow)
            ->where('employee_id', $id)
            ->get()->result();
    }

    public function get_followers($id)
    {
        return $this->db->select()
            ->from($this->Table->follow)
            ->where('employer_id', $id)
            ->get()->result();
    }
}