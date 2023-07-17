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
        return $this->db->select('tbl_follow.*, tbl_employer.tradename AS employerName, tbl_employer.business_type AS employerType, tbl_employer.image AS employerLogo')
            ->from($this->Table->follow)
            ->join($this->Table->employer, 'tbl_employer.id = tbl_follow.employer_id')
            ->where('employee_id', $id)
            ->get()->result();
    }

    public function get_followers($id)
    {
        return $this->db->select('tbl_follow.*, CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employeeName, tbl_employee.Title AS employeeTitle, tbl_employee.Employee_image AS employeeImage')
            ->from($this->Table->follow)
            ->join($this->Table->employee, 'tbl_employee.ID = tbl_follow.employee_id')
            ->where('employer_id', $id)
            ->get()->result();
    }

}