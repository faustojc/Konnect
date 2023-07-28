<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employed_model extends CI_Model
{
    private $Table;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
    }

    public function getEmployersEmployed($employer_id)
    {
        $result = $this->db->select('tbl_employed.*, 
        tbl_jobposting.id AS job_id,
        tbl_jobposting.title AS job_title,
        tbl_employee.id AS employee_id, 
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employee_name,
        tbl_employer.id as employer_id,')
            ->where('tbl_employer.id', $employer_id)
            ->join('tbl_jobposting', 'tbl_jobposting.id = tbl_employed.job_id')
            ->join('tbl_employee', 'tbl_employee.ID = tbl_employed.employee_id')
            ->join('tbl_employer', 'tbl_employer.id = tbl_jobposting.employer_id')
            ->get($this->Table->employed)->result();
    }


}