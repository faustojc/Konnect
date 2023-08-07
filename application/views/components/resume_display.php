<div class="review_l row px-2">
    <div class="d-flex p-2">
        <h4><i class="fa-solid fa-file pr-1 pt-2"></i></h4>
        <div class="pt-1" style="display: inline-grid;">
            <a target="_blank" href="<?= base_url() ?>assets/documents/resume/<?= $resume->employee_id ?>/<?= $resume->file_name ?>" class="text-truncate"><?= $resume->file_name ?></a>
            <small class="uploaded"><?= $resume->file_size ?> KB</small>
        </div>
    </div>
</div>
