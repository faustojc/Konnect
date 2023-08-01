<?php if (!empty($educations)) {
    foreach ($educations as $key => $education) { ?>
        <div class="card-body card-widget widget-user-2" style="padding-bottom:0.5rem; padding-top:0.5rem;">
            <div class="row">
                <div class="col-10  ">
                    <div class="widget-user-image">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>/assets/images/Logo/Profile/school.png" alt="User Avatar" style="
                              object-fit: cover;
                              min-width: 60px;
                              max-width: 60px;
                              min-height: 60px;
                              max-height: 60px;">
                    </div>
                    <h5 class="widget-user-username mt-0" style="font-size: 18px; font-weight: 600;">
                        <?= $education->institution ?>
                    </h5>
                    <h6 class="widget-user-desc mb-0" style="font-weight: normal; font-size: 16px;">
                        <?= $education->title ?>
                    </h6>
                    <p class="widget-user-desc mb-0 mt-0 text-muted" style="font-weight: normal; font-size: 16px;">
                        <?= $education->level ?>
                    </p>
                    <p class="widget-user-desc mb-0 mt-0 text-muted" style="font-weight: normal; font-size: 16px;">
                        <?= date("M d, Y", strtotime($education->start_date)) ?> -
                        <?php if (!empty($education->end_date)): ?>
                            <?= date("M d, Y", strtotime($education->end_date)) ?>
                        <?php else: ?>
                            Present
                        <?php endif; ?>
                    </p>
                    <p class="widget-user-desc mb-0 mt-0 text-justify" style="font-weight: normal; font-size: 16px;">
                        <?= $education->Description ?>
                    </p>
                </div>

                <div class="col-2 text-right">
                    <button class="btn btn-tool delete" id="delete_educ" data-id="<?= $education->id ?>">
                        <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-tool" data-toggle="modal" data-target="#educ<?= $key ?>">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="educ<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="MODAL-<?= $key ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MODAL<?= $key ?>">Edit Education</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="education-form">
                            <input name="id" id="id" value="<?= $education->id ?>">
                            <div class="px-2 py-2">
                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label for="level">Level</label>
                                        <select class="form-control select2" name="level" id="level" value="<?= $education->level ?>" style="width: 100%;">
                                            <option>ELEMENTARY</option>
                                            <option>JUNIOR HIGH</option>
                                            <option>SENIOR HIGH</option>
                                            <option>COLLEGE</option>
                                            <option>VOCATIONAL SCHOOL</option>
                                            <option>TECHNICAL SCHOOL</option>
                                            <option>UNIVERSITY</option>
                                            <option>GRADUATE SCHOOL</option>
                                            <option>CERTIFICATE PROGRAM</option>
                                            <option>DIPLOMA PROGRAM</option>
                                            <option>APPRENTICESHIP</option>
                                            <option>ONLINE LEARNING</option>
                                            <option>CONTINUING EDUCATION</option>
                                            <option>EXECUTIVE EDUCATION</option>
                                            <option>PROFESSIONAL DEVELOPMENT</option>
                                            <option>SELF-TAUGHT</option>
                                            <option>LANGUAGE SCHOOL</option>
                                            <option>ART SCHOOL</option>
                                            <option>BUSINESS SCHOOL</option>
                                            <option>MEDICAL SCHOOL</option>
                                            <option>LAW SCHOOL</option>
                                            <option>ENGINEERING SCHOOL</option>
                                            <option>DESIGN SCHOOL</option>
                                            <option>CULINARY SCHOOL</option>
                                            <option>PERFORMING ARTS SCHOOL</option>
                                            <option>MILITARY TRAINING</option>
                                            <option>RELIGIOUS EDUCATION</option>
                                            <option>REMOTE LEARNING</option>
                                            <option>WORKPLACE TRAINING</option>
                                            <option>SPECIAL EDUCATION</option>
                                            <option>EXTRACURRICULAR</option>
                                            <option>TUTORIALS</option>
                                            <option>INTERNSHIP</option>
                                            <option>HOMESCHOOLING</option>
                                            <option>RESEARCH PROGRAM</option>
                                            <option>SKILL DEVELOPMENT PROGRAM</option>
                                            <option>LECTURE SERIES</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                    </div>
                                </div>
                                <div class="pb-3">
                                    <label for="institution">Institution</label>
                                    <input type="text" class="form-control" name="institution" id="institution" placeholder="Enter Institution">
                                </div>
                                <div class="row pb-4">
                                    <div class="col-md">
                                        <label for="description">Description</label>
                                        <div>
                                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-md-6">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_date">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="btn_edit_educ" data-dismiss="modal">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} else { ?>

    <div class="d-flex flex-column flex-grow-1 px-2 py-2">
        <?php if ($has_permission): ?>
            <div class="d-flex align-items-center mb-1">
                <h5 class=" ml-1"><i class="fa-solid fa-pen-to-square "></i> Add Education</h5>
            </div>
            <div class="d-flex flex-column flex-grow-1">
                <p class="fs-14">Showcase your academic background to strengthen your professional profile.</p>
                <button type="button" class="btn btn-light rounded-pill edit-summary" style="border-width: 2px" data-toggle="modal" data-target="#ModalEduc">
                    Add Education
                </button>
            </div>
        <?php else: ?>
            <div>
                This user has not added any education yet.
            </div>
        <?php endif; ?>
    </div>

<?php } ?>
