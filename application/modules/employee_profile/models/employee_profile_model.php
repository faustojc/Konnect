<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_profile_model extends CI_Model
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

    public function get_employee()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employee);
        $this->db->where('ID', $this->ID);
        $query = $this->db->get()->row();
        return $query;
        // echo json_encode($query);
    }

    // Employee Education Section
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
            ->where('tbl_employee_educ.Employee_id', $this->ID)
            ->get()->result();

        return $result;

    }

    // Get all employees
    public function get_employees()
    {
        return $this->db->select()->from($this->Table->employee)->get()->result();
    }

    public function get_education_only()
    {
        return $this->db->select()->from($this->Table->employee_educ)->get()->result();
    }
    // /Employee Education Section

    // Training
    public function training_edit()
    {
        $this->db->select(
            'tr.*,' .
            't.Fname,' .
            't.Mname,' .
            't.Lname,'
        );
        $this->db->from($this->Table->training . ' tr');
        $this->db->join($this->Table->employee . ' t', 't.ID = tr.Employee_id', 'left');
        $this->db->where('tr.ID', $this->ID);
        $query = $this->db->get()->row();
        return $query;
    }


    // Get all training
    public function get_training()
    {
        $result = $this->db->select('tbl_training.*, tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname')
            ->from($this->Table->training)
            ->join('tbl_employee', 'tbl_employee.ID = tbl_training.Employee_id', 'inner')
            ->where('tbl_training.Employee_id', $this->ID)
            ->get()->result();

        return $result;

    }

    // Get all employees
    public function get_employees_train()
    {
        return $this->db->select()->from($this->Table->employee)->get()->result();
    }
    // /Training

    //Create Employment
    public function add_employment()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employment);
        $this->db->where('ID', $this->ID);

        $query = $this->db->get()->row();

        return $query;
    }

    //Get all Employments
    public function get_all_employments()
    {
        $result = [];

        $employments = $this->db->select()
            ->from($this->Table->employment)
            ->where('tbl_employment.employee_id', $this->ID)
            ->get()->result();

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
            //  echo json_encode($result[$x]['employment']);
            ++$x;

        }

        return $result;

    }

    //Edit Employment
    public function edit_employment()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employment);
        $this->db->where('ID', $this->ID);

        $query = $this->db->get()->row();

        return $query;
    }

    //Get employment
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

    //Get Employees and Employers
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

    public function save_skill()
    {
        $this->db->select(
            'sk.*,'
        );
        $this->db->from($this->Table->employee_skill . ' sk');
        $this->db->join($this->Table->employee . ' e', 'e.ID = sk.employee_id', 'left');
        $this->db->where('sk.ID', $this->ID);
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_skill()
    {
        $result = $this->db->select('tbl_employee_skill.*')
            ->where('tbl_employee_skill.employee_id = ' . $this->ID)
            ->from($this->Table->employee_skill)
            ->join('tbl_employee', 'tbl_employee.ID = tbl_employee_skill.employee_id', 'inner')
            ->get()->result();

        return $result;
    }

    public function edit_skill()
    {
        $this->db->select(
            'sk.*,'
        );
        $this->db->from($this->Table->employee_skill . ' sk');
        $this->db->join($this->Table->employee . ' e', 'e.ID = sk.employee_id', 'left');
        $this->db->where('sk.ID', $this->ID);
        $query = $this->db->get()->row();
        return $query;
    }


}