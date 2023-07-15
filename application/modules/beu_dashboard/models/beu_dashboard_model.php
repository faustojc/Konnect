<?php
defined('BASEPATH') or exit('No direct script access allowed');
class beu_dashboard_model extends CI_Model
{
    public $Table;
    public function __construct()
    {
        parent::__construct();
        $this->session = (object) get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function get_current_employer($employer_id)
    {
        return $this->db->select()->from($this->Table->employer)->where('id', $employer_id)->get()->row();
    }

    public function get_summary($employer_id)
    {
        return $this->db->select('summary')->from($this->Table->employer)->where('id', $employer_id)->get()->row();
    }

    public function get_skill($id)
    {
        return $this->db->select()
            ->from($this->Table->employee_skill)
            ->join('tbl_employee', 'tbl_employee.ID = tbl_employee_skill.employee_id', 'inner')
            ->where('employee_id', $id)
            ->get()->result();
    }

}