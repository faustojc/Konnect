<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
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

    public function register($user, $info): array
    {
        try {
            $locker = auth_token();
            $password = sha1(password_generator($user['password'], $locker));
            $user['password'] = $password;
            $user['locker'] = $locker;

            $this->db->trans_start();
            $this->db->insert($this->Table->user, $user);

            // Get the ID of the newly inserted user record
            $user_id = $this->db->insert_id();
            // Set the user_id foreign key in the employer table
            $info['user_id'] = $user_id;

            if ($user['user_type'] == 'EMPLOYEE') {
                $this->db->insert($this->Table->employee, $info);
            } else {
                $this->db->insert($this->Table->employer, $info);
            }

            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                sendEmail(
                    'unofficial.konnect.me@gmail.com',
                    'Konnect',
                    $user['email'],
                    'Email Verification',
                    'Please click on the link below to verify your email address: ' . base_url() . 'verify?v=' . $user['locker'],
                );

                return [
                    'has_error' => FALSE,
                    'message' => 'Thank you for registering. You will be redirect to login page.',
                ];
            }

            return ['message' => ERROR_PROCESSING, 'has_error' => TRUE];
        } catch (Exception $e) {
            return ['message' => $e->getMessage(), 'has_error' => TRUE];
        }
    }

    public function records()
    {
        return $this->db->get($this->Table->user)->result();
    }
}
