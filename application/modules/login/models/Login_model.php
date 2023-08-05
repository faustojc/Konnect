<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
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

    public function authenticate($info): array
    {
        try {
            if (empty($info['email']) || empty($info['password'])) {
                return ['message' => REQUIRED_FIELD, 'has_error' => TRUE];
            }

            $query = $this->db->select()
                ->from($this->Table->user)
                ->where('email', $info['email'])
                ->where('user_type', $info['user_type'])
                ->get()->row_array();

            if (empty($query)) {
                return ['message' => NO_ACCOUNT, 'has_error' => TRUE];
            }

            if ($query['password'] !== sha1(password_generator($info['password'], $query['locker']))) {
                return ['message' => NOT_MATCH, 'has_error' => TRUE];
            }

            if ($info['user_type'] == 'EMPLOYER') {
                $user = $this->db->select()
                    ->from($this->Table->employer)
                    ->where('user_id', $query['id'])
                    ->get()->row();
            } else {
                $user = $this->db->select()
                    ->from($this->Table->employee)
                    ->where('user_id', $query['id'])
                    ->get()->row();
            }

            set_userdata(USER, $user);
            set_userdata(AUTH, $query);
            return [
                'has_error' => FALSE,
                'message' => 'Login Success',
            ];

        } catch (Exception $ex) {
            return ['error_message' => $ex->getMessage(), 'has_error' => TRUE];
        }
    }
}
