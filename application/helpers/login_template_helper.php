<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  function login_header() {
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <title><?=SYSTEM_NAME?></title>

  <meta name="description" content="Admin Monitoring, COVID-19 Contact Tracing System ">
  <meta name="keywords" content="Admin Monitoring, Contracovid, COVID-19, Contact Tracing System, Contact Tracing application, Contact Tracing Software, Contact Tracing QR Code, Contact Tracing ID System, Fight against Covid-19, Filipino made, Bacolod Contact Tracing, Bacolod City, Philippines">
  <meta name="author" content="Let's Talk Information Technology Solutions">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">


  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <!-- <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="../assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit"> -->
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <!-- <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png"> -->
  
  <!-- style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css <?= base_url()?>assets/theme/styles/app.min.css -->
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/styles/font.css" type="text/css" />
  <link rel="shortcut icon" href="<?= base_url()?>assets/images/Logo/dental_logo.png">
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/theme/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/fontawesome-free/css/all.min.css">

    <!-- YOB ADDED 5-17 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- END -->

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url()?>assets/theme/adminlte/AdminLTE/dist/css/adminlte.min.css">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<body>
  <style>
  html{
    background-color:#f0f0f0;
  }
  /* body, .app{
    height:100vh;
  } */
  .navbar-custom{
    height:50px;
    background: rgb(102, 153, 255);
  }
  .footer{
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:#091f39;
    color: white;
    text-align: center;
  }
  .web-title{
      padding:6px;
      font-family: "AANTICORONA";
      color: white;
  }
  .mobile-size{
    display:none;
  }
  #letstalklogin{
      background-color: #1d3d7c;
  }
  .center-block {
    margin-top:10%;
  }
    /*###Desktops, big landscape tablets and laptops(Large, Extra large)####*/
    @media screen and (min-width: 1024px){
    /*Style*/
    }

    /*###Tablet(medium)###*/
    @media screen and (min-width : 768px) and (max-width : 1023px){

    }

    /*### Smartphones (portrait and landscape)(small)### */
    @media screen and (min-width : 0px) and (max-width : 767px){
      .footer{
        display:none;
      }
      .mobile-size{
        display: block;
      }
      .center-block {
        margin-top:0%;
      }
    }
  </style>
<?php
}

function login_footer(){

?>

<script>
  var baseUrl = '<?php echo base_url(); ?>';
</script>

<script type="text/javascript">
  var base_url = '<?=base_url()?>';
</script>
<!-- jQuery -->
<script src="<?= base_url()?>assets/theme/libs/jquery/jquery/dist/jquery.js"></script>
<!-- <script src="<?= base_url()?>assets/js/service.js"></script> -->
<!-- Bootstrap -->
  <script src="<?= base_url()?>assets/theme/libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="<?= base_url()?>assets/theme/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="<?= base_url()?>assets/theme/libs/jquery/underscore/underscore-min.js"></script>
  <script src="<?= base_url()?>assets/theme/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <!-- <script src="<?= base_url()?>assets/theme/libs/jquery/PACE/pace.min.js"></script> -->

  <script src="<?= base_url()?>assets/theme/html-version/scripts/config.lazyload.js"></script>

  <script src="<?= base_url()?>assets/theme/html-version/scripts/palette.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-load.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-jp.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-include.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-device.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-form.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-nav.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-screenfull.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-scroll-to.js"></script>
  <script src="<?= base_url()?>assets/theme/html-version/scripts/ui-toggle-class.js"></script>

  <script src="<?= base_url()?>assets/theme/html-version/scripts/app.js"></script>
  <script src="<?= base_url()?>assets/js/noPostBack.js"></script>
  <!-- ajax -->
  <script src="<?= base_url()?>assets/theme/libs/jquery/jquery-pjax/jquery.pjax.js"></script>
<!-- endbuild -->
<!-- jQuery -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sweetalert -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()?>assets/theme/adminlte/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

 <!-- load global js -->
 <script src="<?= base_url() ?>assets/js/global.js"></script>
</body>
</html>
<?php
}