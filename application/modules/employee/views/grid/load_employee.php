<?php
    $ci = & get_instance();
    if(!empty($details)){
        foreach ($details as $key => $value) {
            ?>
               
             
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr data-widget="expandable-table" aria-expanded="false">
                       
                      <td><?=(@$key+1)?></td>
                      <td><?=ucwords(@$value->Fname)." ".ucwords(@$value->Mname)." ".ucwords(@$value->Lname)?></td>
                      <td><?=(@$value->Bday)?></td>
                      <td><?=ucwords(@$value->Gender)?></td>
                      <td><?=@$value->Cnum?></td>
                      <td><?=ucwords(@$value->Email)?></td>
                      <td><?=date("M d, Y", strtotime(@$value->Date_created))?></td>
                      <td>
                        <button class="btn btn-danger btn-sm delete" data-id="<?=@$value->ID?>"><i class="fa fa-trash"></i></button>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>employee/profile/<?=$value->ID?>"><i class="fa fa-pencil"></i></a> 
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>employee_profile/index/<?=$value->ID?>"><i class="fa fa-home"></i></a> 
                         <!-- <button type="submit" class="btn btn-sm btn-primary" id="edit" value="<?=@$value->ID?>" data-toggle="modal"><i class="fa fa-pencil"></i></button>  -->
                      </td>
                    </tr>
              
                    <tr class="expandable-body" >

                      
                      <td colspan="8">
                            <div class="row" style=" display: none;">
                                
                              <div class="col-6" style = "padding-left: 3.3rem; ">
                                <p>
                                  <b>ADDRESS:</b> <?=ucwords(@$value->Address)." ".ucwords(@$value->Barangay)." ".ucwords(@$value->City)?>
                                </p>
                              </div>
                          
                              <div class="col-3">
                                <p>
                                <b>CIVIL STATUS:</b> <?=ucwords(@$value->Cstat)?>
                                </p>
                              </div>

                              <div class="col-3">
                                <p>
                                <b>RELIGION:</b> <?=ucwords(@$value->Religion)?>
                                </p>
                              </div>
                            </div>

                            <div class="row" style=" display: none;">
                              <div class="col-3" style = "padding-left: 3.3rem;">
                                <p>
                                  <b>SSS:</b> <?=ucwords(@$value->SSS)?>
                                </p>
                              </div>
                          
                              <div class="col-3">
                                <p>
                                <b>TIN:</b> <?=ucwords(@$value->Tin)?>
                                </p>
                              </div>

                              <div class="col-3">
                                <p>
                                <b>PHIL HEALTH:</b> <?=ucwords(@$value->Phil_health)?>
                                </p>
                              </div>

                              <div class="col-3">
                                <p>
                                <b>PAG IBIG:</b> <?=ucwords(@$value->Pag_ibig)?>
                                </p>
                              </div>
                            </div>
           
                      </td>
                      <!-- <td colspan="3">
                            
                      </td> -->
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

