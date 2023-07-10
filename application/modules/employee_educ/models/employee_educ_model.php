<?php
defined('BASEPATH') or exit('No direct script access allowed');
class employee_educ_model extends CI_Model
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




    public function education_edit()
    {
        $this->db->select(
            'ed.*,' .
            'e.Fname,' .
            'e.Mname,' .
            'e.Lname,'
        );
        $this->db->from($this->Table->employee_educ . ' ed');
        $this->db->join($this->Table->employee . ' e', 'e.ID = ed.Employee_id', 'left');
        $this->db->where('ed.ID', $this->ID);
        $query = $this->db->get()->row();
        return $query;
    }


    // Get all educations
    public function get_educations()
    {
        $result = $this->db->select('tbl_employee_educ.*, tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname')
            ->from($this->Table->employee_educ)
            ->join('tbl_employee', 'tbl_employee.ID = tbl_employee_educ.Employee_id', 'inner')
            ->get()->result();

        return $result;
    }

    // Get all employees
    public function get_employees()
    {
        return $this->db->select()->from($this->Table->employee)->get()->result();
    }
}