<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting_services_model extends CI_Model
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

    public function save($info): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->jobposting, $info);
            $new_id = $this->db->insert_id();
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();
            return ['message' => SAVED_SUCCESSFUL, 'has_error' => FALSE, 'id' => $new_id];
        } catch (Exception $msg) {
            return ['message' => $msg->getMessage(), 'has_error' => TRUE];
        }
    }

    public function update($info): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $info['id'])->update($this->Table->jobposting, $info);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();
            return ['message' => SAVED_SUCCESSFUL, 'has_error' => FALSE];

        } catch (Exception $msg) {
            return (['message' => $msg->getMessage(), 'has_error' => TRUE]);
        }
    }

    public function delete($id): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $id)->delete($this->Table->jobposting);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new RuntimeException(ERROR_PROCESSING, TRUE);
            }

            $this->db->trans_commit();
            return ['message' => SAVED_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return (['message' => $msg->getMessage(), 'has_error' => TRUE]);
        }
    }
}
