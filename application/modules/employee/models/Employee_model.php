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

    public function get_all_employees($limit = 0, $id = NULL, $select = 'tbl_employee.*, tbl_user.is_verified AS user_verified')
    {
        if ($limit == 0 && $id != NULL) {
            return $this->db->select($select)->from($this->Table->employee)
                ->join($this->Table->user, 'tbl_user.id = tbl_employee.user_id')
                ->where('tbl_employee.ID !=', $id)
                ->get()->result();
        }

        if ($limit != 0 && $id != NULL) {
            return $this->db->select($select)->from($this->Table->employee)
                ->join($this->Table->user, 'tbl_user.id = tbl_employee.user_id')
                ->where('tbl_employee.ID !=', $id)->limit($limit)
                ->get()->result();
        }

        if ($limit != 0 && $id == NULL) {
            return $this->db->select($select)->from($this->Table->employee)
                ->join($this->Table->user, 'tbl_user.id = tbl_employee.user_id')
                ->limit($limit)->get()->result();
        }

        return $this->db->select($select)->from($this->Table->employee)
            ->join($this->Table->user, 'tbl_user.id = tbl_employee.user_id')
            ->get()->result();
    }

    public function get_educ()
    {
        $this->db->select('*');
        $this->db->from($this->Table->employee_educ);

        return $this->db->get()->result();
    }

    public function getEmployeesLike(array $arr, $id = NULL, $select = 'tbl_employee.*, tbl_user.is_verified as user_verified, GROUP_CONCAT(DISTINCT tbl_employee_skill.skill) AS skills, GROUP_CONCAT(DISTINCT tbl_follow.id) AS follow_ids, tbl_feedback.rating AS ratings')
    {
        $this->db->select($select)
            ->from($this->Table->employee)
            ->join('tbl_employee_skill', 'tbl_employee_skill.employee_id = tbl_employee.ID', 'left')
            ->join('tbl_follow', 'tbl_follow.employee_id = tbl_employee.ID', 'left')
            ->join('(SELECT user_id, GROUP_CONCAT(rating) AS rating FROM tbl_feedback GROUP BY user_id) AS tbl_feedback', 'tbl_feedback.user_id = tbl_employee.user_id', 'left')
            ->join('tbl_user', 'tbl_user.id = tbl_employee.user_id', 'left')
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

    public function update($id, $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->update($this->Table->employee, $data);

            if (!empty($data['Email'])) {
                $this->Auth_model->update_auth($this->userdata->user_id, ['email' => $data['Email']]);
            }

            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();

                set_userdata(USER, $this->getEmployee($id));
                return ['message' => UPDATE_SUCCESSFUL, 'has_error' => FALSE];
            }

            $this->db->trans_rollback();
            throw new RuntimeException(ERROR_PROCESSING, TRUE);
        } catch (Exception $e) {
            return ['message' => $e->getMessage(), 'has_error' => TRUE];
        }
    }

    public function delete($id): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->delete($this->Table->employee);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new RuntimeException(ERROR_PROCESSING, TRUE);
            }

            $this->db->trans_commit();
            return ['message' => DELETED_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return (['message' => $msg->getMessage(), 'has_error' => TRUE]);
        }
    }
}
