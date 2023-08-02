<?php if (!empty($details)): ?>
    <style>
        div.summary > * {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            /* number of lines to show */
            -webkit-box-orient: vertical;
        }
    </style>


    <div class="card card-widget widget-user">
        <div class="widget-user-header text-white" style="background: url('<?= base_url() ?>assets/images/Logo/cover-place.jpg') no-repeat center center; background-size: cover; border-radius: 15px 15px 0 0;">
            <div class="text-right">
                <button class="btn text-white hoverbutton" style="background-color: rgba( 27, 38, 49, 0.5);">
                    <i class="fa-solid fa-ellipsis-vertical"></i></button>
            </div>

        </div>
        <div class="widget-user-image">
            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employer/profile_pic/<?= $details->image ?>" alt="User Avatar" style="object-fit: cover; min-width: 90px; max-width: 90px;min-height: 90px; max-height: 90px;">
        </div>
        <div class="card-footer" style="padding-top: 35px; background-color:#FFF;">
            <div class="row">
                <div class="col-12">
                    <div class="description-block">
                        <h4 class="widget-user-username text-center" style="font-weight: 500; font-size: 20px;">
                            <?= $details->tradename ?>
                            <?php if ($auth['is_verified'] == 1): ?>
                                <i class="fa fa-check-circle text-success"></i>
                            <?php endif; ?>
                        </h4>
                        <h6 class="widget-user-desc text-center text-muted mt-1" style="font-weight: normal; font-size: 15px;">
                            <?= $details->business_type ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer border-top pt-2" style="padding-top: 35px; background-color:#FFF;">
            <div class="row">
                <div class="col-12">
                    <div class="description-block mb-0">
                        <h6 class="widget-user-desc text-left mt-3 mb-3" style="font-weight: normal; font-size:15px;">
                            <i class="fas fa-map-pin"></i> <b style="font-weight: 500;">Address: </b>
                            <?= ucwords(@$details->city) ?>
                        </h6>

                        <h6 class=" widget-user-desc text-left mt-1 mb-3" style="font-weight: normal;">
                            <i class="fa fa-envelope"></i> <b style="font-weight: 500;">Email: </b>
                            <?= @$details->email ?>
                        </h6>
                        <h6 class=" widget-user-desc text-left mt-1 mb-3" style="font-weight: normal;">
                            <i class="fa fa-phone"></i> <b style="font-weight: 500;">Number: </b>
                            <?= @$details->contact_number ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="card-footer border-none py-2" style="background-color:#FFF;">
            <div class="widget-user-desc text-center mt-1 mb-1 summary" style="font-size: 14px; max-height: 150px">
                <?= $details->summary ?>
            </div>
        </div> -->
        <hr class="m-0">
        <div class="card-footer border-0 p-3" style="background-color:#FFF;">
            <div class="d-flex justify-content-center">
                <a href="<?= base_url() ?>employer_profile?id=<?= $details->id ?>" class="btn hoverbutton" style=" background-color:#F4F6F7;border-radius:10px; width:100%;">View
                    Profile <i class="fa-solid fa-arrow-right fs-14 ml-1"></i></a>
            </div>
        </div>
    </div>


<?php endif; ?>
