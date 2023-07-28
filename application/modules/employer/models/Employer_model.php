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

    public function get_employers($limit = 0, $id = NULL, $select = '*')
    {
        if ($limit == 0 && $id != NULL) {
            return $this->db->select($select)->get_where($this->Table->employer, ['id !=' => $id])->result();
        }

        if ($limit != 0 && $id != NULL) {
            return $this->db->select($select)->from($this->Table->employer)->where('id !=', $id)->limit($limit)->get()->result();
        }

        if ($limit != 0 && $id == NULL) {
            return $this->db->select($select)->from($this->Table->employer)->limit($limit)->get()->result();
        }

        return $this->db->select($select)->from($this->Table->employer)->get()->result();
    }

    public function get_employer($employer_id)
    {
        return $this->db->select()->from($this->Table->employer)->where('id', $employer_id)->get()->row();
    }

    public function where($column_name, $value)
    {
        return $this->db->select()->from($this->Table->employer)->where($column_name, $value)->get()->row();
    }

    public function getEmployerOnly($select, $id)
    {
        return $this->db->select($select)->from($this->Table->employer)->where('id', $id)->get()->row();
    }

    public function getEmployersLike(array $arr, $id = NULL, $select = '*')
    {
        $this->db->select($select)->from($this->Table->employer);
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

    public function getEmployersWhereIn(string $column, array $values, string $select = '*')
    {
        return $this->db->select($select)->from($this->Table->employer)->where_in($column, $values)->get()->result();
    }
}
