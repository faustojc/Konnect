<div class="modal fade <?= $bgColor ?>" id="<?= $modalId ?>" tabindex="-1" role="dialog" aria-labelledby="MODAL-<?= $modalId ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MODAL<?= $modalId ?>"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= $content ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" id="<?= $submitBtnId ?>" data-dismiss="modal"><?= $submitBtnText ?></button>
            </div>
        </div>
    </div>
</div>