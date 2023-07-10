<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employment_model extends CI_Model
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

    public function profile()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employment);
        $this->db->where('ID', $this->ID);

        $query = $this->db->get()->row();
        
        return $query;
    }

    public function get_all_employments()
    {
        $result = [];

        $employments = $this->db->select()->from($this->Table->employment)->get()->result();

        $x = 0;
        foreach ($employments as $employment) {
            $result[$x]['employee'] = $this->db->select()
                ->from('tbl_employee')
                ->join('tbl_employment', 'tbl_employment.employee_id = tbl_employee.ID', 'inner')
                ->where('tbl_employment.employee_id', $employment->employee_id)
                ->get()->row();

            $result[$x]['employer'] = $this->db->select()
                ->from('tbl_employer')
                ->join('tbl_employment', 'tbl_employment.employer_id = tbl_employer.ID', 'inner')
                ->where('tbl_employment.employer_id', $employment->employer_id)
                ->get()->row();

            $result[$x]['employment'] = $employment;
            ++$x;
        }

        return $result;
    }

    public function edit()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employment);
        $this->db->where('ID', $this->ID);

        $query = $this->db->get()->row();
        
        return $query;
    }

    public function get_employment($employment_id)
    {
        $result = $this->db->select('tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname, tbl_employer.employer_name, tbl_employment.*')
            ->from($this->Table->employment)
            ->join('tbl_employee', 'tbl_employment.employee_id = tbl_employee.ID', 'inner')
            ->join('tbl_employer', 'tbl_employment.employer_id = tbl_employer.id', 'inner')
            ->where('tbl_employment.ID', $employment_id)
            ->get()->row();

        return $result;
    }

    public function get_employees_employers()
    {
        $result = [];

        $result['employees'] = $this->db->select('tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname, tbl_employee.ID')
            ->from($this->Table->employee)
            ->get()->result();

        $result['employers'] = $this->db->select('tbl_employer.employer_name, tbl_employer.id')
            ->from($this->Table->employer)
            ->get()->result();

        return $result;
    }

}
