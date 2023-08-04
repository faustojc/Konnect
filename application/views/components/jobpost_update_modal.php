<div class="modal fade" id="<?= $modalId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" style="border-radius:15px;">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document" style="width:;">
        <div class="modal-content border-0" style="border-radius:15px;">
            <form>
                <div class="border-0">
                    <h5 class="text-center pt-3 pb-2" id="exampleModalLabel" style="font-weight:650;">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Jobpost
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="pr-3" aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>

                <div class="modal-body border-0">
                    <div class="pb-1">
                        <label for="title" style="">Job Title</label>
                        <input id="title" name="title" class="form-control border-0"
                               style="resize:none;background-color: #F4F6F7; border-radius:10px;"
                               value="<?= ucwords($jobpost->title) ?>" type="text" placeholder="Enter Job Name">
                    </div>

                    <div class="row pt-2">
                        <div class="col-md-6">
                            <label for="" style="">Salary</label>
                            <div class="input-group mb-3 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-0"
                                          style="border-radius:10px 0 0 10px;">₱</span>
                                </div>
                                <input id="salary" name="salary" value="<?= $jobpost->salary ?>" type="text"
                                       onclick="disableDotZero()" oninput="formatInput2()"
                                       class="form-control border-0"
                                       style="background-color: #F4F6F7; border-radius:0 10px 10px 0; "
                                       placeholder="Input Salary ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="start_date">Start Date</label>
                            <input id="start_date" name="start_date" value="<?= $jobpost->start_date ?>" type="date"
                                   class="form-control border-0"
                                   style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="job_type">Job Type</label>
                                <input id="job_type" name="job_type" class="form-control border-0"
                                       value="<?= $jobpost->job_type ?>"
                                       style="width:100%; background-color: #F4F6F7; border-radius:10px;"
                                       placeholder="e.g. Full-time/Part-time">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="shift">Schedule</label>
                                <input id="shift" name="shift" class="form-control border-0"
                                       value="<?= $jobpost->shift ?>"
                                       style="width:100%; background-color: #F4F6F7; border-radius:10px;"
                                       placeholder="e.g. Day/Night/Flextime/8 hour shift">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="filled">Status</label>
                                <select id="filled" name="filled" class="form-control border-0"
                                        style="width:100%; background-color: #F4F6F7; border-radius:10px;">
                                    <option <?= (strtoupper($jobpost->filled) == 'OPEN') ? 'selected' : '' ?> >
                                        Open
                                    </option>
                                    <option <?= (strtoupper($jobpost->filled) == 'CLOSED') ? 'selected' : '' ?> >
                                        Closed
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" style="border: 0;">
                                <label for="skills_req">Skills Requirements
                                    <span class="text-muted"
                                          style="font-size: 13px;">(click enter to separate skills)</span>
                                </label>
                                <input id="skills_req" name="skills_req" class="form-control border-0"
                                       style="resize: none; background-color: #F4F6F7; border-radius: 10px;" type="text"
                                       value="<?= $jobpost->skills_req ?>"
                                       placeholder="Skill#1, Skill#2">
                            </div>
                        </div>
                    </div>
                    <div>
                        <textarea id="description<?= $jobpost->id ?>" name="description" class="form-control border-0"
                                  style="resize:none;background-color: #F4F6F7; border-radius:15px;" cols="30"
                                  rows="10"></textarea>
                    </div>
                </div>
            </form>
            <div class="modal-footer border-0">
                <button type="button" class="btn text-dark btn-update-job"
                        style="border-radius:10px; width:100%; background-color: #F4F6F7;">Update
                </button>
            </div>
        </div>
    </div>
</div>