<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employer_services_model extends CI_Model
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

    // Register employer
    public function save()
    {
        try {
            $data = array(
                'employer_name' => $this->employer_name,
                'email' => $this->email,
                'tradename' => $this->tradename,
                'city' => $this->city,
                'barangay' => $this->barangay,
                'address' => $this->address,
                'business_type' => $this->business_type,
                'contact_number' => $this->contact_number,
                'sss' => $this->sss,
                'tin' => $this->tin,
                'date_created' => date('Y-m-d H:i:s'),
            );

            $this->db->trans_start();
            $this->db->insert($this->Table->employer, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
            else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }

        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    public function update($data)
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $data['id'])->update($this->Table->employer, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
            else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    public function delete($id)
    {
        try {
            $this->db->trans_start();
            $this->db->delete($this->Table->employer, 'id = ' . $id);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
            else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    public function search_employers()
    {
        try {
            $result = $this->db->select()->from($this->Table->employer)
                ->like('employer_name', $this->search_text)
                ->or_like('tradename', $this->search_text)
                ->or_like('business_type', $this->search_text)
                ->get()->result();

            return $result;
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }
}