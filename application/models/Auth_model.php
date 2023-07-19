<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    protected $auth;
    protected $Table;

    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE);
    }

    public function get_all_auth()
    {
        return $this->db->select()
            ->from($this->Table->user)
            ->get()->result();
    }

    public function get_auth($user_id)
    {
        return $this->db->select()
            ->from($this->Table->user)
            ->where('id', $user_id)
            ->get()->row();
    }

    public function check_permission($user, $other): bool
    {
        $current = $this->get_auth($user->user_id);
        $other = $this->get_auth($other->user_id);

        return $current->locker == $other->locker;
    }

    /**
     * @throws Exception
     */
    public function update_auth($user_id, $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $user_id)->update($this->Table->user, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('status' => true, 'message' => 'Successfully updated user.');
            } else {
                $this->db->trans_rollback();
                return array('status' => false, 'message' => 'Failed to update user.');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}