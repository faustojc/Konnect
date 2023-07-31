<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow_model extends CI_Model
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

    public function save($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->follow, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();
            return ['message' => SAVED_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return ['message' => $msg->getMessage(), 'has_error' => TRUE];
        }
    }

    public function update($id, $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $id)->update($this->Table->follow, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();
            return ['message' => SAVED_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return ['message' => $msg->getMessage(), 'has_error' => TRUE];
        }
    }

    public function delete($data): array
    {
        try {
            $this->db->trans_start();
            $query = $this->db->select('id')
                ->from($this->Table->follow)
                ->where('employee_id', $data['employee_id'])
                ->where('employer_id', $data['employer_id'])
                ->get()->row();

            $this->db->where('id', $query->id)->delete($this->Table->follow);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();
            return ['message' => SAVED_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return ['message' => $msg->getMessage(), 'has_error' => TRUE];
        }
    }
}
