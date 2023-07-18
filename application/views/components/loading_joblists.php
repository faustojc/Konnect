<style>
    .loading-card {
        position: relative;
        overflow: hidden;
    }

    .loading-card::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(
                to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.8) 50%,
                rgba(255, 255, 255, 0) 100%
        );
        animation: loading-card-overlay-animation 1s infinite;
    }

    @keyframes loading-card-overlay-animation {
        from {
            left: -100%;
        }
        to {
            left: 100%;
        }
    }

    .loading-content-box {
        height: 1rem;
        background-color: #ddd;
        margin-bottom: .8rem;
    }
</style>

<div class="col-md-4 px-2">
    <?php
    // Generate 4 random loading cards
    for ($i = 0; $i < 4; $i++) {
        // Generate a random number of boxes (between 3 and 6)
        $title_boxes = rand(3, 4);
        $body_boxes = rand(4, 7);

        // Start the card
        echo '<div class="card loading-card mb-3">';
        echo '<div class="card-body">';

        // Generate the boxes for card-title
        for ($j = 0; $j < $title_boxes; $j++) {
            // Generate a random width for the box (between 30% and 100%)
            $width = rand(30, 90);
            echo '<div class="loading-content-box" style="width:' . $width . '%;"></div>';
        }

        echo '<br>';

        // Generate the boxes for card-body
        for ($j = 0; $j < $body_boxes; $j++) {
            // Generate a random width for the box (between 30% and 100%)
            $width = rand(30, 100);
            echo '<div class="loading-content-box" style="width:' . $width . '%;"></div>';
        }

        // End the card
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>
<div class="col-md-5 px-2">
    <div class="card loading-card">
        <div class="card-body">
            <div class="loading-content-box" style="width:80%;"></div>
            <div class="loading-content-box" style="width:60%;"></div>
            <br>
            <div class="loading-content-box" style="width:70%;"></div>
            <br>
            <div class="loading-content-box" style="width:50%;"></div>
            <hr>
            <div class="loading-content-box" style="width:100%;"></div>
            <div class="loading-content-box" style="width:100%;"></div>
            <div class="loading-content-box" style="width:100%;"></div>
            <div class="loading-content-box" style="width:100%;"></div>
            <div class="loading-content-box" style="width:100%;"></div>
            <div class="loading-content-box" style="width:100%;"></div>
            <div class="loading-content-box" style="width:45%;"></div>
            <br>
            <div class="loading-content-box" style="width:100%;"></div>
            <div class="loading-content-box" style="width:60%;"></div>
        </div>
    </div>
</div>
