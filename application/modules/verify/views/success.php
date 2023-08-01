<?php auth_head() ?>
<style>
    .thank-you-container {
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .thank-you-container h1 {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

</style>

<div class="container d-flex align-content-center">
    <div class="thank-you-container w-75 mx-auto border border-success">
        <h1 class="mb-5">
            Your Account is now Verified! <i class="fa fa-circle-check fa-lg fa-beat text-success"></i>
        </h1>
        <p class="mb-2 text-justify">You will be redirected to login page shortly</p>
        <p>
            Didn't redirect? <a href="<?= base_url() ?>home">Click here</a>
        </p>
    </div>
</div>

<script type="text/javascript">
    setTimeout(() => window.location.href = "<?= base_url() ?>home", 3000);
</script>

<?php auth_footer() ?>
