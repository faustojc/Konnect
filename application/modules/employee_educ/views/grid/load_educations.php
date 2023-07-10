<?php
    // $ci = & get_instance();
    if(!empty($details)){
        foreach ($details as $key => $value) {
            ?>
            
            
                <!-- <tr href="#collapseRow" aria-expanded="false" data-toggle="collapse" aria-controls="collapseRow"> -->
                    
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td><?=(@$key+1)?></td>
                        <td><?=ucwords(@$value->Fname)." ".ucwords(@$value->Mname)." ".ucwords(@$value->Lname)?></td>
                        <td><?=(@$value->Level)?></td>
                        <td><?=(@$value->Institution)?></td>
                        <td><?=(@$value->Title)?></td>
                        <td><?=date("M d, Y", strtotime(@$value->Start_date))?></td>
                        <td><?=date("M d, Y", strtotime(@$value->End_date))?></td> 
                        <td><?=(@$value->Hours)?></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="px-1">
                                <button class="btn btn-danger btn-sm delete" id="delete_educ" data-id="<?=@$value->ID?>"><i class="fa fa-trash"></i></button>
                            
                                </div>
                                <div class="px-1">
                                <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>employee_educ/education_edit/<?=@$value->ID?>"><i class="fa fa-pencil"></i></a>   
                                </div>
                            </div>
                            
                            
                            
                        </td>
                    </tr>
                    
                    
                    
                <!-- </tr> -->
                
                <tr class="expandable-body">
                    
                    <td colspan="9">
                        <p class="text-justify" style="display:none;"><?=(@$value->Description)?></p>
                    </td>
                    
                    
                
                </tr>
                
                

            
                
            <?php  
        }        
    }else{
        ?>
            <tr>
                <td colspan="9">
                    <div><center><h6 style="color:red">No Data Found.</h6></center></div>
                </td>
            </tr>
        <?php
        
    }
?>


