<?php

class EmployeeSkills_model extends CI_Model
{
    private $Table;

    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE);
    }

    public function getEmployeeSkills($id, string $select = '*')
    {
        return $this->db->select($select)->get_where('tbl_employee_skill', ['employee_id' => $id])->result();
    }
}