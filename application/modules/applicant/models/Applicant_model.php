<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant_model extends CI_Model
{
    /**
     * @var mixed
     */
    private $Table;

    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE);
    }

    public function getJobApplicants($jobpost_id)
    {
        return $this->db->select('tbl_applicant.*, 
        tbl_jobposting.id AS jobID, 
        CONCAT_WS(" ", tbl_employee.Fname, tbl_employee.Mname, tbl_employee.Lname) AS employeeName, 
        tbl_employee.id AS employeeID
        tbl_employee.Title AS employeeTitle, 
        tbl_employee.Employee_image AS employeeImage')
            ->from($this->Table->applicant)
            ->join($this->Table->employee, 'tbl_employee.ID = tbl_applicants.employee_id', 'inner')
            ->where('job_id', $jobpost_id)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicants.job_id')
            ->get()->result();
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
        tbl_employer.tradename AS employerName,
        tbl_employer.business_type AS employerType,
        tbl_employer.image AS employerLogo')
            ->from($this->Table->applicant)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicant.job_id')
            ->join($this->Table->employer, 'tbl_employer.id = tbl_jobposting.employer_id')
            ->where('employee_id', $employee_id)
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
        tbl_employer.tradename AS employerName,
        tbl_employer.business_type AS employerType,
        tbl_employer.image AS employerLogo')
            ->from($this->Table->applicant)
            ->where('tbl_applicant.id', $id)
            ->join($this->Table->jobposting, 'tbl_jobposting.id = tbl_applicant.job_id')
            ->join($this->Table->employer, 'tbl_employer.id = tbl_jobposting.employer_id')
            ->get()->row();
    }

    public function getJobApplied($employee_id)
    {
        return $this->db->select()
            ->from($this->Table->applicant)
            ->where('employee_id', $employee_id)
            ->get()->result();
    }

    /**
     * @throws Exception
     */
    public function setApplicantStatus($applicant_id, $status): array
    {
        try {
            $this->db->trans_start();
            $this->db->where('id', $applicant_id)->update($this->Table->applicant, array('status' => $status));
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('status' => 'success', 'message' => 'Applicant status updated successfully.');
            } else {
                $this->db->trans_rollback();
                return array('status' => 'error', 'message' => 'Applicant status update failed.');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @throws Exception
     */
    public function setApplication($job_id, $employee_id): array
    {
        $data = [
            'employee_id' => $employee_id,
            'job_id' => $job_id,
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
            if (!empty($status) && $status->status == 'PENDING') {
                $this->db->where('job_id', $job_id)
                    ->where('employee_id', $employee_id)
                    ->delete($this->Table->applicant);

                $message = 'Job application cancelled.';
                $apply_status = 'APPLY';
            } else {
                $this->db->insert($this->Table->applicant, $data);
                $message = 'Successfully applied to the job, waiting for the employer to accept your application.';
                $apply_status = 'PENDING';
            }

            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('status' => 'success', 'message' => $message, 'apply_status' => $apply_status);
            } else {
                $this->db->trans_rollback();
                return array('status' => 'error', 'message' => 'Application failed.');
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}