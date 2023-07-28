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
        return $this->db->select('tbl_employed.*, 
        tbl_jobposting.title AS job_title,
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employee_name,')
            ->where('tbl_employer.id', $employer_id)
            ->join('tbl_jobposting', 'tbl_jobposting.id = tbl_employed.job_id')
            ->join('tbl_employee', 'tbl_employee.ID = tbl_employed.employee_id')
            ->join('tbl_employer', 'tbl_employer.id = tbl_jobposting.employer_id')
            ->get($this->Table->employed)->result();
    }

    /**
     * @throws Exception
     */
    public function add($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->employed, $data);
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
            $this->db->where('id', $id)->update($this->Table->notification, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return ['status' => 'success', 'message' => 'Employed data updated successfully.'];
            }

            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Failed to update the employed data.'];
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }
}
