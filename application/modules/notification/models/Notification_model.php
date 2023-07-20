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
        if ($user_id) {
            $this->db->select()
                ->from($this->Table->notification)
                ->where('user_id', $user_id)
                ->order_by('date_created', 'DESC')
                ->get()->result();
        }

        return $this->db->get($this->Table->notification)->result();
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