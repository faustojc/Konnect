<?php
if (!empty($employees)) {
    foreach ($employees as $index => $employee) { ?>
        <!-- <div class="widget-user-header bg-white <?php if ($index + 1 > 1)
            echo 'border-top'; ?>">
            <div class="widget-user-image">
                <img class="img-circle img-fluid" src="<?php echo base_url() ?>assets/images/employee/profile_pic/<?php echo $employee->Employee_image ?>" alt="User Avatar" style="object-fit: cover; width: 50px; height: 50px;">
            </div>
            <div class="d-flex justify-content-between">
                <a href="<?php echo base_url() ?>employee_profile/index/<?= $employee->ID ?>" class="card-title text-truncate" style="width: 250px; margin-left: 10px;"><?= ucwords($employee->Fname) . ' ' . ucwords($employee->Lname) ?></a>
                <span class="badge badge-success fw-500" style="padding: 6px 12px;"><i class="fa-solid fa-check"></i> Verified</span>
            </div>
            <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px; margin-left: 60px">
                <?= ucwords($employee->Title) ?>
            </h6>
        </div> -->

    <style>
        .card-hover:hover{
            transform: scale(1.02);
            background-color: #F1F6F9;
            transition: .3s transform;
            /* box-shadow: 0 2px 5px rgba(0,0,0,.12); */
            /* box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06); */
        }
    </style>

    <div class="card card-hover my-3 sec-color" style="border-radius:15px;  box-shadow: 0px; height:80px; " >
        <div class="card-body card-hover border-0 py-2" style="border-radius:15px; " >
            <div class="widget-user-header  <?php if ($index + 1 > 1)
                echo 'border-0'; ?>" style="padding:0.2rem;">
                <div class="widget-user-image">
                    <img class="img-circle img-fluid" src="<?php echo base_url() ?>assets/images/employee/profile_pic/<?php echo $employee->Employee_image ?>" alt="User Avatar" style="object-fit: cover; width: 3rem; height: 3rem;  border: 3px solid #fff;">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="<?php echo base_url() ?>employee_profile/index/<?= $employee->ID ?>" class="card-title text-truncate text-info" style="width: 250px; margin-left: 10px;"><?= ucwords($employee->Fname) . ' ' . ucwords($employee->Lname) ?></a>
                    <span class="badge badge-success fw-500" style="padding: 6px 12px;"><i class="fa-solid fa-check"></i></span>
                </div>
                <h6 class="widget-user-desc text-muted" style="font-weight: normal; font-size: 16px; margin-left: 60px">
                    <?= $employee->Title ?>
                </h6>
            </div>
        </div>
    </div>
    <?php }
} else {
    ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">No Employees Found</h1>
            <p class="lead">We can't find the employees that you are looking for or there are no employees available.</p>
        </div>
    </div>
<?php
}
?>