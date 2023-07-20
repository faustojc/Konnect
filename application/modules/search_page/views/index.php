<?php
main_header(['Employer_profile']);
?>
<!-- ############ PAGE START-->
<script>
        function formatInput() {
            var input = document.getElementById("salary");
            var value = input.value;
            
            // Check if the input value is not empty
            if (value !== "") {
                // Add ".00" at the end if it's not already present
                if (!value.endsWith(".00")) {
                    input.value = value + ".00";
                }
            }
        }

        function formatInput2() {
            var input = document.getElementById("salary");
            var value = input.value;
            
            // Remove existing commas from the value
            value = value.replace(/,/g, '');
            
            // Format the value with commas for every thousand
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            // Update the input value with the formatted value
            input.value = value;
        }

        function disableDotZero() {
            var input = document.getElementById("salary");
            var value = input.value;
            
            // Check if the input value ends with ".00"
            if (!value.endsWith(".00")) {
                // Set the selection range to exclude ".00"
                input.setSelectionRange(0, value.length - 3);
            }
        }
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

    .table-black {
        border: 1px solid black;
    }

    .table-black td {
        border-top: 1px solid black;
    }

    .smallfont {
        font-size: 68%;
    }

    .smallfont2 {
        font-size: 75%;
    }

    .serif-font {
        font-family: "Times New Roman", Times, serif;
    }

    .list-3 li {
        margin-top: 5px;
        margin-bottom: 5px;
        text-transform: capitalize;
    }

    .list-3 {
        text-transform: capitalize;
        list-style-type: none;
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

    .card-head-custom {
        line-height: 1.5;
        font-size: 0.8rem;
    }

    .iconslist {
        padding-right: 10px;
    }

    .fs-12 {
        font-size: 12px;
    }

    .fs-14 {
        font-size: 14px;
    }

    .fs-16 {
        font-size: 16px;
    }

    .fs-18 {
        font-size: 18px;
    }

    .fs-20 {
        font-size: 20px;
    }


    .fw-500 {
        font-weight: 500;
    }

    .whitecolor {
        color: white;
    }

    .whitebg {
        background-color: white;
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

    .modal-dialog{
    overflow-y: initial !important
    }       
    .modal-body{
        height: 500px;
        overflow-y: auto;
        scrollbar-width: none;  /* Firefox */
        -ms-overflow-style: none;  /* IE and Edge */
        
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
        border-bottom-color: rgb(206, 212, 218);
        border-bottom-style: solid;
        border-bottom-width: 0px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #0dcaf0;
    border: 0px solid #aaa;
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
    

</style>

<section class="content ">
    <div class="container-fluid">
        <div class="row pl-3 pr-3" style="margin-top: 3.5rem;">
            <div class="col-12 col-md-3 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 style="font-weight:600;">Search Results</h4>
                        <hr>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <h6 style="font-weight:400;">Filters <i class="fa-solid fa-caret-left"></i></h6>

                        </a>
                        
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
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


            <!-- <div class="col-12 col-md-3 mt-4">
    
</div> -->
        </div><!--row-->
    </div><!--container fluid-->
</section>

<!-- ############ PAGE END-->
<?php
main_footer();
?>

<script src="<?php echo base_url() ?>/assets/js/dashboard/index.js">

</script>
