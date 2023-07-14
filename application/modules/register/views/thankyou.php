<?php auth_head() ?>
<style>
    .thank-you-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 5px;
        margin-top: 100px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .thank-you-container h1 {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .thank-you-container p {
        text-align: center;
        margin-bottom: 20px;
    }

    .thank-you-container a {
        display: block;
        width: 150px;
        margin: 0 auto;
        text-align: center;
        padding: 10px 0;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
    }
</style>

<div class="container">
    <div class="thank-you-container">
        <h1>Thank You for Registering</h1>
        <p class="mb-3">Welcome to Konnect! You are now part of our vibrant community connecting job seekers and employers. Get ready to explore exciting opportunities and take your career to new heights.</p>
        <h6>You will be redirected to login page shortly</h6>
    </div>
</div>

<?php auth_footer() ?>
