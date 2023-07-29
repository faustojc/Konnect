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

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
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
<?php if (!empty($employed)) { ?>
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
                <?php foreach ($employed as $index => $employee) { ?>
                    <tr>
                        <td>
                            <?= $employee->employee_id ?>
                        </td>
                        <td>
                            <?= ucwords($employee->employee_name) ?>
                        </td>
                        <td>
                            <?= $employee->job_title ?>
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
                            <?= date("M j, Y", strtotime($employee->date_started)) ?>
                        </td>
                        <td>
                            <?php if (!empty($employee->date_ended)): ?>
                                <!-- End Date -->
                                <?= date("M j, Y", strtotime($employee->date_ended)) ?>
                            <?php else: ?>
                                <span class="badge badge-success">Present</span>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php
} else {
    ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">No Employees Found</h1>
            <p class="lead">We can't find the employees that you are looking for or there are no employees
                available.</p>
        </div>
    </div>
    <?php
}
?>