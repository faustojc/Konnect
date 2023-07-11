<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_model extends CI_Model
{
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

    public function get_employers($limit = 0, $id = null)
    {
        if ($limit == 0 && $id != null) {
            return $this->db->select()->from($this->Table->employer)->where('id !=', $id)->get()->result();
        } else if ($limit != 0 && $id != null) {
            return $this->db->select()->from($this->Table->employer)->where('id !=', $id)->limit($limit)->get()->result();
        } else if ($limit != 0 && $id == null) {
            return $this->db->select()->from($this->Table->employer)->limit($limit)->get()->result();
        }

        return $this->db->select()->from($this->Table->employer)->get()->result();
    }

    public function get_employer($employer_id)
    {
        return $this->db->select()->from($this->Table->employer)->where('id', $employer_id)->get()->row();
    }

    public function where($column_name, $value)
    {
        return $this->db->select()->from($this->Table->employer)->where($column_name, $value)->get()->row();
    }
}
