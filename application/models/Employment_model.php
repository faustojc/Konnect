<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employment_model extends CI_Model
{
    public $Table;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
    }

    public function getEmployeesEmployment($employee_id)
    {
        return $this->db->select('tbl_employment.*, 
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employee_name,
        tbl_employer.id as employer_id,
        tbl_employer.tradename AS employer_name')
            ->where('tbl_employment.employee_id', $employee_id)
            ->join('tbl_employee', 'tbl_employee.ID = tbl_employment.employee_id')
            ->join('tbl_employer', 'tbl_employer.id = tbl_employment.employer_id')
            ->order_by('tbl_employment.start_date', 'DESC')
            ->get($this->Table->employment)->result();
    }

    public function add($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->employment, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return ['status' => 'success', 'message' => 'Employed added successfully.'];
            }

            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Failed to insert a new record.'];
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @throws Exception
     */
    public function update($id, $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $id)->update($this->Table->employment, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return ['status' => 'success', 'message' => 'Employment added successfully.'];
            }

            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Failed to update the employment data.'];
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }
}
