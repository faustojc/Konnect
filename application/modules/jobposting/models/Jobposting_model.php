<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function get_jobpostings($id, $limit = 0)
    {
        if ($limit == 0) {
            return $this->db->select()->from($this->Table->jobposting)->where('employer_id', $id)->order_by('date_posted', 'DESC')->get()->result();
        } else {
            return $this->db->select()->from($this->Table->jobposting)->where('employer_id', $id)->order_by('date_posted', 'DESC')->limit($limit)->get()->result();
        }
    }

    public function job_info($id)
    {
        return $this->db->select()->from($this->Table->jobposting)->where('id', $id)->get()->row();
    }
}
