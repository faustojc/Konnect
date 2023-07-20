<?php
defined('BASEPATH') or exit('No direct script access allowed');
class beu_dashboard_services_model extends CI_Model
{
    public $ID;
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->session = (object) get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function btn_post()
    {
        try {
            if (
                empty($this->employer_id) ||
                empty($this->title) ||
                empty($this->description) ||
                empty($this->start_date) ||
                empty($this->filled) ||
                empty($this->salary) ||
                empty($this->shift) ||
                empty($this->job_type)
            ) {
                throw new Exception(MISSING_DETAILS, true);
            }

            $data = array(

                'employer_id' => $this->employer_id,
                'title' => $this->title,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'filled' => $this->filled,
                'salary' => $this->salary,
                'shift' => $this->shift,
                'job_type' => $this->job_type,

            );

            $this->db->trans_start();
            $this->db->insert($this->Table->jobposting, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }




}