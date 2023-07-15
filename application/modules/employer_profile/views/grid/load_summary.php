<?php if (empty($current_employer->summary)): ?>
    <div class="d-flex flex-column py-2 px-2">
        <div class="d-flex align-items-center mb-1">
            <h5 class=" ml-1"><i class="fa-solid fa-pen-to-square "></i> Write a summary to highlight your company </h5>
        </div>
        <div class="d-flex flex-column flex-grow-1">
            <p class="fs-14">A well-written summary can attract more qualified and interested applicants, as well as showcase your brand identity and reputation.</p>
            <button type="button" class="btn btn-light rounded-pill edit-summary" style="border-width: 2px" data-toggle="modal" data-target="#summary-modal">Add a summary</button>
        </div>
    </div>
<?php else: ?>
    <div class="summary-content">
        <?= $current_employer->summary ?>
    </div>
<?php endif; ?>