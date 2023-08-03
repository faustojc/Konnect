<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Relationship with employee: ONE TO ONE
 */
class Resume_model extends CI_Model
{
    /**
     * @var mixed
     */
    private $Table;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param int $employee_id
     *
     * @return array|mixed|object|null
     */
    public function getResume(int $employee_id)
    {
        return $this->db->select('tbl_resume.*, tbl_employee.id AS employee_id')
            ->join($this->Table->employee, 'tbl_employee.id = tbl_resume.employee_id')
            ->where('tbl_resume.employee_id', $employee_id)
            ->get($this->Table->resume)->row();
    }

    public function save($info): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->resume, $info);
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
            $this->db->where('id', $id)->or_where('employee_id', $id)->update($this->Table->resume, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();
            return ['message' => UPDATE_SUCCESSFUL, 'has_error' => FALSE];

        } catch (Exception $msg) {
            return (['message' => $msg->getMessage(), 'has_error' => TRUE]);
        }
    }

    public function delete($id): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $id)->or_where('employee_id')->delete($this->Table->resume);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new RuntimeException(ERROR_PROCESSING, TRUE);
            }

            $this->db->trans_commit();
            return ['message' => DELETED_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return (['message' => $msg->getMessage(), 'has_error' => TRUE]);
        }
    }
}
