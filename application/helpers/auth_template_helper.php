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
        <link rel="stylesheet" href="<?= base_url() ?>assets/theme/bootstrap/css/bootstrap.min.css">
        <script src="<?= base_url() ?>assets/theme/adminlte/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <link href='<?= base_url() ?>/assets/css/auth/style.css' rel="stylesheet" type="text/css"/>
    </head>
<?php }

function auth_footer()
{ ?>
    </html>
<?php }
