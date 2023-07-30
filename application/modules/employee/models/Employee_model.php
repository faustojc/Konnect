<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public $Table;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();
        $this->session = (object)get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
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

    public function getEmployeesLike(array $arr, $id = NULL, $select = 'tbl_employee.*, GROUP_CONCAT(DISTINCT tbl_employee_skill.skill) AS skills, GROUP_CONCAT(DISTINCT tbl_follow.id) AS follow_ids, tbl_feedback.rating AS ratings')
    {
        $this->db->select($select)
            ->from($this->Table->employee)
            ->join('tbl_employee_skill', 'tbl_employee_skill.employee_id = tbl_employee.ID', 'left')
            ->join('tbl_follow', 'tbl_follow.employee_id = tbl_employee.ID', 'left')
            ->join('(SELECT user_id, GROUP_CONCAT(rating) AS rating FROM tbl_feedback GROUP BY user_id) AS tbl_feedback', 'tbl_feedback.user_id = tbl_employee.user_id', 'left')
            ->group_by('tbl_employee.ID');

        if ($id != NULL) {
            $this->db->where('tbl_employee.ID !=', $id);
        }

        if (!empty($arr)) {
            $count = 0;
            $this->db->group_start();

            foreach ($arr as $key => $value) {
                if ($count == 0) {
                    $this->db->like('tbl_employee.' . $key, $value);
                } else {
                    $this->db->or_like('tbl_employee.' . $key, $value);
                }

                ++$count;
            }

            $this->db->group_end();
        }

        return $this->db->get()->result();
    }

}
