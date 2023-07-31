<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback_model extends CI_Model
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

    public function getAllUsersFeedback($user_id)
    {
        return $this->db->select('tbl_feedback.*, 
        (CASE
            WHEN tbl_employee.Fname IS NOT NULL THEN CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname)
            WHEN tbl_employer.tradename IS NOT NULL THEN tbl_employer.tradename
        END) AS userName,
        (CASE
            WHEN tbl_employee.title IS NOT NULL THEN tbl_employee.title
            WHEN tbl_employer.business_type IS NOT NULL THEN tbl_employer.business_type
        END) AS userTitle,
        (CASE
            WHEN tbl_employee.Employee_image IS NOT NULL THEN tbl_employee.Employee_image
            WHEN tbl_employer.image IS NOT NULL THEN tbl_employer.image
        END) AS userImage')
            ->from($this->Table->feedback)
            ->join($this->Table->user, 'tbl_user.id = tbl_feedback.user_id')
            ->join($this->Table->employee, 'tbl_employee.user_id = tbl_feedback.from_user_id', 'left')
            ->join($this->Table->employer, 'tbl_employer.user_id = tbl_feedback.from_user_id', 'left')
            ->where('tbl_feedback.user_id', $user_id)
            ->order_by('tbl_feedback.date_created', 'DESC')
            ->get()->result();

    }

    /**
     * @throws Exception
     */
    public function add($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->feedback, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return ['has_error' => FALSE, 'message' => 'Feedback added successfully.'];
            }

            $this->db->trans_rollback();
            return ['has_error' => TRUE, 'message' => 'Failed to add a new feedback.'];
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}
