<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
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

    public function getEmployee($id)
    {
        return $this->db->select()
            ->from($this->Table->employee)
            ->where('ID', $id)
            ->or_where('user_id', $id)
            ->get()->row();
    }

    public function get_all_employees($limit = 0, $id = NULL, $select = '*')
    {
        if ($limit == 0 && $id != NULL) {
            return $this->db->select($select)->from($this->Table->employee)->where('ID !=', $id)->get()->result();
        }

        if ($limit != 0 && $id != NULL) {
            return $this->db->select($select)->from($this->Table->employee)->where('ID !=', $id)->limit($limit)->get()->result();
        }

        if ($limit != 0 && $id == NULL) {
            return $this->db->select($select)->from($this->Table->employee)->limit($limit)->get()->result();
        }

        return $this->db->select($select)->from($this->Table->employee)->get()->result();
    }

    public function get_educ()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employee_educ);

        return $this->db->get()->result();
    }

    public function getEmployeesLike(array $arr, $id = NULL, $select = '*')
    {
        $this->db->select($select)->from($this->Table->employee);
        if ($id != NULL) {
            $this->db->where('ID !=', $id);
        }

        if (!empty($arr)) {
            $count = 0;
            $this->db->group_start();

            foreach ($arr as $key => $value) {
                if ($count == 0) {
                    $this->db->like($key, $value);
                } else {
                    $this->db->or_like($key, $value);
                }

                ++$count;
            }

            $this->db->group_end();
        }

        return $this->db->get()->result();
    }

}
