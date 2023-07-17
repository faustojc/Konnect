<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow_service_model extends CI_Model
{
    /**
     * @var array|mixed|null
     */
    private $userdata;
    /**
     * @var mixed
     */
    private $Table;

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
            $this->db->insert($this->Table->follow, $data);
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

    public function update($id, $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $id)->update($this->Table->follow, $data);
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

    public function delete($data): array
    {
        try {
            $this->db->trans_start();
            $query = $this->db->select('id')
                ->from($this->Table->follow)
                ->where('employee_id', $data['employee_id'])
                ->where('employer_id', $data['employer_id'])
                ->get()->row();

            $this->db->where('id', $query->id)->delete($this->Table->follow);
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
}