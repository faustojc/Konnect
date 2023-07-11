<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile_services_model extends CI_Model
{
    public $ID;
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

    public function update_address()
    {
        try {
            $data = array(
                'Address' => $this->Address,
                'Barangay' => $this->Barangay,
                'City' => $this->City,

            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            // $this->db->join($this->Table->employee_educ.' ed', 'ed.Employee_id = e.ID', 'left');
            $this->db->update($this->Table->employee, $data);
            // $this->db->update($this->Table->employee_educ, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            } else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    public function update()
    {
        try {
            $data = array(
                'Introduction' => $this->Introduction,

            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            // $this->db->join($this->Table->employee_educ.' ed', 'ed.Employee_id = e.ID', 'left');
            $this->db->update($this->Table->employee, $data);
            // $this->db->update($this->Table->employee_educ, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            } else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    public function update_id()
    {
        try {
            $data = array(
                'SSS' => $this->SSS,
                'Tin' => $this->Tin,
                'Phil_health' => $this->Phil_health,
                'Pag_ibig' => $this->Pag_ibig,

            );

            $this->db->trans_start();
            $this->db->where('ID', $this->ID);
            // $this->db->join($this->Table->employee_educ.' ed', 'ed.Employee_id = e.ID', 'left');
            $this->db->update($this->Table->employee, $data);
            // $this->db->update($this->Table->employee_educ, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            } else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    public function save_employment()
    {
        try {
            $data = array(
                'employee_id' => $this->employee_id,
                'employer_id' => $this->employer_id,
                'position' => $this->position,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status,
                'rating' => $this->rating,
                'show_status' => $this->show_status,
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->db->trans_start();

            $this->db->insert($this->Table->employment, $data);

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

    public function edit_employment()
    {
        try {
            $data = array(
                'ID' => $this->employment_id,
                'employee_id' => $this->employee_id,
                'employer_id' => $this->employer_id,
                'position' => $this->position,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'status' => $this->status,
                'rating' => $this->rating,
                // 'job_description' => $this->job_description,
                // 'show_status' => $this->show_status
            );

            $this->db->trans_start();
            $this->db->where('ID', $data['ID']);
            $this->db->update($this->Table->employment, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function delete_employment($id)
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->delete($this->Table->employment);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function delete($id)
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->delete($this->Table->employee_educ);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function save()
    {
        try {
            if (
                empty($this->Employee_id) ||
                empty($this->Level) ||
                empty($this->Title) ||
                empty($this->Institution) ||
                empty($this->Description) ||
                empty($this->Start_date) ||
                empty($this->End_date) ||
                empty($this->Hours)
            ) {
                throw new Exception(MISSING_DETAILS, true);
            }

            $data = array(

                'Employee_id' => $this->Employee_id,
                'Level' => $this->Level,
                'Title' => $this->Title,
                'Institution' => $this->Institution,
                'Description' => $this->Description,
                'Start_date' => $this->Start_date,
                'End_date' => $this->End_date,
                'Hours' => $this->Hours,

            );

            $this->db->trans_start();
            $this->db->insert($this->Table->employee_educ, $data);
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

    public function save_training($data)
    {
        try {
            $this->db->trans_start();
            $this->db->insert($this->Table->training, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return array('message' => $msg->getMessage(), 'has_error' => true);
        }
    }

    public function delete_training($id)
    {
        try {
            $this->db->trans_start();
            $this->db->where('ID', $id)->delete($this->Table->training);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function edit_educ()
    {
        try {
            if (
                empty($this->ID) ||
                empty($this->Employee_id) ||
                empty($this->Level) ||
                empty($this->Title) ||
                empty($this->Institution) ||
                empty($this->Description) ||
                empty($this->Start_date) ||
                empty($this->End_date) ||
                empty($this->Hours)
            ) {
                throw new Exception(MISSING_DETAILS, true);
            }
            $data = array(
                'ID' => $this->ID,
                'Employee_id' => $this->Employee_id,
                'Level' => $this->Level,
                'Title' => $this->Title,
                'Institution' => $this->Institution,
                'Description' => $this->Description,
                'Start_date' => $this->Start_date,
                'End_date' => $this->End_date,
                'Hours' => $this->Hours,
            );

            $this->db->trans_start();
            $this->db->where('Employee_id', $data['Employee_id']);
            $this->db->update($this->Table->employee_educ, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function save_skill()
    {
        try {
            if (
                empty($this->employee_id) ||
                empty($this->skill) ||
                empty($this->proficiency) ||
                empty($this->years_exp)

            ) {
                throw new Exception(MISSING_DETAILS, true);
            }

            $data = array(

                'employee_id' => $this->employee_id,
                'skill' => $this->skill,
                'proficiency' => $this->proficiency,
                'years_exp' => $this->years_exp,

            );

            $this->db->trans_start();
            $this->db->insert($this->Table->employee_skill, $data);
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

    public function edit_skill()
    {
        try {
            if (
                empty($this->id) ||
                empty($this->employee_id) ||
                empty($this->skill) ||
                empty($this->proficiency) ||
                empty($this->years_exp)
            ) {
                throw new Exception(MISSING_DETAILS, true);
            }
            $data = array(
                'id' => $this->id,
                'employee_id' => $this->employee_id,
                'skill' => $this->skill,
                'proficiency' => $this->proficiency,
                'years_exp' => $this->years_exp,
            );

            $this->db->trans_start();
            $this->db->where('id', $this->id);
            $this->db->update($this->Table->employee_skill, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return array('message' => ERROR_PROCESSING, 'has_error' => true);
            } else {
                $this->db->trans_commit();
                return array('message' => SAVED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }


}