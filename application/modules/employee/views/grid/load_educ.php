<?php
    // $ci = & get_instance();
    if(!empty($details)){
        foreach ($details as $key => $value) {
            ?>
            
            
                <!-- <tr href="#collapseRow" aria-expanded="false" data-toggle="collapse" aria-controls="collapseRow"> -->
                    
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td><?=(@$value->Level)?></td>
                        <td><?=(@$value->Institution)?></td>
                        <td><?=(@$value->Title)?></td>
                        <td><?=date("M d, Y", strtotime(@$value->Start_date))?></td>
                        <td><?=date("M d, Y", strtotime(@$value->End_date))?></td> 
                        <td><?=(@$value->Hours)?></td>
                    </tr>
                    
                    
                    
                <!-- </tr> -->
                
                <tr class="expandable-body">
                    
                    <td colspan="8">
                        <p style="display:none;"><?=(@$value->Description)?></p>
                    </td>
                    
                    
                </tr>
                
                

            
                
            <?php  
        }        
    }else{
        ?>
            <tr>
                <td colspan="8">
                    <div><center><h6 style="color:red">No Data Found.</h6></center></div>
                </td>
            </tr>
        <?php
        
    }
?>