<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title ; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url();?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url();?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/datatable/dataTables.bootstrap4.min.css') ?>" type="text/css">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/uploads/'. $this->session->userdata('foto') .'') ; ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata('nama') ; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('Dashboard/profile') ;?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" href="<?= base_url('Login/logout') ;?>">
                  <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('Dashboard') ;?>">Rumput Laut</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('Dashboard') ;?>">RL</a>
          </div>
          <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li>
            <a class="nav-link" href="<?= base_url('Dashboard') ;?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
          </li>
          <li class="menu-header">Data Utama</li>
          <li class="dropdown">
              <a href="<?= base_url('Dashboard/rekap') ;?>" class="nav-link" ><i class="fas fa-book-open"></i> <span>Data Rekap</span></a>
          </li>
          <li class="dropdown">
              <a href="<?= base_url('Dashboard/grafik') ;?>" class="nav-link"><i class="fas fa-chart-line"></i> <span>Grafik Suhu</span></a>
          </li>
        </aside>
      </div>

      <div class="flash-sukses" data-flashdata="<?= $this->session->flashdata('flash-sukses') ; ?>"></div>
      <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error') ; ?>"></div>

      <?php $this->load->view($page) ; ?>

      <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2020 Rumput Laut
        </div>
        <div class="footer-right">
              
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url() ; ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/popper.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url() ; ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  
  <script src="<?= base_url() ; ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ; ?>assets/js/scripts.js"></script>
  <script src="<?= base_url() ; ?>assets/js/custom.js"></script>
  <script src="<?= base_url() ; ?>assets/js/sweetalert/sweetalert2.js"></script>
  <script src="<?= base_url() ; ?>assets/js/sweetalert/new_script.js"></script>

  <script src="<?php echo base_url() ;?>assets/datatable/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ;?>assets/datatable/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url('assets/highchart/highcharts.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/highchart/exporting.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/highchart/highcharts-3d.js')?>"></script>

</body>
</html>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>