<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant_model extends CI_Model
{
    /**
     * @var mixed
     */
    private $Table;

    /**
     * @throws JsonException
     */
    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE, FALSE, 512, JSON_THROW_ON_ERROR);
    }

    public function getApplicant($id, $job_id)
    {
        return $this->db->select('tbl_applicant.*, 
        tbl_user.is_verified AS user_verified, 
        tbl_user.email AS email,
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employeeName, 
        tbl_employee.user_id AS employeeUserID,
        tbl_jobposting.title AS jobTitle,
        tbl_jobposting.job_type AS jobType,')
            ->from($this->Table->applicant)
            ->join('tbl_jobposting', 'tbl_jobposting.id = tbl_applicant.job_id', 'inner')
            ->join($this->Table->employee, 'tbl_employee.ID = tbl_applicant.employee_id', 'inner')
            ->join($this->Table->user, 'tbl_user.id = tbl_employee.user_id', 'inner')
            ->where('tbl_applicant.id', $id)
            ->or_where('tbl_applicant.employee_id', $id)
            ->where('tbl_applicant.job_id', $job_id)
            ->get()->row();
    }

    public function getJobApplicants($job_id)
    {
        return $this->db->select('tbl_applicant.*, 
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employeeName, 
        tbl_employee.Title AS employeeTitle, 
        tbl_employee.Employee_image AS employeeImage')
            ->from($this->Table->applicant)
            ->join($this->Table->employee, 'tbl_employee.ID = tbl_applicant.employee_id', 'inner')
            ->where('job_id', $job_id)
            ->order_by('tbl_applicant.date_created', 'DESC')
            ->get()->result();
    }

    public function getEmployerApplicants($employer_id)
    {
        return $this->db->select('tbl_applicant.*, 
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employeeName, 
        tbl_employee.Title AS employeeTitle, 
        tbl_employee.Employee_image AS employeeImage, 
        tbl_employee.Province AS employeeProvince,
        tbl_employee.City AS employeeCity,
        tbl_employee.Address AS employeeAddress,
        tbl_employee.Email AS employeeEmail,
        tbl_resume.file_name AS resumeFileName,
        tbl_resume.file_size AS resumeFileSize,')
            ->from($this->Table->applicant)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicant.job_id')
            ->join($this->Table->employer, 'tbl_employer.id = tbl_jobposting.employer_id')
            ->join($this->Table->employee, 'tbl_employee.ID = tbl_applicant.employee_id')
            ->join($this->Table->resume, 'tbl_resume.employee_id = tbl_applicant.employee_id', 'left')
            ->where('tbl_employer.id', $employer_id)
            ->order_by('tbl_applicant.date_created', 'DESC')
            ->get()->result();
    }

    public function getEmployerByApplicant($applicant_id)
    {
        return $this->db->select('tbl_employer.tradename AS employerName,')
            ->from($this->Table->applicant)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicant.job_id')
            ->join($this->Table->employer, 'tbl_employer.id = tbl_jobposting.employer_id')
            ->where('tbl_applicant.id', $applicant_id)
            ->get()->row();
    }

    public function getAppliedJobs($employee_id)
    {
        return $this->db->select('tbl_applicant.*,
        tbl_jobposting.id AS jobID,
        tbl_jobposting.title AS jobTitle,
        tbl_jobposting.description AS jobDescription,
        tbl_jobposting.salary AS jobSalary,
        tbl_jobposting.shift AS jobShift,
        tbl_jobposting.job_type AS jobType,
        tbl_jobposting.date_posted as jobDatePosted,
        tbl_jobposting.filled AS jobStatus,
        tbl_user.is_verified AS user_verified,
        tbl_employer.tradename AS employerName,
        tbl_employer.business_type AS employerType,
        tbl_employer.image AS employerLogo')
            ->from($this->Table->applicant)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicant.job_id')
            ->join($this->Table->employer, 'tbl_employer.id = tbl_jobposting.employer_id')
            ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
            ->where('employee_id', $employee_id)
            ->order_by('tbl_applicant.date_created', 'DESC')
            ->get()->result();
    }

    public function getAppliedJobsLike($employee_id, $field, $value)
    {
        return $this->db->select('tbl_applicant.*,
        tbl_jobposting.id AS jobID,
        tbl_jobposting.title AS jobTitle,
        tbl_jobposting.description AS jobDescription,
        tbl_jobposting.salary AS jobSalary,
        tbl_jobposting.shift AS jobShift,
        tbl_jobposting.job_type AS jobType,
        tbl_jobposting.date_posted as jobDatePosted,
        tbl_jobposting.filled AS jobStatus,
        tbl_user.is_verified AS user_verified,
        tbl_employer.tradename AS employerName,
        tbl_employer.business_type AS employerType,
        tbl_employer.image AS employerLogo')
            ->from($this->Table->applicant)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicant.job_id')
            ->join($this->Table->employer, 'tbl_employer.id = tbl_jobposting.employer_id')
            ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
            ->where('employee_id', $employee_id)
            ->like($field, $value)
            ->order_by('tbl_applicant.date_created', 'DESC')
            ->get()->result();
    }

    public function getSelectedAppliedJob($id)
    {
        return $this->db->select('tbl_applicant.*,
        tbl_jobposting.id AS jobID,
        tbl_jobposting.title AS jobTitle,
        tbl_jobposting.description AS jobDescription,
        tbl_jobposting.salary AS jobSalary,
        tbl_jobposting.shift AS jobShift,
        tbl_jobposting.job_type AS jobType,
        tbl_jobposting.date_posted as jobDatePosted,
        tbl_jobposting.filled AS jobStatus,
        tbl_user.is_verified AS user_verified,
        tbl_employer.tradename AS employerName,
        tbl_employer.business_type AS employerType,
        tbl_employer.image AS employerLogo')
            ->from($this->Table->applicant)
            ->where('tbl_applicant.id', $id)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicant.job_id')
            ->join($this->Table->employer, 'tbl_employer.id = tbl_jobposting.employer_id')
            ->join($this->Table->user, 'tbl_user.id = tbl_employer.user_id')
            ->get()->row();
    }

    public function getApplicantByJob($job_id, $employee_id, $select = '*')
    {
        return $this->db->select($select)->get_where($this->Table->applicant, ['job_id' => $job_id, 'employee_id' => $employee_id])->row();
    }

    public function getJobApplied($employee_id)
    {
        return $this->db->select()
            ->from($this->Table->applicant)
            ->where('employee_id', $employee_id)
            ->order_by('date_created', 'DESC')
            ->get()->result();
    }

    /**
     * @throws Exception
     */
    public function setApplicantStatus($applicant_id, $status): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $applicant_id)->update($this->Table->applicant, ['status' => $status]);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return ['status' => 'success', 'message' => 'Applicant status updated successfully.'];
            }

            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Applicant status update failed.'];
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @throws Exception
     */
    public function setApplication($job_id, $employee_id, $title): array
    {
        $data = [
            'employee_id' => $employee_id,
            'job_id' => $job_id,
            'job_title' => $title,
            'status' => 'PENDING',
        ];

        try {
            $status = $this->db->select('status')
                ->from($this->Table->applicant)
                ->where('job_id', $job_id)
                ->where('employee_id', $employee_id)
                ->get()->row();

            $this->db->trans_start();

            // If the status is pending, then cancel the application, else, apply to the job.
            if (!empty($status) && $status->status == Applicant::PENDING) {
                $this->db->where('job_id', $job_id)
                    ->where('employee_id', $employee_id)
                    ->delete($this->Table->applicant);

                $message = 'Job application cancelled.';
                $apply_status = Applicant::ACCEPTED;
            } else {
                $this->db->insert($this->Table->applicant, $data);
                $message = 'Successfully applied to the job, waiting for the employer to accept your application.';
                $apply_status = Applicant::PENDING;
            }

            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return ['status' => 'success', 'message' => $message, 'apply_status' => $apply_status];
            }

            $this->db->trans_rollback();
            return ['status' => 'error', 'message' => 'Application failed.'];
        } catch (Exception $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }
    }
}
