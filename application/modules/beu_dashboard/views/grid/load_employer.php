<?php if (!empty($details)): ?>
    <div class="card card-widget widget-user">
        <div class="widget-user-header text-white" style="background: url('<?= base_url() ?>assets/images/Logo/cover-place.jpg') center center; background-repeat: no-repeat; background-size: cover; border-radius: 15px 15px 0 0;"></div>
        <div class="widget-user-image">
            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $details->image ?>" alt="User Avatar" style="object-fit: cover; min-width: 90px; max-width: 90px;min-height: 90px; max-height: 90px;">
        </div>
        <div class="card-footer" style="padding-top: 35px; background-color:#FFF;">
            <div class="row">
                <div class="col-12">
                    <div class="description-block">
                        <h4 class="widget-user-username text-center" style="font-weight: 500; font-size: 20px;">
                            <?= $details->tradename ?>
                        </h4>
                        <h6 class="widget-user-desc text-center text-muted mt-1" style="font-weight: normal; font-size: 14px;">
                            <?= $details->employer_name ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer border-none" style="padding-top:0px; padding-bottom:2rem;background-color:#FFF;">
            <div class="row">
                <div class="col-12">
                    <div class="description-block mb-0">
                        <!-- <h6 class="widget-user-desc text-center  mb-1" style="font-weight: 500; font-size: 16px;"> BIO</h6> -->
                        <h6 class="widget-user-desc text-center mt-1 mb-1" style="font-weight: normal; font-size: 14px;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam aliquid corrupti modi fugiat itaque! Maxime explicabo eligendi id impedit atque cumque rerum amet architecto consequuntur inventore unde necessitatibus, quod esse!</h6>
                    </div>
                </div>
            </div>
        </div>

       

        <div class="card-footer border-top pt-3 pb-3" style="background-color:#FFF;">
            <!-- <div class="row">
                <div class="col-12">
                    <a href="#" class="hoveropac">
                        <p class="mb-0 text-center fw-500 text-muted fs-14">View Profile <i class="fa-solid fa-arrow-right fs-14 ml-1"></i></p>
                    </a>
                </div>
            </div> -->

            <div class="d-flex justify-content-center" >
                <button type="button" class="btn hovercard" style=" background-color:#F4F6F7;border-radius:10px; width:100%;">View Profile <i class="fa-solid fa-arrow-right fs-14 ml-1"></i></button>
            </div>
        </div>
    </div>
<?php endif; ?>