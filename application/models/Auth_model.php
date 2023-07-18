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
}