<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 17px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 13px;
        width: 13px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(13px);
        -ms-transform: translateX(13px);
        transform: translateX(13px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 17px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<?php
if (!empty($employees)) {
    ?>



    <!-- 
        <div class="card card-hover my-3 sec-color" style="border-radius:15px;  box-shadow: 0px; height:80px; ">
            <div class="card-body card-hover border-0 py-2" style="border-radius:15px; ">
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
        </div> -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-inline py-2">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Job Title</th>
                        <th>Status</th>
                        <th>Verified</th>
                        <th>Start</th>
                        <th>End</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $index => $employee) { ?>
                        <tr>
                            <td>
                                <?= $employee->ID ?>
                            </td>
                            <td>
                                <?= ucwords($employee->Fname) . ' ' . ucwords($employee->Lname) ?>
                            </td>
                            <td>
                                <?= $employee->Title ?>
                            </td>
                            <td class="pr-0">
                                <label class="switch">
                                    <input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">
                                    <span class="slider round"></span>
                                </label>

                            </td>
                            <td class="pr-0">
                                <label class="switch">
                                    <input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <!-- Start Date -->
                            </td>
                            <td>
                                <!-- End Date -->
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>


    <?php
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