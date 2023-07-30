<?php ?>
<style>
    .fontsm{
        font-size: 12px;
    }
</style>

<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="card-body p-2" style="border-radius: 15px; height: 200;">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/Logo/Profile/default.png" alt="Employer Profile Pic" style="white; object-fit: cover; height: 4.2rem; width: 4.2rem;">
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-6 text-center">
                                <p class="m-0">99.9k</p>
                                <h6 class="fontsm m-0">Followers</h6>
                            </div>
                            <div class="col-6 text-center">
                                <p class="m-0 ">4.5 <i class="fa-solid fa-star" style="color: #eeff00;"></i></p>
                                <h6 class="fontsm m-0">Rating</h6> <!-- Assuming this should be 'Following' instead of 'Followers' -->
                            </div>
                        </div>
                        <!-- Separate row for the button -->
                        <div class="row mb-1 mt-1">
                            <div class="col-12 px-2">
                                <button class="btn btn-outline-info mt-1" style="border-radius:80px; width:100%;"><i class="fa-solid fa-user-plus"></i> Follow</button> <!-- Replace 'Click Me' with the desired button text -->
                            </div>
                        </div>

                    
                    </div>
                </div>
                <!-- Separate row for "Fausto John Boko" and "Position" -->
                <div class="row d-flex align-items-center mt-3">
                    <div class="col-12">
                        <div class="pt-0">
                            <h5 class="m-0">Fausto John Boko</h5>
                        </div>
                        <div class="p-0">
                            <p class="px-0 text-muted mb-1" style="font-size: 14px;">Granada, Bacolod City | Back - end Developer</p>
                        </div>
                        <div class="pt-1 d-flex justify-content-between">
                            <h6 class="outline-gray rounded-pill" style="font-size:12px;">Skill #1</h6>
                            <h6 class="outline-gray rounded-pill" style="font-size:12px;">Skill #2</h6>
                            <h6 class="outline-gray rounded-pill" style="font-size:12px;">Skill #3</h6>
                            <h6 class="outline-gray rounded-pill" style="font-size:12px;">Skill #4</h6>

                        </div>

                    </div>
                </div>
                
            </div>
            <!-- Rest of your content goes here -->
        </div>
    </div>
</div>
