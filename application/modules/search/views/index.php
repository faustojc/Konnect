<?php
main_header(['Search']);
?>

<!-- ############ PAGE START-->
<style>
    /* Remove spinner for number input */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .table-black td {
        border-top: 1px solid black;
    }

    .list-3 li {
        margin-top: 5px;
        margin-bottom: 5px;
        text-transform: capitalize;
    }

    .list-3 a {
        text-decoration: none;
        color: #212529;
    }

    .list-3 a:hover {
        color: #17a2b8;
    }

    .card {
        border-radius: 15px;
        box-shadow: none;
    }

    .card-header {
        border-radius: 15px 15px 0px 0px;
    }

    .card-footer {
        border-radius: 0px 0px 15px 15px;
    }

    .card-button-more {
        text-decoration: none;
        margin-top: 10px;
        background-color: white;
        border-radius: 25px;
        text-align: center;
        padding-left: 8px;
        width: 100%;
        font-size: 12px;
        margin-bottom: 10px;
    }

    body {
        background-color: #e9ebed;
    }

    .hoveropac:hover {
        opacity: 0.7;
    }

    .hovercard:hover {
        transform: scale(1.01);
        background-color: #F1F6F9;
        transition: .3s transform;
        /* box-shadow: 0  1px 4px rgba(0, 0, 0, .15); */
    }

    .hoverbutton:hover {
        transform: scale(1.05);
        background-color: #F1F6F9;
        transition: .3s transform;
        /* box-shadow: 0  1px 4px rgba(0, 0, 0, .15); */
    }

    .modal-body {
        height: 500px;
        overflow-y: auto;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE and Edge */
    }

    .select2-container--default .select2-selection--multiple {
        background-color: #F4F6F7;
        border: 0px solid #aaa;
        border-radius: 10px;
        cursor: text;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 0;
        outline: 0;
    }

    .select2-container--default .select2-dropdown {
        border-radius: 15px 15px 15px 15px;
        border: 0 solid #ced4da;
        border-bottom: 0 rgb(206, 212, 218);
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #0dcaf0;
        border: 0 solid #aaa;
        border-radius: 10px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 4px;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[aria-selected]:hover {
        background-color: #0dcaf0;
        color: #fff;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        cursor: pointer;
        display: inline-block;
        font-weight: bold;
        margin-right: 2px;
    }

    .scrollable-container::-webkit-scrollbar {
        width: 0.5rem; /* Adjust the width as needed */
    }

    .scrollable-container::-webkit-scrollbar-track {
        background-color: transparent;
    }

    .scrollable-container::-webkit-scrollbar-thumb {
        background-color: #888; /* Customize the scrollbar color */
        border-radius: 1rem; /* Adjust the border radius as needed */
    }

    .grow {
        transition: all .2s ease-in-out;
    }

    .grow:hover {
        transform: scale(1.05);
    }

    .outline-gray {
        color: #6c757d;
        border-radius: 15px;
        display: inline-block;
        font-weight: 400;
        /* color: #212529; */
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        /* user-select: none; */
        background-color: transparent;
        border: 1px solid #6c757d;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        /* line-height: 1.5; */
        /* border-radius: 0.25rem; */
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>

<section class="content ">
    <div class="container-fluid">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-3 mt-4">
                <div class="container sticky-top" style="top:80px;">

                
                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn border-0 shadow-none" style="background:; width: 100%; " data-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter" id="toggleButton">
                                        <h6 style="font-weight: 400; text-align: left; display: flex; justify-content: space-between; align-items: center;">
                                            <span>Filters</span>
                                            <i class="fa-solid fa-caret-left" id="caretIcon"></i>
                                        </h6>
                                    </a>
                                </div>
                            </div>

                            <div class="collapse" id="collapseFilter">
                                <div class="card card-body p-0">
                                    <div class="px-3">
                                        <hr class="mt-0">

                                        <label for="" class="text-muted" style="font-weight:400;">Job type</label>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="full_time" name="full_time">
                                            <label class="form-check-label" for="full_time" style="font-weight:300;">
                                                Full time
                                            </label>
                                        </div>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="part_time" name="part_time">
                                            <label class="form-check-label" for="part_time" style="font-weight:300;">
                                                Part time
                                            </label>
                                        </div>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="internship" name="internship">
                                            <label class="form-check-label" for="internship" style="font-weight:300;">
                                                Internship
                                            </label>
                                        </div>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="permanent" name="permanent">
                                            <label class="form-check-label" for="permanent" style="font-weight:300;">
                                                Permanent
                                            </label>
                                        </div>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="shift_work" name="shift_work">
                                            <label class="form-check-label" for="shift_work" style="font-weight:300;">
                                                Shift work
                                            </label>
                                        </div>
                                        <hr>
                                        <label for="" class="text-muted" style="font-weight:400;">Working Schedule</label>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="day_shift" name="day_shift">
                                            <label class="form-check-label" for="day_shift" style="font-weight:300;">
                                                Day shift
                                            </label>
                                        </div>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="night_shift" name="night_shift">
                                            <label class="form-check-label" for="night_shift" style="font-weight:300;">
                                                Night shift
                                            </label>
                                        </div>
                                        <div class="form-check pt-1" style="font-size:14px;">
                                            <input class="form-check-input" type="checkbox" value="" id="flex_time" name="flex_time">
                                            <label class="form-check-label" for="flex_time" style="font-weight:300;">
                                                Flex time
                                            </label>
                                        </div>
                                    </div>
                                    <div class="pt-3 d-flex justify-content-end pr-2">
                                        <button class="btn btn-outline-info" style="border-radius:80px;" type="button" name="filter">
                                            <span>Filter</span> <i class="fa-solid fa-filter"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card" style="">
                        <div class="card-body" >
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="false">All</a>
                                <a class="nav-link" id="v-pills-posts-tab" data-toggle="pill" href="#v-pills-posts" role="tab" aria-controls="v-pills-posts" aria-selected="false">Job Posts</a>
                                <a class="nav-link" id="v-pills-employer-tab" data-toggle="pill" href="#v-pills-employer" role="tab" aria-controls="v-pills-employer" aria-selected="false">Employer</a>
                                <a class="nav-link" id="v-pills-employee-tab" data-toggle="pill" href="#v-pills-employee" role="tab" aria-controls="v-pills-employee" aria-selected="false">Employee</a>
                            </div>
                        </div>
                    </div>
                        
                </div>    
            </div>
            
            <div class="col-12 col-md-9 mt-4">
                    <div id="search_result_content">
                        <?= $search_view_results ?>
                    </div>
                
            </div>
            
            
        </div>
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?= base_url() ?>assets/js/applicant/index.js"></script>
