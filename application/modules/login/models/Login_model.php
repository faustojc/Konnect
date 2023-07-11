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

    public function authentication($info)
    {
        try {
            if (empty($info['email']) || empty($info['password'])) {
                return array('message' => REQUIRED_FIELD, 'has_error' => true);
            }

            $query = $this->db->select()
                ->from('tbl_user')
                ->where('username', $info['username'])
                ->get()->row();

            if (empty($query)) {
                return array('message' => NO_ACCOUNT, 'has_error' => true);
            }

            if ($query->password !== sha1(password_generator($info['password'], $query->locker))) {
                return array('message' => NOT_MATCH, 'has_error' => true);
            }

            set_userdata(USER, $query);
            return array(
                'has_error' => false,
                'message' => 'Login Success',
            );

        } catch (Exception $ex) {
            return array('error_message' => $ex->getMessage(), 'has_error' => true);
        }
    }
}
