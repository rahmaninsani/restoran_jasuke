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
            <h1 class="m-0">Beranda</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Beranda</li>
            </ol>
          </div>/.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">
          <?php if(! is_koki()) : ?>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $mejaKosong; ?></h3>
                  <p>Meja Kosong</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-checkbox-outline"></i>
                </div>
                <a href="<?= base_url('/meja') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          <?php endif; ?> 

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php if(! is_kasir()) : ?>
                  <h3><?= $jumlahPemesanan; ?></h3>
                  <?php if(is_pelayan()) : ?>
                    <p>Pemesanan Sedang Disajikan</p>
                  <?php else : ?>
                    <p>Pemesanan Perlu Disajikan</p>
                  <?php endif; ?>
                <?php endif; ?>
                <?php if(is_kasir()) : ?>
                  <h3><?= $jumlahBelumBayar; ?></h3>
                  <p>Pemesanan Belum Bayar</p>
                <?php endif; ?>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <?php if(! is_kasir()) : ?>
                <a href="<?= base_url('/pemesanan') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
              <?php else : ?>
                <a href="<?= base_url('/pembayaran') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
              <?php endif; ?>
            </div>
          </div>
          <!-- ./col -->

          <?php if(! is_kasir()) : ?>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?= $menuTersedia; ?></h3>
                  <p>Menu Tersedia</p>
                </div>
                <div class="icon">
                  <i class="ion ion-spoon"></i>
                </div>
                <a href="<?= base_url('/menu') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          <?php endif; ?>

          <?php if(is_kasir()) : ?>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $pemasukanHarian; ?></h3>
                  <p>Pemasukan Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cash"></i>
                </div>
                <a href="<?= base_url('/laporan') ?>" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          <?php endif; ?>
        </div>
        <!-- /.row -->
        
        <!-- <div class="row mt-2">
          <div class="col">
            <h5 class="mb-3 font-weight-bold">Penjualan Terbanyak</h5>
          </div>
        </div> -->
        <!-- /.row -->

        <?php if($menuTerlaris && ! is_kasir()): ?>
          <div class="row d-flex justify-content-around mt-4">
            <div class="col-4 d-flex justify-content-center">
              <div class="card position-relative" style="width: 18rem;">
                <img src="/assets/img/<?= $menuTerlaris['gambar']; ?>" class="card-img-top" alt="...">
                <div class="ribbon-wrapper ribbon-lg">
                  <div class="ribbon bg-danger text-md">
                    Terlaris
                  </div>
                </div>
                <div class="card-body text-center">
                  <h5 class="font-weight-bold"><?= $menuTerlaris['kode_menu']; ?> - <?= $menuTerlaris['nama']; ?></h5>
                  <h6>Rp<?= number_format($menuTerlaris['harga'], 2, ',', '.'); ?></h6>
                  <h6><?= $menuTerlaris['jumlah_terjual']; ?> terjual minggu ini</h6>
                </div>
              </div>
            </div>
            <div class="col-4 d-flex justify-content-center">
              <div class="card position-relative" style="width: 18rem;">
                <img src="/assets/img/<?= $menuTerbaru['gambar']; ?>" class="card-img-top" alt="...">
                <div class="ribbon-wrapper ribbon-lg">
                  <div class="ribbon bg-success text-md">
                    Baru
                  </div>
                </div>
                <div class="card-body text-center">
                  <h5 class="font-weight-bold"><?= $menuTerbaru['kode_menu']; ?> - <?= $menuTerbaru['nama']; ?></h5>
                  <h6>Rp<?= number_format($menuTerbaru['harga'], 2, ',', '.'); ?></h6>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        <?php endif; ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>