<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
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

    public function get_employee()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employee);

        $query = $this->db->get()->result();
        return $query;
    }

    public function get_all_employees($limit = 0, $id = null)
    {
        if ($limit == 0 && $id != null) {
            return $this->db->select()->from($this->Table->employee)->where('ID !=', $id)->get()->result();
        } else if ($limit != 0 && $id != null) {
            return $this->db->select()->from($this->Table->employee)->where('ID !=', $id)->limit($limit)->get()->result();
        } else if ($limit != 0 && $id == null) {
            return $this->db->select()->from($this->Table->employee)->limit($limit)->get()->result();
        }

        return $this->db->select()->from($this->Table->employee)->get()->result();
    }

    public function register()
    {
        // $this->db->select('*');
        // $this->db->from($this->Table->employee);
        // $this->db->where('ID', $this->ID);
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_specific_employee($email)
    {
        return $this->db->select()
            ->from($this->Table->employee)
            ->where('Email', $email)
            ->get()->row();
    }

    public function get_employees($Employee_id)
    {

        //  return $this->db->select()->from($this->Table->employee_educ)->where('Employee_id', $Employee_id)->get()->row();

        $employee = $this->db->select()->from($this->Table->employee)->where('ID', $Employee_id)->get()->row();

        $education = $this->db->select('tbl_employee.*, tbl_employee_educ.*')
            ->from('tbl_employee_educ')
            ->join($this->Table->employee, 'tbl_employee.ID = tbl_employee_educ.Employee_id', 'inner')
            ->where('tbl_employee_educ.Employee_id', $Employee_id)
            ->get()->row();

        $result = array(
            'employee' => $employee,
            'education' => $education
        );

        return $result;
    }

    public function get_educ()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employee_educ);

        $query = $this->db->get()->result();
        return $query;
    }
}
