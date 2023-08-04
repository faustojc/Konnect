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
<?php if (!empty($applicants)) { ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-inline py-2">
                <div class="input-group">
                    <input class="form-control form-control-sidebar" id="search_employed" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <table id="employed_table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Job Title</th>
                        <th>Status</th>
                        <th>Date Applied</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applicants as $index => $emp) { ?>
                        <tr>
                            <td>
                                <a href="<?= base_url() ?>employee_profile?id=<?= $emp->employee_id ?>">
                                    <?= ucwords($emp->employeeName) ?>
                                </a>
                            </td>
                            <td>
                                <?= $emp->jobtitle ?>
                            </td>
                            <td></td>
                            <td>
                                <!-- Start Date -->
                                <?= date("M j, Y", strtotime($emp->date_created)) ?>
                            </td>

                            <td></td>


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