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

<div class="container">
    <div class="thank-you-container w-75 mx-auto">
        <img src="<?= base_url() ?>assets/images/Logo/Konnect3.png" class="img-fluid mb-4" alt="Konnect logo">
        <h1 class="mb-5">Thank You for Registering</h1>
        <p class="mb-5 text-justify">Welcome to Konnect! You are now part of our vibrant community connecting jobseekers and employers. Get ready to explore exciting opportunities and take your career to new heights.</p>
        <h6 class="mb-3">You will be redirected to login page shortly</h6>
        <p>
            Didn't redirect?
            <a href="<?= base_url() ?>login">Click here</a>
        </p>
    </div>
</div>

<script type="text/javascript">
    setTimeout(function() {window.location.href = "<?= base_url() ?>login"}, 3000);
</script>

<?php auth_footer() ?>
