<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Add_personnel_services_model extends CI_Model
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

    public function save(){
        try{
            if(empty($this->LName)|| empty($this->MName) ||
            empty($this->FName)){
                throw new Exception(MISSING_NAME_DETAILS, true);
            }
            if(empty($this->Username)){
                throw new Exception(MISSING_USERNAME, true);
            }
            if(empty($this->Email) || empty($this->Department) || empty($this->Position)){
                throw new Exception(MISSING_DETAILS, true);
            }
            $pass = "123456";
            $Locker = locker();
            $Password = sha1(password_generator($pass, $Locker));
            
            $data = array(
                'FName' => $this->FName,
                'MName' => $this->MName,
                'LName' => $this->LName,
                'Username' => $this->Username,
                'Password' => $Password,
                'Email' => $this->Email,
                'Position' => $this->Position,
                'Locker' => $Locker,
                'Department' => $this->Department
            );

            $this->db->trans_start();
            $this->db->insert($this->Table->personnel,$data);
            $insert_id = $this->db->insert_id();          

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE)
            {                
                $this->db->trans_rollback();
                throw new Exception(ERROR_PROCESSING, true);	
            }else{
                if($this->Department=="OBO" && $this->Position==3){

                    // $insp = explode(',',$this->Insp_Type);
                    $count = sizeof($this->Insp_Type);
                    $x = 0;
    
                    // while($x <= $count){
                    //     if(!empty($lab[$x])){
                    //     // $final_result = array(
                    //     //     'Laboratory_id' => $lab[$x],
                    //     //     'Cost' => $cost[$x],
                    //     //     'Request_id'    => $last_id,
                    //     //     'DateTaken'   => date('Y-m-d H:i:s')
                    //     // );
    
                    //     // $this->db->insert($this->Table->request_item,$final_result);
                    //     // }
            
                    //     // $update_cost = array(
                    //     //     'Totalbill' => $sum
                    //     // );
                    //     // $this->db->where('ID', $last_id);
                    //     // $this->db->update($this->Table->request,$update_cost);
                    //     $insp_data = array(
                    //         'InspectionID' => $this->Insp_Type[$x],
                    //         'PersonnelID' => $insert_id
                    //     );
                    //     $this->db->insert($this->Table->obo_personnel,$insp_data);
                    //     $x++;
                    //     }
                    // }
                    // }
                    if(empty($Insp_Type) && $this->Position == "3"){
                        throw new Exception(MISSING_INSP, true);
                    }
                    elseif (!empty($Insp_Type)) {
                        foreach ($this->Insp_Type as $x => $Insp_Type) {
                        
                            $insp_data = array(
                                'InspectionID' => $Insp_Type,
                                'PersonnelID' => $insert_id
                            );
                            $this->db->insert($this->Table->obo_personnel, $insp_data);
                        }
                    }                   
                $this->db->trans_commit();
                return array('message'=>SAVED_SUCCESSFUL, 'has_error'=>false);
            }
            }
        }
        catch(Exception$msg){
            return (array('message'=>$msg->getMessage(), 'has_error'=>true));
        }
    }
}