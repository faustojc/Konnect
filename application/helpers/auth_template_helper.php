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
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/adminlte/AdminLTE/dist/css/adminlte.min.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/bootstrap/dist/css/bootstrap.min.css">

        <link href='<?= base_url() ?>/assets/css/auth/style.css' rel="stylesheet" type="text/css"/>
    </head>
    <body class="fade-in d-flex justify-content-center align-items-center h-100">
<?php }

function auth_footer()
{ ?>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </body>
    </html>
<?php }
