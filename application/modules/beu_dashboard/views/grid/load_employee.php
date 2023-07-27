<?php if (!empty($details)) { ?>
    <div class="card card-widget widget-user position-sticky">
        <div class="widget-user-header text-white" style="background: url('<?= base_url() ?>assets/images/Logo/cover-place.jpg') center center; background-repeat: no-repeat; background-size: cover; border-radius: 15px 15px 0 0;"></div>
        <div class="widget-user-image">
            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $details->Employee_image ?>" alt="User Avatar" style="object-fit: cover; min-width: 90px; max-width: 90px;min-height: 90px; max-height: 90px;">
        </div>
        <div class="card-footer" style="padding-top: 35px; background-color:#FFF;">
            <div class="row">
                <div class="col-12">
                    <div class="description-block">
                        <h4 class="widget-user-username text-center" style="font-weight: 500; font-size: 20px;">
                            <?= ucwords(@$details->Fname) . " " . ucwords(@$details->Lname) ?>
                        </h4>
                        <h6 class="widget-user-desc text-center text-muted mt-1" style="font-weight: normal; font-size: 14px;">
                            <?= ucwords(@$details->Title) ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer pt-2" style="padding-top: 35px; background-color:#FFF;">
        <hr class="m-0">
            <div class="row">
                <div class="col-12">
                    <div class="description-block mb-0">
                        <h6 class="widget-user-desc text-left mt-3 mb-3" style="font-weight: normal; font-size:15px;">
                            <i class="fas fa-map-pin"></i> <b style="font-weight: 500;">Address: </b>
                            <?= ucwords(@$details->City) ?>
                        </h6>

                        <h6 class=" widget-user-desc text-left mt-1 mb-3" style="font-weight: normal;">
                            <i class="fa fa-envelope"></i> <b style="font-weight: 500;">Email: </b>
                            <?= @$details->Email ?>
                        </h6>
                        <h6 class=" widget-user-desc text-left mt-1 mb-3" style="font-weight: normal;">
                            <i class="fa fa-phone"></i> <b style="font-weight: 500;">Number: </b>
                            <?= @$details->Cnum ?>
                        </h6>
                        <h6 class=" widget-user-desc text-left mt-1 mb-3" style="font-weight: normal;">
                            <i class="fa fa-birthday-cake"></i> <b style="font-weight: 500;">Birthday: </b>
                            <?= @$details->Bday ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer pt-2" style="padding-top: 35px; background-color:#FFF;">
        <hr class="m-0">
            <div class="row">
                <div class="col-12">
                    <div class="description-block mb-0">
                        <h6 class="widget-user-desc text-left mt-3 mb-2" style="font-weight: 500; font-size:15px;"> Skills</h6>
                        <div class="row pt-0 pb-1 px-1 py-1" id="dash_load_skill">
                            <?= $skills_section_view ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer pt-3 pb-3" style="padding-top: 35px; background-color:#FFF;">
        <hr class="m-0 pt-3">
            <div class="row">
                <div class="col-12">
                    <a href="<?= base_url() ?>employee_profile?id=<?= @$details->ID ?>" class="hoveropac">
                        <p class="mb-0 text-center fw-500 text-muted fs-14">View Profile
                            <i class="fa-solid fa-arrow-right fs-14 ml-1"></i>
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>


<?php } ?>