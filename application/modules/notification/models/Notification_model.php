<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification_model extends CI_Model
{
    private $Table;

    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE);
    }

    public function getNotifications($user_id = null)
    {
        $result = null;
        $user_type = $this->db->select('user_type')->from($this->Table->user)->where('id', $user_id)->get()->row()->user_type;

        if ($user_id) {
            if ($user_type == 'EMPLOYER') {
                $result = $this->db->select('tbl_notification.*, tbl_employer.id as targetID, tbl_employer.tradename AS userName')
                    ->from($this->Table->notification)
                    ->where('tbl_notification.user_id', $user_id)
                    ->join($this->Table->employer, 'tbl_employer.user_id = tbl_notification.user_id')
                    ->order_by('date_created', 'DESC')
                    ->get()->result();
            } else {
                $result = $this->db->select('tbl_notification.*, tbl_employee.ID as targetID, CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS userName')
                    ->from($this->Table->notification)
                    ->where('tbl_notification.user_id', $user_id)
                    ->join($this->Table->employee, 'tbl_employee.user_id = tbl_notification.user_id')
                    ->order_by('date_created', 'DESC')
                    ->get()->result();
            }
        } else {
            $result = $this->db->order_by('date_created', 'DESC')
                ->get($this->Table->notification)->result();
        }

        return $result;
    }

    public function getNewNotifications($user_id)
    {
        return $this->db->select()
            ->from($this->Table->notification)
            ->where('user_id', $user_id)
            ->where('is_displayed', 0)
            ->get()->result();
    }


    /**
     * @throws Exception
     */
    public function add($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->notification, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('status' => 'success', 'message' => 'Notification added successfully.');
            } else {
                $this->db->trans_rollback();
                return array('status' => 'error', 'message' => 'Failed to add a new notification.');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
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
                return array('status' => 'success', 'message' => 'Notification updated successfully.');
            } else {
                $this->db->trans_rollback();
                return array('status' => 'error', 'message' => 'Failed to update the notification.');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}