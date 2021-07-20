<!DOCTYPE html>
<html lang="en">
  <!-- Manggil Head -->
  <?= $this->include('layout/head'); ?>

  <body class="hold-transition sidebar-mini layout-fixed">

    <!-- Manggil Preloader -->
    <?php //$this->include('layout/preloader'); ?>

    <!-- Manggil Navbar -->
    <?= $this->include('layout/navbar'); ?>

    <!-- Manggil Sidebar -->
    <?= $this->include('layout/sidebar'); ?>

    <!-- Manggil Content -->
    <?= $this->renderSection('content'); ?>

    <!-- Manggil Footer -->
    <?= $this->include('layout/footer'); ?>

    <!-- Manggil Control Sidebar -->
    <?= $this->include('layout/control-sidebar'); ?>

    <!-- Manggil Javasript -->
    <?= $this->include('layout/javascript'); ?>

  </body>
</html>