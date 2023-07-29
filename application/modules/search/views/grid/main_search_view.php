<style>
    /* Add a custom class for the container to create a flex column layout */
    .search-results-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* Add a margin to the total job postings to separate it from the "Search Results" text */
    .total-job-postings {
        margin-left: 10px;
    }

    .badge-light {
        color: #313131;
        background-color: #D9D9D9;
        font-weight: 600;
        font-size: 13px;
        padding: 7px;
        border-radius: 7px;
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        /* border: 3px solid green;  */
    }

    .btn-outline-secondary:hover {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    html {
        font-size: 16px; /* You can adjust this value to control the base font size */
    }

    @media (max-width: 767px) {
        html {
            font-size: 14px;
        }
    }

    @media (max-width: 575px) {
        html {
            font-size: 12px;
        }
    }

    @media (max-width: 575px) {
        .card-body {
            padding: 1rem; /* Adjust the padding as needed for smaller screens */
        }

        .job-post {
            height: auto; /* Change the height to 'auto' for smaller screens to allow proper wrapping */
        }

        .job-description {
            max-height: none; /* Remove the max-height to allow full content display on smaller screens */
        }
    }

    @media (max-width: 575px) {
        .job-status-container {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }
</style>

<div class="card">
    <div class="card-body py-1">
        <div class="search-results-container">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <h5 class="m-0 pr-1" style="font-weight:600; line-height:normal;">
                        Search Results
                    </h5>
                    <div class="total-job-postings">
                        <h4 class="outline-gray m-0" style="font-weight:300; line-height:normal;">
                            <?= $results['total_overall'] ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade active show" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-2">
                        <div class="search-results-container">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <h5 class="m-0 pr-1" style="font-weight:600; line-height:normal;">Job posts</h5>
                                    <div class="total-job-postings">
                                        <h4 class="outline-gray m-0" style="font-weight:300; line-height:normal;">
                                            <?= $results['total_jobposts'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="searched_jobposts">
                <div class="row">
                    <?= $searched_jobposts ?>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body py-2">
                        <div class="search-results-container">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <h5 class="m-0 pr-1" style="font-weight:600; line-height:normal;">Employers</h5>
                                    <div class="total-job-postings">
                                        <h4 class="outline-gray m-0" style="font-weight:300; line-height:normal;">
                                            <?= $results['total_employers'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="searched_employers">
                <div class="row">
                    <?= $searched_employers ?>
                </div>
            </div>

            <div class="col-12">
                <div class="card ">
                    <div class="card-body py-2">
                        <div class="search-results-container">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <h5 class="m-0 pr-1" style="font-weight:600; line-height:normal;">Employees</h5>
                                    <div class="total-job-postings">
                                        <h4 class="outline-gray m-0" style="font-weight:300; line-height:normal;">
                                            <?= $results['total_employees'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="searched_employees">
                <div class="row">
                    <?= $searched_employees ?>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="v-pills-posts" role="tabpanel" aria-labelledby="v-pills-posts-tab">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-2">
                        <div class="search-results-container">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <h5 class="m-0 pr-1" style="font-weight:600; line-height:normal;">Jobposts</h5>
                                    <div class="total-job-postings">
                                        <h4 class="outline-gray m-0" style="font-weight:300; line-height:normal;">
                                            <?= $results['total_jobposts'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="searched_jobposts">
                <div class="row">
                    <?= $searched_jobposts ?>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="v-pills-employer" role="tabpanel" aria-labelledby="v-pills-employer-tab">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-2">
                        <div class="search-results-container">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <h5 class="m-0 pr-1" style="font-weight:600; line-height:normal;">Employers</h5>
                                    <div class="total-job-postings">
                                        <h4 class="outline-gray m-0" style="font-weight:300; line-height:normal;">
                                            <?= $results['total_employers'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="searched_employers">
                <div class="row">
                    <?= $searched_employers ?>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="v-pills-employee" role="tabpanel" aria-labelledby="v-pills-employee-tab">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-body py-2">
                        <div class="search-results-container">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <h5 class="m-0 pr-1" style="font-weight:600; line-height:normal;">Employees</h5>
                                    <div class="total-job-postings">
                                        <h4 class="outline-gray m-0" style="font-weight:300; line-height:normal;">
                                            <?= $results['total_employees'] ?>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" id="searched_employees">
                <div class="row">
                    <?= $searched_employees ?>
                </div>
            </div>
        </div>
    </div>
</div>
