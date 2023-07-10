<?php
main_header(['employee_educ']);
?>
<!-- ############ PAGE START-->
&nbsp;
<section class="px-5 py-5 d-flex justify-content-center">
 
<div class="card card-info" >
              <div class="card-header">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h3 class="card-title">Edit Education</h3>
                    </div>

                
                </div>
                
              </div>
              
              <div class="px-5 py-5">
            
                    
                    <div class="pb-3">
                                    <label>Employee</label>
									<!-- <select name="employees" class="form-control" id="Employee_id"  style = "width: 100%; ">
										
									
									</select> -->
                                    <input type="text" id="ID" value="<?=@$educ_val->ID?>" hidden>
                                    <input type="text" name="employee" id="Employee_id" value="<?=$educ_val->Employee_id;?>"hidden>
                                    <input  type="text" class="form-control" value="<?=ucwords(@$educ_val->Fname)." ".ucwords(@$educ_val->Mname)." ".ucwords(@$educ_val->Lname)?>" disabled>
                                    
                    </div>
                    
                
                
                <div class="row pb-3">
                    <div class="col-md-6">
                    <label>Level</label>
                    <input type="text" class="form-control" id="Level" placeholder="Enter Level" value="<?=@$educ_val->Level;?>">
                    </div>

                    <div class="col-md-6">
                    <label>Title</label>
                    <input type="text" class="form-control" id="Title" placeholder="Enter Title" value="<?=@$educ_val->Title;?>">
                    </div>
                </div>
                
                
                

                <section class="pb-3">
                <label>Institution</label>
				<input type="text" class="form-control" id="Institution" placeholder="Enter Institution" value="<?=@$educ_val->Institution;?>">
                </section>

                
                <div class="row pb-4">
                    <div class="col-md">
                    <label>Description</label>
                    <!-- <input type="text" class="form-control" id="Description"  placeholder="Enter Description"> -->
					<div>
					<textarea class="form-control" name="description" id="Description"  rows="4" placeholder="Enter Description"><?=@$educ_val->Description;?></textarea>
					</div>
					
                    </div>

                </div>
        
                <div class="row pb-3">
                    <div class="col-md-4">
                        <label>Start Date</label>
                        <input type="date" class="form-control" id="Start_date" name="start_date" value="<?=@$educ_val->Start_date;?>">
                    </div>
                    
                    <div class="col-md-4">
                        	<label>End Date</label>
							<div>
							<input type="date" class="form-control" id="End_date" name="end_date" value="<?=@$educ_val->End_date;?>">
							</div>
							
						
                    </div>
                    
                    <div class="col-md-4">
                        <label>Hours</label>
                        <input type="Number" class="form-control" id="Hours" placeholder="Enter Hours" value="<?=@$educ_val->Hours;?>">
                    </div>
                    
                </div>


                
                
                <!-- <label>Password:</label>
                <input type="password" id="password" name="password"> -->


                </div>

                <div class="card-footer card-white d-flex justify-content-center">
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  <div class="row">
                    <div class="col-6">
                    <a href="<?= base_url() ?>employee_educ" type="button" class="btn btn-outline-secondary" style="width:100px;" data-dismiss="modal">Close</a>
                    </div>
                    <div class="col-6">
                    <a href="<?= base_url() ?>employee_educ" onclick="delayNavigation(event, '<?= base_url() ?>employee_educ')" type="button" class="btn btn-outline-info" style="width:100px;" id="btn_edit">Edit</a>
                    
                    </div>
                    
                  </div>
                    
                    
                </div>
                <!-- <button type="submit" class="btn btn-white" id="btn_edit">Edit</button> -->
                

              </form>
</div>


</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>
<script src="<?php echo base_url() ?>/assets/js/employee_educ/index.js"></script>