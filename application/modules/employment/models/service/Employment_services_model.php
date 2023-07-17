<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employment_services_model extends CI_Model
{
    public $ID;
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    /**
     * Saves a record to the database
     * @param array $data The data to insert a new record to table
     * @return array Returns an array with message and a boolean has_error
     */
    public function save(array $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->employment, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    /**
     * Updates a record in the database
     * @param string $id The id of the record to be updated
     * @param array $data The data to update a record
     * @return array Returns an array with message and its boolean has_error
     */
    public function update(string $id, array $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->update($this->Table->employment, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => UPDATE_SUCCESSFUL, 'has_error' => false);
            } else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    /**
     * Delete a record from table by its id
     * @param string $id The id of the record to be deleted
     * @return array
     */
    public function delete(string $id): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->delete($this->Table->employment);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => DELETED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }
}