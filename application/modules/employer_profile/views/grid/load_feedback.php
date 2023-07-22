<!-- feedback -->
<div class="card card-white">
    <div class="card-header">
        <h3 class="card-title fw-500" style="font-weight:600;">Feedback</h3>

        <div class="card-tools">
            <button type="button" data-toggle="modal" data-target="#ModalFeedback" class="btn btn-tool">
                <i class="fa-solid fa-plus" style=" font-size: 16.5px;" id="add_feedback"></i>
            </button>

        </div>
    </div>

    <div class="modal fade" id="ModalFeedback" tabindex="-1" role="dialog" aria-labelledby="ModalFeedback" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Add Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Feedback form Content -->
                    <div class="container">
                        <form>
                            <!-- Feedback Rating -->
                            <div class="form-group">
                                <label>Rating (1 - Lowest, 5 - Highest)</label>
                                <select class="form-control" id="rating" name="rating" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <!-- Feedback Comment -->
                            <div class="form-group">
                                <label for="comment">Your Feedback</label>
                                <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                                <p class="text-danger float-left" id="feedback_warning" hidden>
                                    <i class="text-danger fa fa-exclamation-circle"></i>
                                    Character exceeds 2000
                                </p>
                                <p class="text-muted text-right" id="feedback_char_count"></p>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" id="btn_feedback" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feedback -->

<!-- Feedback Employer side -->
<div class="tab-pane fade" id="pills-feedback" role="tabpanel" aria-labelledby="pills-feedback-tab">
    <?php if (!empty($feedbacks)): ?>
        <div class="card"> <!-- Parent card for "Feedbacks received by the company" -->
            <div class="card-body">
                <h4>Feedbacks received by the company:</h4>
                <div class="row">
                    <?php foreach ($feedbacks as $feedback): ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="col-1 d-flex justify-content-center align-items-center ml-3">
                                            <img class="rounded-circle" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="Employee Profile Pic"
                                                 style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="card-title">
                                                <?= $feedback->employee_name ?>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                <?= $feedback->position_title ?>
                                            </h6>
                                            <h6 class="card-subtitle mb-2 text-muted">Ratings</h6>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <!-- Display the star ratings here -->
                                        <?php
                                        $rating = $feedback->rating; // Replace with the actual rating value from your data
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<i class="bi bi-star-fill"></i>';
                                            } else {
                                                echo '<i class="bi bi-star"></i>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <p class="card-text mt-3">
                                        <?= $feedback->content ?>
                                    </p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card"> <!-- Parent card for "You haven't received a feedback yet." -->
            <div class="card-body">
                <p class="card-text">You haven't received a feedback yet.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- feedback employer side -->

<!-- feedback employee side -->
<div class="tab-pane fade" id="pills-feedback" role="tabpanel" aria-labelledby="pills-feedback-tab">
    <?php if (!empty($feedbacks)): ?>
        <div class="card"> <!-- Parent card for "Feedbacks received by the company" -->
            <div class="card-body">
                <h4>Feedbacks received by the company:</h4>
                <div class="row">
                    <?php foreach ($feedbacks as $feedback): ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="col-1 d-flex justify-content-center align-items-center ml-3">
                                            <img class="rounded-circle" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="Employee Profile Pic"
                                                 style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                        </div>
                                        <div class="ml-4">
                                            <h5 class="card-title">
                                                <?= $feedback->employee_name ?>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                <?= $feedback->position_title ?>
                                            </h6>
                                            <h6 class="card-subtitle mb-2 text-muted">Ratings</h6>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <!-- Display the star ratings here -->
                                        <?php
                                        $rating = $feedback->rating; // Replace with the actual rating value from your data
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<i class="bi bi-star-fill"></i>';
                                            } else {
                                                echo '<i class="bi bi-star"></i>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <p class="card-text mt-3">
                                        <?= $feedback->content ?>
                                    </p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card"> <!-- Parent card for "The company has not received a feedback yet." -->
            <div class="card-body">
                <p class="card-text">The company has not received a feedback yet.</p>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($hasReceivedEmployeeFeedback): ?>
        <div class="card"> <!-- Parent card for "Feedbacks received by the employee" -->
            <div class="card-body">
                <h4>Feedback received:</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="col-1 d-flex justify-content-center align-items-center ml-3">
                                        <img class="rounded-circle" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="Employee Profile Pic"
                                             style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                    </div>
                                    <div class="ml-4">
                                        <h5 class="card-title">
                                            <?= $employerFeedback->tradename ?>
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            <?= $employerFeedback->position_title ?>
                                        </h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Ratings</h6>
                                    </div>
                                </div>
                                <div class="rating">
                                    <!-- Display the star ratings here -->
                                    <?php
                                    $rating = $employerFeedback->rating; // Replace with the actual rating value from your data
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<i class="bi bi-star-fill"></i>';
                                        } else {
                                            echo '<i class="bi bi-star"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                                <p class="card-text mt-3">
                                    <?= $employerFeedback->content ?>
                                </p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="card"> <!-- Parent card for "You haven't received any feedback from your employer(s)." -->
            <div class="card-body">
                <p class="card-text">You haven't received any feedback from your employer(s).</p>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- feedback employee side -->
