<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employee_educ_services_model extends CI_Model
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

    public function save()
    {
        try {
            if (
                empty($this->Employee_id) ||
                empty($this->Level) ||
                empty($this->Title) ||
                empty($this->Institution) ||
                empty($this->Description) ||
                empty($this->Start_date) ||
                empty($this->End_date) ||
                empty($this->Hours)
            ) {
                throw new Exception(MISSING_DETAILS, true);
            }

            $data = array(

                'Employee_id' => $this->Employee_id,
                'Level' => $this->Level,
                'Title' => $this->Title,
                'Institution' => $this->Institution,
                'Description' => $this->Description,
                'Start_date' => $this->Start_date,
                'End_date' => $this->End_date,
                'Hours' => $this->Hours,

            );

            $this->db->trans_start();
            $this->db->insert($this->Table->employee_educ, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception$msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function edit($data)
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $data['ID'])->update($this->Table->employee_educ, $data);
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
            $this->db->where('ID', $id)->delete($this->Table->employee_educ);
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