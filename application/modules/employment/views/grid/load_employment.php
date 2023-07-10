<?php
    $ci = & get_instance();
    if(!empty($details)){
        foreach ($details as $key => $value) {
            $employee = $value['employee'];
            $employer = $value['employer'];
            $employment = $value['employment'];

            ?>
                <tr>
                    <td><?=(@$key+1)?></td>
                    <td><?= ucwords(@$employee->Fname) . ' ' . ucwords(@$employee->Mname) . ' ' . ucwords($employee->Lname) ?></td>
                    <td><?= ucwords(@$employer->employer_name) ?></td>
                    <td><?=ucwords(@$employment->position)?></td>
                    <td><?=ucwords(@$employment->start_date)?></td>
                    <td><?=ucwords(@$employment->end_date)?></td>
                    <td><?=ucwords(@$employment->status)?></td>
                    <td><?=ucwords(@$employment->rating)?></td>
                    <td><?=ucwords(@$employment->job_description)?></td>
                    <td><?=date("M d, Y", strtotime(@$employment->date_created))?></td>
                    <td><?=ucwords(@$employment->show_status)?></td>
                    <td>
                        <button class="btn btn-danger btn-sm delete" id="delete_employment" data-id="<?=@$employment->ID?>"><i class="fa fa-trash"></i></button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Employment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                             <form id="needs-validation">
                                <div class="row p-3">
                                    <div class="col-md">
                                        <input type="text" id="ID" value="<?=@$employment->ID?>" hidden>
                                        <input type="text" id="employee_id" value="<?=@$employment->employee_id?>" hidden>
                                        <input type="text" id="employer_id" value="<?=@$employment->employer_id?>" hidden>

                                        <label for="employee_name">Employee Name</label>
                                        <input type="text" class="form-control" id="employee_name" value="<?= ucwords($employee->Fname) . ' ' . ucwords($employee->Mname) . ' ' . ucwords($employee->Lname) ?>" disabled>
                                    </div>
                                </div>

                                <div class="row p-3">
                                    <div class="col-md">
                                        <label for="employer_name">Employer Name</label>
                                        <input type="text" class="form-control" id="employer_name" value="<?= ucwords(@$employer->employer_name) ?>" disabled>
                                    </div>
                                </div>

                                <div class="row p-3">
                                <div class="col-md">
                                        <label for="position">Position</label>
                                        <input type="text" class="form-control" id="position" value="<?=@$employment->position?>">
                                    </div>
                                </div>

                                <div class="row p-3">
                                        <div class="col-md-6">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" id="start_date" name="start_date" value="<?=date('Y-m-d', strtotime(@$employment->start_date))?>" style="width:200px;">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="end_date">End Date</label>
                                            <input type="date" id="end_date" name="end_date" value="<?=date('Y-m-d', strtotime(@$employment->end_date))?>" style="width:200px;">
                                        </div>
                                </div>

                                    <div class="row p-3">
                                        <div class="col-md-4">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control" id="status" value="<?=@$employment->status?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="rating">Rating</label>
                                            <input type="number" class="form-control" id="rating" value="<?=@$employment->rating?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="show_status">Show Status</label>
                                            <input type="text" class="form-control" id="show_status" value="<?=@$employment->show_status?>" placeholder="Show Status">
                                        </div>
                                    </div>
                                    <div class="row p-3">
                                        <div class="col-md-4">
                                            <label for="job_description">Job Description</label>
                                            <textarea class="form" id="job_description" name="job_description" rows="4" cols="58"><?=@$employment->job_description?></textarea>
                                        </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark" id="edit_employment">Save edit</button>
                            </div>
                            </div>
                        </div>
                        </div>

</div>
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
<script src="<?php echo base_url() ?>/assets/js/employment/index.js"></script>

