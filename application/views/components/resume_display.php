<style>
    .review_h {
        font-size: 13px;
        font-weight: 500;
        border: 1px solid black;
        border-radius: 10px;
    }

    .review_l {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border: 1px solid black;
        border-radius: 10px;
    }

    .review_l h4 {
        margin-right: 10px;
    }

    .review_l h6 {
        font-size: 13px;
        font-weight: 500;
        margin: 0;
    }

    .review_l .uploaded {
        font-weight: 400;
    }
</style>

<div class="review_l row px-2">
    <div class="col-md-11">
        <div class="row p-2">
            <h4><i class="fa-solid fa-file pr-1 pt-2"></i></h4>
            <div class="pt-1">
                <h6><?= $resume->file_name ?></h6>
                <small class="uploaded"><?= $resume->file_size ?> KB</small>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <button type="button" class="btn">
            <i class="fa-solid fa-download button"></i>
        </button>
    </div>
</div>
