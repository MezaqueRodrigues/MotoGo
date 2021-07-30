<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/admin_lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/admin_lte/css/adminlte.min.css">

  <!-- Style Grocery Crud -->
  <?php if (isset($css_files)){
  foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; }?>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
<?= $this->include("template/admin/menu_horizontal.php")?>

<?php include_once("sidebar.php")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= isset($header_page) ? $header_page : "" ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">        
        <?= $this->renderSection('content') ?>     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <?php include_once("footer.php")?>

  <?php include_once("right_sidebar.php")?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>/admin_lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/admin_lte/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/admin_lte/js/demo.js"></script>

<!-- Grocery Crud JS -->
<?php 
   if (isset($js_files)){
   foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; }?>

</body>
</html>
