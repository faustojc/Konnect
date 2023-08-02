<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobposting_model extends CI_Model
{
    protected $userdata;
    public $Table;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();
        $this->userdata = get_userdata(USER);

        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
    }

    public function get_all_jobposts($limit = 0)
    {
        if ($limit == 0) {
            return $this->db->select('tbl_jobposting.*, tbl_user.is_verified AS user_verified, tbl_employer.id AS EmployerId, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo')
                ->from($this->Table->jobposting)
                ->join($this->Table->employer, $this->Table->employer . '.id = ' . $this->Table->jobposting . '.employer_id')
                ->join($this->Table->user, $this->Table->user . '.id = ' . $this->Table->employer . '.user_id')
                ->order_by('date_posted', 'DESC')->get()->result();
        }

        return $this->db->select('tbl_jobposting.*, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo')
            ->from($this->Table->jobposting)
            ->join($this->Table->employer, $this->Table->employer . '.id = ' . $this->Table->jobposting . '.employer_id')
            ->order_by('date_posted', 'DESC')->limit($limit)->get()->result();
    }

    public function get_employer_jobposts($id, $limit = 0, $select = 'tbl_jobposting.*, tbl_user.is_verified AS user_verified, tbl_employer.id AS employer_id, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo')
    {
        if ($limit == 0) {
            return $this->db->select($select)->from($this->Table->jobposting)
                ->join('tbl_employer', 'tbl_employer.id = tbl_jobposting.employer_id')
                ->join('tbl_user', 'tbl_user.id = tbl_employer.user_id')
                ->where('tbl_jobposting.employer_id', $id)
                ->order_by('date_posted', 'DESC')
                ->get()->result();
        }

        return $this->db->select($select)->from($this->Table->jobposting)
            ->join('tbl_employer', 'tbl_employer.id = tbl_jobposting.employer_id')
            ->where('tbl_jobposting.employer_id', $id)
            ->order_by('date_posted', 'DESC')
            ->limit($limit)->get()->result();
    }

    public function job_info($id)
    {
        return $this->db->select('tbl_jobposting.*, tbl_user.is_verified AS user_verified, tbl_employer.tradename AS EmployerTradename, tbl_employer.image AS EmployerLogo')
            ->from($this->Table->jobposting)
            ->join($this->Table->employer, $this->Table->employer . '.id = ' . $this->Table->jobposting . '.employer_id')
            ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
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

    public function getJobsLike($field, $keyword, $select = 'tbl_jobposting.*, tbl_user.is_verified AS user_verified, tbl_employer.* AS employer')
    {
        return $this->db->select($select)
            ->join('tbl_employer', 'tbl_employer.id = tbl_jobposting.employer_id')
            ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
            ->like($field, $keyword)
            ->get($this->Table->jobposting)->result();
    }

    public function getJobpostSelect($id, $select = '*')
    {
        return $this->db->select($select)->get_where($this->Table->jobposting, ['id' => $id])->row();
    }
}
