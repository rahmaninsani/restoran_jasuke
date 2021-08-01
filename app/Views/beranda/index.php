<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
<<<<<<< HEAD
        <div class="row justify-content-center">
          <div class="col-lg-3 col-6">
=======
        <div class="row justify-content-center mb-4">
          <div class="col-4">
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>6 meja</h3>
                <p>Tersedia</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkbox-outline"></i>
              </div>
<<<<<<< HEAD
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
=======
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-4">
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>4 meja</h3>
                <p>Terisi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
<<<<<<< HEAD
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row justify-content-center">
          <div class="col text-center">
            <button type="button" class="btn btn-primary"> Lihat Meja</button>
=======
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
          </div>
        </div>
        <!-- /.row -->
<<<<<<< HEAD
        <h5 class="mb-2">Penjualan Terbanyak</h5>
        <div class="card card-success">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <a href="#" class="text-white">Terjual 20 porsi/hari</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <a href="#" class="text-white">Terjual 20 porsi/hari</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <a href="#" class="text-white">Terjual 20 porsi/hari</a>
                  </div>
                </div>
=======
        
        <!-- /.row -->
        <div class="row">
          <div class="col">
            <h5 class="mb-3 font-weight-bold">Penjualan Terbanyak</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="card position-relative" style="width: 18rem;">
              <img src="/assets/img/telur-dadar.jpg" class="card-img-top" alt="...">
              <div class="ribbon-wrapper ribbon-xl">
                <div class="ribbon bg-danger text-lg">
                  Terlaris
                </div>
              </div>
              <div class="card-body">
                <p class="font-weight-bold">Nasi Goreng Spesial Ati</p>
                <p>Rp14000</p>
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>