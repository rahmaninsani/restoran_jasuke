<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->getFlashdata('pesan')) : ?>  
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
<?php endif; ?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pembayaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item p-1"><a href="#">Pembayaran</a></li>
              <li class="breadcrumb-item active p-1">Daftar Pembayaran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Harian : <?= date("l, d F Y"); ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="laporanHarian" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Kode Menu</th>
                      <th>Nama Menu</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah Terjual</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pelaporanHarian as $i => $ph) : ?>
                      <tr class="text-center">
                        <td><?= $i + 1; ?></td>
                        <td><?= $ph['kode_menu']; ?></td>
                        <td class="text-left"><?= $ph['nama']; ?></td>
                        <td class="text-right"><?= number_format($ph['harga'], 2, ',', '.'); ?></td>
                        <td class="text-right"><?= $ph['jumlah_terjual']; ?></td>
                        <td class="text-right"><?= number_format($ph['subtotal'], 2, ',', '.'); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th colspan="4">Total</th>
                      <th class="text-right"><?= $kuantitasTerjualHarian; ?></th>
                      <th class="text-right">Rp<?= number_format($pemasukanHarian, 2, ',', '.'); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Mingguan : <?= date("d F Y", strtotime("-1 week")); ?> - <?= date("d F Y"); ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="laporanMingguan" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Kode Menu</th>
                      <th>Nama Menu</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah Terjual</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pelaporanMingguan as $i => $pm) : ?>
                      <tr class="text-center">
                        <td><?= $i + 1; ?></td>
                        <td><?= $pm['kode_menu']; ?></td>
                        <td class="text-left"><?= $pm['nama']; ?></td>
                        <td class="text-right"><?= number_format($pm['harga'], 2, ',', '.'); ?></td>
                        <td class="text-right"><?= $pm['jumlah_terjual']; ?></td>
                        <td class="text-right"><?= number_format($pm['subtotal'], 2, ',', '.'); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th colspan="4">Total</th>
                      <th class="text-right"><?= $kuantitasTerjualMingguan; ?></th>
                      <th class="text-right">Rp<?= number_format($pemasukanMingguan, 2, ',', '.'); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Bulan <?= date("F"); ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="laporanBulanan" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Kode Menu</th>
                      <th>Nama Menu</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah Terjual</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pelaporanBulanan as $i => $pb) : ?>
                      <tr class="text-center">
                        <td><?= $i + 1; ?></td>
                        <td><?= $pb['kode_menu']; ?></td>
                        <td class="text-left"><?= $pb['nama']; ?></td>
                        <td class="text-right"><?= number_format($pb['harga'], 2, ',', '.'); ?></td>
                        <td class="text-right"><?= $pb['jumlah_terjual']; ?></td>
                        <td class="text-right"><?= number_format($pb['subtotal'], 2, ',', '.'); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th colspan="4">Total</th>
                      <th class="text-right"><?= $kuantitasTerjualBulanan; ?></th>
                      <th class="text-right">Rp<?= number_format($pemasukanBulanan, 2, ',', '.'); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Tahun <?= date("Y"); ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="laporanTahunan" class="table table-bordered table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Kode Menu</th>
                      <th>Nama Menu</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah Terjual</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pelaporanTahunan as $i => $pt) : ?>
                      <tr class="text-center">
                        <td><?= $i + 1; ?></td>
                        <td><?= $pt['kode_menu']; ?></td>
                        <td class="text-left"><?= $pt['nama']; ?></td>
                        <td class="text-right"><?= number_format($pt['harga'], 2, ',', '.'); ?></td>
                        <td class="text-right"><?= $pt['jumlah_terjual']; ?></td>
                        <td class="text-right"><?= number_format($pt['subtotal'], 2, ',', '.'); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th colspan="4">Total</th>
                      <th class="text-right"><?= $kuantitasTerjualTahunan; ?></th>
                      <th class="text-right">Rp<?= number_format($pemasukanTahunan, 2, ',', '.'); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>