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
                                <a href="<?= base_url() ?>employee_profile?id=<?= $emp->employee_id ?>" style="color:black;">
                                    <?= ucwords($emp->employeeName) ?>
                                </a>
                            </td>
                            <td>
                                <?= $emp->jobtitle ?>
                            </td>
                            <!-- Application Status -->
                            <td><span class="badge badge-light">Under Review</span> </td>
                            <td>
                                <!-- Start Date -->
                                <?= date("m/d/y", strtotime($emp->date_created)) ?>
                            </td>

                            <td>
                                <button type="button" class="btn" data-toggle="modal" data-target="#edit_status">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label>Applicant Name</label>
                    <input type="text" class="form-control border-0" name="Fname" id="Fname" value="Applicant Name" style=" font-size:14px; border-radius:15px; background-color: #F4F6F7;" disabled>

                    <label for="Gender" class="pt-3">Application Status</label>
                    <select class="form-control border-0" name="application_stat" id="application_stat" style="border-radius:15px; background-color: #F4F6F7;" required>
                        <option value="male">Under Review</option>
                        <option value="female">Schedule for Interview</option>
                        <option value="others">Accepted</option>
                        <option value="others">Rejected</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info">Update</button>
                </div>
            </div>
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