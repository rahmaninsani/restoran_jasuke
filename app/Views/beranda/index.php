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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>9</h3>
                <p>Meja Kosong</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkbox-outline"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>7</h3>
                <p>Pelanggan Dine-in</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>16</h3>
                <p>Menu Tersedia</p>
              </div>
              <div class="icon">
                <i class="ion ion-spoon"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>150.000</h3>
                <p>Pemasukan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!-- <div class="row mt-2">
          <div class="col">
            <h5 class="mb-3 font-weight-bold">Penjualan Terbanyak</h5>
          </div>
        </div> -->
        <!-- /.row -->

        <div class="row d-flex justify-content-around mt-4">
          <div class="col-4 d-flex justify-content-center">
            <div class="card position-relative" style="width: 18rem;">
              <img src="/assets/img/telur-dadar.jpg" class="card-img-top" alt="...">
              <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-danger text-md">
                  Terlaris
                </div>
              </div>
              <div class="card-body text-center">
                <h5 class="font-weight-bold">Telur Dadar</h5>
              </div>
            </div>
          </div>
          <div class="col-4 d-flex justify-content-center">
            <div class="card position-relative" style="width: 18rem;">
              <img src="/assets/img/telur-dadar.jpg" class="card-img-top" alt="...">
              <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-success text-md">
                  Baru
                </div>
              </div>
              <div class="card-body text-center">
                <h5 class="font-weight-bold">Telur Dadar</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>