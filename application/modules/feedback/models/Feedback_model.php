<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE);
    }

    public function getAllUsersFeedback($user_id)
    {
        // get all feedbacks for the user that is either an employee or employer
        return $this->db->select('tbl_feedback.*, 
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS userName,
        tbl_employee.title as userTitle,
        tbl_employee.Employee_image as userImage,
        tbl_employer.tradename as userName,
        tbl_employer.business_type as userTitle,
        tbl_employer.image as userImage')
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
                return array('has_error' => false, 'message' => 'Feedback added successfully.');
            } else {
                $this->db->trans_rollback();
                return array('has_error' => true, 'message' => 'Failed to add a new feedback.');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}