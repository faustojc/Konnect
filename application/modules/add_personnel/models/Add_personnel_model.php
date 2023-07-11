<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_personnel_model extends CI_Model
{
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->session = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function add_personnel($info)
    {
        try {
            $locker = locker();
            $password = sha1(password_generator($info['password'], $locker));
            $info['password'] = $password;
            $info['locker'] = $locker;

            $this->db->trans_start();
            $this->db->insert('tbl_user', $info);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                set_userdata(USER, $info);
                return array(
                    'has_error' => false,
                    'message' => 'User Added',
                );
            } else {
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }
}
