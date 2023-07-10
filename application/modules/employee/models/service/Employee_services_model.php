<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_services_model extends CI_Model
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

    public function register()
    {
        try {
            $data = array(

                'Fname' => $this->Fname,
                'Mname' => $this->Mname,
                'Lname' => $this->Lname,
                'Cnum' => $this->Cnum,
                'Address' => $this->Address,
                'Gender' => $this->Gender,
                'Cstat' => $this->Cstat,
                'Religion' => $this->Religion,
                'Bday' => $this->Bday,
                'Email' => $this->Email,
                'City' => $this->City,
                'Barangay' => $this->Barangay,
                'Title' => $this->Title,
                'SSS' => $this->SSS,
                'Tin' => $this->Tin,
                'Phil_health' => $this->Phil_health,
                'Pag_ibig' => $this->Pag_ibig,
                'Date_created' => date('Y-m-d H:i:s')

            );
            echo json_encode($data);
            $this->db->trans_start();

            $this->db->insert($this->Table->employee, $data);

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

    public function update()
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


    public function search_employee()
    {
        try {
            $result = $this->db->select()->from($this->Table->employee)
                ->like('Fname', $this->search_text)
                ->or_like('Lname', $this->search_text)
                ->get()->result();

            return $result;
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'has_error' => true);
        }
    }

}