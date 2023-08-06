<style>
    .review_h {
        font-size: 13px;
        font-weight: 500;
        border: 1px solid black;
        border-radius: 10px;
        ;
        /* You can change the color and width of the border here */
        padding: 5px;
        /* Adjust the padding as needed */
    }

    .review_l {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border: 1px solid black;
        border-radius: 10px;
    }

    .review_l h4 {
        margin-right: 10px;
    }

    .review_l h6 {
        font-size: 13px;
        font-weight: 500;
        margin: 0;
    }

    .review_l .uploaded {
        font-weight: 400;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-md-4 col-sm-12">
        <hr>

        <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#apply">Apply</button>
    </div>
</div>

<!-- Review Application Modal -->

<div class="modal fade" id="apply" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Review Your Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Contact Info</h6>
                        <div class="row pt-3">
                            <div class="col-md-1">
                                <div class="widget-user-header">
                                    <div class="widget-user-image">
                                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/default.png" alt="User Avatar" style="object-fit: cover;min-width: 60px; max-width: 60px; min-height: 60px; max-height: 60px;">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-11 pl-2">
                                <h6 class="p-0" style="font-size: 13px; font-weight: 500;">Employee Name</h6>
                                <h6 class="p-0" style="font-size: 13px; font-weight: 400;">Title</h6>
                                <h6 class="p-0" style="font-size: 13px; font-weight: 400;">Address</h6>
                            </div>
                        </div>

                        <h6 class="pt-3">Email Address</h6>
                        <h6 class="review_h" style="font-size: 13px; font-weight: 400;">Employee@gmail.com</h6>

                        <h6 class="pt-3">City/Province</h6>
                        <h6 class="review_h" style="font-size: 13px; font-weight: 400;">Bacolod City</h6>

                        <h6 class="pt-3">Resume</h6>
                        <h6 style="font-size: 13px; font-weight: 400;">Be sure to include an update resume</h6>

                        <div class="px-2">
                            <div class="review_l row">
                                <div class="col-md-11">
                                    <div class="row p-2">
                                        <h4><i class="fa-solid fa-file pr-1 pt-2"></i></h4>
                                        <div class="pt-1">
                                            <h6>File_Name.pdf</h6>
                                            <h6 class="uploaded">Uploaded on 8/6/23</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn">
                                        <i class="fa-solid fa-download button"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <button type="button uploadResume" class="btn btn-info">
                                Upload Resume
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-block apply-button" data-id="<?= $job_id ?>"><?= $status ?></button>
            </div>
        </div>
    </div>
</div>