<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_profile_services_model extends CI_Model
{
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

    /**
     * Saves a record to the database
     * @param string $table The table to save the data
     * @param array $data The data to insert a new record to table
     * @return array Returns an array with message and a boolean has_error
     * @throws Exception Throws an Exception
     */
    public function save(string $table, array $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->insert($table, $data);
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

    /**
     * Updates a record in the database
     * @param string $table The table to be updated
     * @param string $key The primary key of the table
     * @param string $id The id of the record to be updated
     * @param array $data The data to update a record
     * @return array Returns an array with message and its boolean has_error
     * @throws Exception Throws an exception when there are processing errors
     */
    public function update(string $table, string $key, string $id, array $data): array
    {
        try {
            $this->db->trans_start();
            $this->db->where($key, $id)->update($table, $data);
            $this->db->trans_complete();

            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return array('message' => UPDATE_SUCCESSFUL, 'has_error' => false);
            } else {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            }
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

    /**
     * Delete a record from table by its id
     * @param string $table The table to delete a record
     * @param string $key The primary key of the table
     * @param string $id The id of the record to be deleted
     * @return array
     */
    public function delete(string $table, string $key, string $id): array
    {
        try {
            $this->db->trans_start();
            $this->db->where($key, $id)->delete($table);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);
            } else {
                $this->db->trans_commit();
                return array('message' => DELETED_SUCCESSFUL, 'has_error' => false);
            }
        } catch (Exception $msg) {
            return (array('message' => $msg->getMessage(), 'has_error' => true));
        }
    }

    public function getEmployeeImage($id)
    {
        return $this->db->select('Employee_image')
            ->from($this->Table->employee)
            ->where('ID', $id)
            ->get()->row();
    }

    public function update_profile()
    {
        try {
            $data = array(
                'ID' => $this->employee_ID,
                'Fname' => $this->Fname,
                'Mname' => $this->Mname,
                'Lname' => $this->Lname,
                'Cnum' => $this->Cnum,
                'Address' => $this->Address,
                'Title' => $this->Title,
                'Gender' => $this->Gender,
                'Cstat' => $this->Cstat,
                'Religion' => $this->Religion,
                'Bday' => $this->Bday,
                'Email' => $this->Email,
                'City' => $this->City,
                'Barangay' => $this->Barangay,
                'SSS' => $this->SSS,
                'Tin' => $this->Tin,
                'Phil_health' => $this->Phil_health,
                'Pag_ibig' => $this->Pag_ibig
            );

            if (!empty($this->Employee_image)) {
                $data['Employee_image'] = $this->Employee_image;
            }


            $this->db->trans_start();
            $this->db->where('ID', $this->employee_ID);
            $this->db->update($this->Table->employee, $data);
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
}