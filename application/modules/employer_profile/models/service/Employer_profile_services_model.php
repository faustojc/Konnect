<?php
defined('BASEPATH') or exit('No direct script access allowed');

class employer_profile_services_model extends CI_Model
{
    private $userdata;
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function save($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->employer, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    public function update($data): array
    {
        $x = $this->userdata->user_id;

        try {
            $this->db->trans_start();
            $this->db->where('id', $this->userdata->id)->update($this->Table->employer, $data);
            $this->db->trans_complete();

            $this->Auth_model->update_auth($this->userdata->user_id, array('email' => $data['email']));

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => UPDATE_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }
}