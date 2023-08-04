<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employer_model extends CI_Model
{
    public $Table;
    private $userdata;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);
        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
    }

    public function get_employers($limit = 0, $id = NULL, $select = 'tbl_employer.*, tbl_user.is_verified AS user_verified')
    {
        if ($limit == 0 && $id != NULL) {
            return $this->db->select($select)
                ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
                ->get_where($this->Table->employer, ['tbl_employer.id !=' => $id])
                ->result();
        }

        if ($limit != 0 && $id != NULL) {
            return $this->db->select($select)->from($this->Table->employer)
                ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
                ->where('tbl_employer.id !=', $id)
                ->limit($limit)->get()->result();
        }

        if ($limit != 0 && $id == NULL) {
            return $this->db->select($select)->from($this->Table->employer)
                ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
                ->limit($limit)->get()->result();
        }

        return $this->db->select($select)->from($this->Table->employer)
            ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
            ->get()->result();
    }

    public function where($column_name, $value)
    {
        return $this->db->select()->from($this->Table->employer)->where($column_name, $value)->get()->row();
    }

    public function getEmployerOnly($select, $id)
    {
        return $this->db->select($select)->from($this->Table->employer)->where('id', $id)->get()->row();
    }

    public function getEmployersLike(array $arr, $id = NULL, $select = 'tbl_employer.*, tbl_user.is_verified AS user_verified, GROUP_CONCAT(DISTINCT tbl_follow.id) AS follower_ids, tbl_feedback.rating AS ratings')
    {
        $this->db->select($select)->from($this->Table->employer)
            ->join('tbl_feedback', 'tbl_feedback.user_id = tbl_employer.user_id', 'left')
            ->join('tbl_follow', 'tbl_follow.employer_id = tbl_employer.id', 'left')
            ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id', 'left')
            ->group_by('tbl_employer.id');

        if ($id != NULL) {
            $this->db->where('tbl_employer.id !=', $id);
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

    public function save($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->employer, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();
            return ['message' => SAVED_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return ['message' => $msg->getMessage(), 'has_error' => TRUE];
        }
    }

    public function update($data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $this->userdata->id)->update($this->Table->employer, $data);

            if (!empty($data['email'])) {
                $this->Auth_model->update_auth($this->userdata->user_id, ['email' => $data['email']]);
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
            }

            $this->db->trans_commit();

            set_userdata(USER, $this->getEmployerOnly('*', $this->userdata->id));
            return ['message' => UPDATE_SUCCESSFUL, 'has_error' => FALSE];
        } catch (Exception $msg) {
            return ['message' => $msg->getMessage(), 'has_error' => TRUE];
        }
    }
}
