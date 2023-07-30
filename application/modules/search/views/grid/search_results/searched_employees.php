<?php if (!empty($employees)): ?>
    <style>
        .font-sm {
            font-size: 12px;
        }
    </style>

    <?php foreach ($employees as $employee):
        $employee_name = $employee->Fname . ' ' . $employee->Lname;
        $skills = ($employee->skills == NULL) ? [] : explode(',', $employee->skills);
        $ratings = explode(',', $employee->ratings);

        $total_followed = numberShortForm(count(explode(',', $employee->follow_ids)));
        $total_rating = number_format(array_sum($ratings) / count($ratings), 1);

        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body flex-grow-1 flex-shrink-1" style="border-radius: 15px; height: 210px;">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <img class="img-circle img-fluid" src="<?= base_url() ?>assets/images/employee/profile_pic/<?= $employee->Employee_image ?>" alt="<?= $employee_name ?>" style="white; object-fit: cover;">
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <p class="m-0"><?= $total_followed ?></p>
                                    <h6 class="font-sm m-0">Following</h6>
                                </div>
                                <div class="col-6 text-center">
                                    <p class="m-0 "><?= $total_rating ?>
                                        <i class="fas fa-solid fa-star" style="color: #eeff00;"></i>
                                    </p>
                                    <h6 class="font-sm m-0">Rating</h6>
                                    <!-- Assuming this should be 'Following' instead of 'Followers' -->
                                </div>
                            </div>
                            <div class="row mb-1 mt-1">
                                <div class="col-12 px-2">
                                    <button class="btn btn-outline-info btn-sm mt-1" style="border-radius:80px; width:100%;">
                                        <i class="fas fa-solid fa-user-plus"></i> View
                                    </button> <!-- Replace 'Click Me' with the desired button text -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mt-3">
                        <div class="col-12">
                            <div class="pt-0">
                                <h5 class="m-0"><?= $employee_name ?></h5>
                            </div>
                            <div class="p-0">
                                <small class="px-0 text-muted mb-1">
                                    <?= ucwords($employee->Barangay) ?>, <?= ucwords($employee->City) ?> |
                                    <?= ucwords($employee->Title) ?>
                                </small>
                            </div>
                            <?php if (!empty($skills)): ?>
                                <div class="pt-1 d-flex flex-wrap flex-grow-1 flex-shrink-1 justify-content-start">
                                    <?php
                                    $limit = 3;
                                    $count = 0;
                                    foreach ($skills as $skill):
                                        if ($count < $limit):?>
                                            <h6 class="outline-gray rounded-pill ml-1" style="font-size:12px;"><?= ucwords($skill) ?></h6>
                                            <?php $count++;
                                        else:
                                            $remaining = count($skills) - $limit;
                                            if ($remaining > 0):?>
                                                <h6 class="outline-gray rounded-pill ml-1" style="font-size:12px;">
                                                    +<?= $remaining ?></h6>
                                            <?php endif;
                                            break;
                                        endif;
                                    endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">No results found!</h4>
            <p>Try searching for another keyword.</p>
        </div>
    </div>
<?php endif; ?>
