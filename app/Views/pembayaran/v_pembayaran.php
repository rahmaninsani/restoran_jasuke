<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->getFlashdata('pesan')) : ?>  
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
<?php endif; ?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
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
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th style="width: 10px;">No Pembayaran</th>
                      <th>Tanggal</th>
                      <th class="text-left">Nama Pelanggan</th>
                      <!-- <th class="text-right">Total Harga</th>
                      <th class="text-right">Pajak</th> -->
                      <th class="text-right">Total Bayar</th>
                      <th>Status</th>
                      <th>NRP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pembayaran as $i => $p) : ?>
                      <tr class="text-center">
                        <th><?= $i + 1; ?></th>
                        <td><?= $p['no_pembayaran']; ?></td>
                        <td><?= ($p['tanggal_pembayaran']) ? $p['tanggal_pembayaran'] : '-'; ?></td>
                        <td class="text-left"><?= $p['nama_pelanggan']; ?></td>
                        <!-- <td class="text-right"><?php //number_format($p['total_harga'], 2, ',', '.'); ?></td> -->
                        <!-- <td class="text-right"><?php //number_format($p['pajak'], 2, ',', '.'); ?></td> -->
                        <td class="text-right"><?= number_format($p['total_bayar'], 2, ',', '.'); ?></td>
                        <td>
                          <span class="badge bg-<?= ($p['status_pembayaran'] == 'Sudah Bayar') ? 'success' : 'warning'; ?>"><?= $p['status_pembayaran']; ?></span>
                        </td>
                        <td class="text-center"><?= $p['nrp_kasir']; ?></td>
                        <td><a href="<?= base_url('/pembayaran') . '/' . $p['no_pembayaran'] ?>"><button class="btn btn-info">Detail</button></a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>