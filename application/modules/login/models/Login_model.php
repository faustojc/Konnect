<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
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

    public function authenticate($info)
    {
        try {
            if (empty($info['email']) || empty($info['password'])) {
                return array('message' => REQUIRED_FIELD, 'has_error' => true);
            }

            $query = $this->db->select()
                ->from($this->Table->user)
                ->where('email', $info['email'])
                ->get()->row();

            if (empty($query)) {
                return array('message' => NO_ACCOUNT, 'has_error' => true);
            }

            if ($query->password !== sha1(password_generator($info['password'], $query->locker))) {
                return array('message' => NOT_MATCH, 'has_error' => true);
            }

            if ($info['user_type'] == 'EMPLOYER') {
                $user = $this->db->select()
                    ->from($this->Table->employer)
                    ->join('tbl_user', 'tbl_user.id = tbl_employer.user_id')
                    ->get()->row();
            } else {
                $user = $this->db->select()
                    ->from($this->Table->employee)
                    ->join('tbl_user', 'tbl_user.id = tbl_employee.user_id')
                    ->get()->row();
            }

            set_userdata(USER, $user);
            return array(
                'has_error' => false,
                'message' => 'Login Success',
            );

        } catch (Exception $ex) {
            return array('error_message' => $ex->getMessage(), 'has_error' => true);
        }
    }
}
