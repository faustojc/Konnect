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
     * @param string $table The table to save the data
     * @param array $data The data to insert a new record to table
     * @return array Returns an array with message and a boolean has_error
     * @throws Exception Throws an Exception
     */
    public function save(string $table, array $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($table, $data);
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

    public function edit()
    {
        try {
            $data = array(
                'ID' => $this->ID,
                'employee_id' => $this->employee_id,
                'employer_id' => $this->employer_id,
                'position' => $this->position,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status,
                'rating' => $this->rating,
                'show_status' => $this->show_status
            );

            var_dump($data);

            $this->db->trans_start();
            $this->db->where('ID', $data['ID']);
            $this->db->update($this->Table->employment, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function delete($id)
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->delete($this->Table->employment);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }
}