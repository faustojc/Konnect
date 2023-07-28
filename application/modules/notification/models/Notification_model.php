<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification_model extends CI_Model
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

    public function getNotifications($user_id = NULL)
    {
        if ($user_id) {
            $result = $this->db->select('tbl_notification.*, 
            (CASE
                WHEN tbl_employee.user_id IS NOT NULL THEN tbl_employee.user_id
                WHEN tbl_employer.user_id IS NOT NULL THEN tbl_employer.user_id
            END) AS user_id,
            (CASE
                WHEN tbl_employee.Fname IS NOT NULL THEN CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname)
                WHEN tbl_employer.tradename IS NOT NULL THEN tbl_employer.tradename
            END) AS userName,
            (CASE
                WHEN tbl_employee.Employee_image IS NOT NULL THEN tbl_employee.Employee_image
                WHEN tbl_employer.image IS NOT NULL THEN tbl_employer.image
            END) AS userImage')
                ->from($this->Table->notification)
                ->where('tbl_notification.user_id', $user_id)
                ->join($this->Table->employee, 'tbl_employee.user_id = tbl_notification.from_user_id', 'left')
                ->join($this->Table->employer, 'tbl_employer.user_id = tbl_notification.from_user_id', 'left')
                ->order_by('date_created', 'DESC')
                ->get()->result();

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

    public function updateBatch($id, array $data): void
    {
        $this->db->where_in('id', $id)->update($this->Table->notification, $data);
    }

    public function deleteOldNotifications(): void
    {
        // Set the threshold for how old notifications should be before they are deleted
        $threshold = strtotime('-30 days');

        // Delete all notifications that are older than the threshold
        $this->db->where('date_created <', $threshold);
        $this->db->delete('notifications');
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
                return ['status' => 'success', 'message' => 'Notification added successfully.'];
            }

            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Failed to add a new notification.'];
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
                return ['status' => 'success', 'message' => 'Notification updated successfully.'];
            }

            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Failed to update the notification.'];
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }
}
