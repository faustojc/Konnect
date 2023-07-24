<?php
main_header(['Employer_profile']);
?>
<!-- ############ PAGE START-->
<script>
    function formatInput() {
        const input = document.getElementById("salary");
        const value = input.value;

        // Check if the input value is not empty
        if (value !== "") {
            // Add ".00" at the end if it's not already present
            if (!value.endsWith(".00")) {
                input.value = value + ".00";
            }
        }
    }

    function formatInput2() {
        const input = document.getElementById("salary");
        let value = input.value;

        // Remove existing commas from the value
        value = value.replace(/,/g, '');

        // Format the value with commas for every thousand
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Update the input value with the formatted value
        input.value = value;
    }

    function disableDotZero() {
        const input = document.getElementById("salary");
        const value = input.value;

        // Check if the input value ends with ".00"
        if (!value.endsWith(".00")) {
            // Set the selection range to exclude ".00"
            input.setSelectionRange(0, value.length - 3);
        }
    }

    $(document).ready(function () {
        $("#filterToggle").click(function () {
            $(this).find("i.fa-caret-left").toggleClass("fa-caret-down");
        });
    });
</script>
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
                <div class="card sticky-top" style="top:70px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a class="btn border-0 shadow-none" style="background:; width: 100%; " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="toggleButton">
                                    <h6 style="font-weight: 400; text-align: left; display: flex; justify-content: space-between; align-items: center;">
                                        <span>Filters</span>
                                        <i class="fa-solid fa-caret-left" id="caretIcon"></i>
                                    </h6>
                                </a>
                            </div>
                        </div>


                        <div class="collapse" id="collapseExample">
                            <div class="card card-body p-0">
                                <div class="px-3">
                                    <hr class="mt-0">

                                    <label for="" class="text-muted" style="font-weight:400;">Job type</label>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Full time
                                        </label>
                                    </div>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Part time
                                        </label>
                                    </div>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Internship
                                        </label>
                                    </div>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Permanent
                                        </label>
                                    </div>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Shift work
                                        </label>
                                    </div>
                                    <!-- <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                                Distant work
                                            </label>
                                    </div> -->

                                    <hr class="">

                                    <label for="" class="text-muted" style="font-weight:400;">Working Schedule</label>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Day shift
                                        </label>
                                    </div>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Night shift
                                        </label>
                                    </div>
                                    <div class="form-check pt-1" style="font-size:14px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="font-weight:300;">
                                            Flex time
                                        </label>
                                    </div>


                                </div>
                                <div class="pt-3 d-flex justify-content-end pr-2">
                                    <button class="btn btn-outline-info" style="border-radius:80px;">
                                        <span>Filter</span> <i class="fa-solid fa-filter"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12 col-md-9 mt-4">
                <!-- POSTS -->

                <div class="row">
                    <?= $jobpost_section_view ?>
                </div>
                <!-- JOBPOSTS -->
            </div>
            <!-- <div class="col-12 col-md-3 mt-4"></div> -->
        </div>
    </div>
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?php echo base_url() ?>/assets/js/dashboard/index.js">

</script>

<script>
    $(document).ready(function () {
        $("#toggleButton").click(function () {
            // Toggle the class of the caret icon
            $("#caretIcon").toggleClass("fa-caret-left fa-caret-down");
        });
    });
</script>
