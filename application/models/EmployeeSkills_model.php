<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeSkills_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getEmployeeSkills($id, string $select = '*')
    {
        return $this->db->select($select)->get_where('tbl_employee_skill', ['employee_id' => $id])->result();
    }
}