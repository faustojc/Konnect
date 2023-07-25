<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting_model extends CI_Model
{
    protected $userdata;
    public $Table;

    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        // if(is_empty_object($this->session)){
        // 	redirect(base_url().'login/authentication', 'refresh');
        // }

        $model_list = [];
        $this->load->model($model_list);
        $this->Table = json_decode(TABLE);
    }

    public function get_all_jobposts($limit = 0)
    {
        if ($limit == 0) {
            return $this->db->select('tbl_jobposting.*, tbl_employer.id AS EmployerId, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo')
                ->from($this->Table->jobposting)
                ->join($this->Table->employer, $this->Table->employer . '.id = ' . $this->Table->jobposting . '.employer_id')
                ->order_by('date_posted', 'DESC')->get()->result();
        }

        return $this->db->select('tbl_jobposting.*, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo')
            ->from($this->Table->jobposting)
            ->join($this->Table->employer, $this->Table->employer . '.id = ' . $this->Table->jobposting . '.employer_id')
            ->order_by('date_posted', 'DESC')->limit($limit)->get()->result();
    }

    public function get_employer_jobposts($id, $limit = 0)
    {
        if ($limit == 0) {
            return $this->db->select()->from($this->Table->jobposting)->where('employer_id', $id)->order_by('date_posted', 'DESC')->get()->result();
        } else {
            return $this->db->select()->from($this->Table->jobposting)->where('employer_id', $id)->order_by('date_posted', 'DESC')->limit($limit)->get()->result();
        }
    }

    public function job_info($id)
    {
        return $this->db->select('tbl_jobposting.*, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo')
            ->from($this->Table->jobposting)
            ->join($this->Table->employer, $this->Table->employer . '.id = ' . $this->Table->jobposting . '.employer_id')
            ->where('tbl_jobposting.id', $id)
            ->order_by('date_posted', 'DESC')->get()->row();
    }

    public function getEmployerByJobpost($job_id)
    {
        return $this->db->select('tbl_employer.id, tbl_employer.user_id')
            ->from($this->Table->jobposting)
            ->join($this->Table->employer, $this->Table->employer . '.id = ' . $this->Table->jobposting . '.employer_id')
            ->where('tbl_jobposting.id', $job_id)
            ->get()->row();
    }

    public function getJob($id, $select = '*')
    {
        return $this->db->select($select)->get_where($this->Table->jobposting, ['id' => $id])->row();
    }

    public function getJobWhereIn($ids, $select = '*')
    {
        return $this->db->select($select)
            ->join('tbl_employer', 'tbl_employer.id = tbl_jobposting.employer_id')
            ->where_in('tbl_jobposting.id', $ids)
            ->order_by('date_posted', 'DESC')
            ->get($this->Table->jobposting)->result();
    }

    public function getJobLike($field, $keyword, $select = '*')
    {
        return $this->db->select($select)
            ->join('tbl_employer', 'tbl_employer.id = tbl_jobposting.employer_id')
            ->like($field, $keyword)
            ->get($this->Table->jobposting)->result();
    }
}
