<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $Table;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
    }

    public function get_all_auth()
    {
        return $this->db->select()
            ->from($this->Table->user)
            ->get()->result();
    }

    public function get_auth($user_id)
    {
        return $this->db->get_where($this->Table->user, ['id' => $user_id])->row();
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
                return ['status' => TRUE, 'message' => 'Successfully updated user.'];
            }

            $this->db->trans_rollback();
            return ['status' => FALSE, 'message' => 'Failed to update user.'];
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }

    public function verifyUser($user, $verification): bool
    {
        $auth = $this->get_auth($user->user_id);

        if ($auth->locker == $verification) {
            $this->db->where('id', $user->id)->update($this->Table->user, ['verified' => 1]);
            return TRUE;
        }

        return FALSE;
    }
}
