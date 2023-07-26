<style>
    .rating {
        text-align: center;
    }

    .rating>span {
        display: inline-block;
        position: relative;
        width: 1.1em;
        color: gold;
        cursor: pointer;
        font-size: 2rem;
    }

    .rounded-pill {
        border-radius: 50rem !important;
    }
</style>


<!-- feedback -->
<div class="card card-white">
    <div class="card-header">
        <h3 class="card-title fw-500" style="font-weight:600; py-2">All Ratings and Reviews</h3>

        <?php if (!$has_permission): ?>
            <div class="card-tools">
                <button type="button" data-toggle="modal" data-target="#ModalFeedback" class="btn btn-tool">
                    <i class="fa-solid fa-plus" style="font-size: 16px;" id="add_feedback"></i>
                </button>
            </div>
        <?php endif; ?>

    </div>

    <?php if (!$has_permission): ?>
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
                                <input name="user_id" id="user_id" value="<?= $user_id ?>" hidden readonly>
                                <!-- Feedback Rating -->
                                <div class="form-group">
                                    <label for="rating">Your Rating</label>
                                    <div class="d-flex flex-nowrap">
                                        <div class="rating" data-value="0" data-max="5" data-precision="1">
                                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                        </div>
                                        <input name="rating" class="d-inline-block border-0 w-auto m-0" id="ratingValue" value="0" />
                                    </div>
                                </div>
                                <!-- Feedback Comment -->
                                <div class="form-group">
                                    <label for="message">Your Feedback</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                    <p class="text-danger float-left" id="feedback_warning" hidden>
                                        <i class="text-danger fa fa-exclamation-circle"></i>
                                        Character exceeds 2000
                                    </p>
                                    <p class="text-muted text-right" id="feedback_char_count"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="btn_feedback" data-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const rating = document.querySelector('.rating');
            const ratingValue = document.querySelector('#ratingValue');

            function updateRating() {
                const value = parseFloat(rating.dataset.value);
                const max = parseInt(rating.dataset.max);
                const precision = parseFloat(rating.dataset.precision);

                const stars = rating.querySelectorAll('span');

                stars.forEach((star, index) => {
                    star.textContent = index < Math.floor(value) ? '★' : '☆';
                });

                if (value % 1 >= precision) {
                    stars[Math.ceil(value) - 1].textContent = '★';
                    stars[Math.ceil(value) - 1].style.position = 'relative';
                    stars[Math.ceil(value) - 1].style.overflow = 'hidden';

                    const ratingValueElement = rating.querySelector('.rating-value');
                    ratingValueElement.textContent = '★';
                    ratingValueElement.style.width = `${(value % 1) / precision * 100}%`;
                    ratingValueElement.style.position = 'absolute';
                    ratingValueElement.style.top = '0';
                    ratingValueElement.style.left = '0';
                    ratingValueElement.style.zIndex = '1';
                    ratingValueElement.style.color = 'gold';
                }

                ratingValue.value = value.toString();
            }

            updateRating();

            rating.addEventListener('click', (e) => {
                if (e.target.matches('span')) {
                    const stars = rating.querySelectorAll('span');
                    rating.dataset.value = Array.from(stars).indexOf(e.target) + 1;

                    updateRating();
                }
            });
        </script>

    <?php endif; ?>


    <!-- feedback -->

    <?php if (!empty($feedbacks)): ?>
        <div class="card pt-2"> <!-- Parent card for "Feedbacks received by the company" -->


            <div class="row px-2">
                <?php foreach ($feedbacks as $feedback): ?>
                    <div class="col-sm-12">
                        <div class="bg-white rounded  px-3 restaurant-detailed-ratings-and-reviews">

                            <div class="reviews-members pt-2 pb-2">
                                <div class="media">
                                    <a href="#"><img class="mr-5 rounded-pill" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="Employee Profile Pic" alt="Employee Profile Pic" style="border: 0.2rem solid #F4F6F7 ;object-fit: cover; height:3.5rem; width:3.5rem; position:absolute;">
                                        <div class="media-body m-2">
                                            <div class="reviews-members-header ml-5">
                                                <div class="float-right" style="color:#FFC107;">
                                                    <?php for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $feedback->rating) {
                                                            echo '<i class="fa-solid fa-star" ></i>';
                                                        } else {
                                                            echo '<i class="fa-regular fa-star"></i>';
                                                        }
                                                    } ?>
                                                </div>
                                                <h6 class="mb-1 ml-3"><a class="text-black" href="#">
                                                        <?= $feedback->userName ?>
                                                    </a></h6>
                                                <p class="text-gray ml-3">
                                                    <?= date('D, d F Y', strtotime($feedback->date_created)) ?>
                                                </p>
                                            </div>
                                            <div class="reviews-members-body" style="text-align: justify;">
                                                <p>
                                                    <?= $feedback->message ?>
                                                </p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                    </div>


                <?php endforeach; ?>

            </div>
        </div>
    </div>



<?php else: ?>
    <?php if ($has_permission): ?>
        <div class="card"> <!-- Parent card for "You haven't received a feedback yet." -->
            <div class="card-body">
                <p class="card-text">You haven't received a feedback yet.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="card"> <!-- Parent card for "You haven't received a feedback yet." -->
            <div class="card-body">
                <p class="card-text">The user haven't received a feedback yet.</p>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>