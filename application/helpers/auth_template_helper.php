<?php
defined('BASEPATH') or exit('No direct script access allowed');

function auth_head()
{ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= SYSTEM_NAME ?></title>
        <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/images/Logo/Konnect2.ico">

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/font-awesome/css/all.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/dist/css/adminlte.min.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/bootstrap/dist/css/bootstrap.min.css">

        <link href='<?= base_url() ?>/assets/css/auth/style.css' rel="stylesheet" type="text/css" />

        <!-- REQUIRED SCRIPTS -->
        <script>
            const baseUrl = '<?= base_url() ?>';
        </script>
    </head>
    <body class="fade-in">
    <!-- <nav class="navbar">
        <div class="container">
            <a class="navbar-brand text-decoration-none text-dark" href="<?= base_url() ?>">
                <img src="<?= base_url() ?>assets/images/Logo/Konnect2.png" class="d-inline-block" width="30" height="30" alt="Konnect Logo">
                Konnect
            </a>
        </div>
    </nav> -->
    <section class="d-flex justify-content-center align-items-center h-100">
<?php }

function auth_footer()
{ ?>
    </section>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </body>
    </html>
<?php }
