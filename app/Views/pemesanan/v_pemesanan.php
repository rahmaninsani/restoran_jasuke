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
            <h1>Daftar Pemesanan</h1>
            <?php if(is_pelayan()) : ?>
              <a href="<?= base_url('/pemesanan/tambah_pemesanan') ?>" class="btn btn-primary mt-3">Tambah Pemesanan</a>
            <?php endif; ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item p-1"><a href="#">Pemesanan</a></li>
              <li class="breadcrumb-item active p-1">Daftar Pemesanan</li>
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
                    <tr  class="text-center">
                      <th>No</th>
                      <th style="width: 10px;">No Pemesanan</th>
                      <th>No Meja</th>
                      <th>Tanggal</th>
                      <th class="text-left">Nama Pelanggan</th>
                      <th>Status</th>
                      <th>NRP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($pemesanan as $i => $p) : ?>
                      <tr class="text-center">
                        <th><?= $i + 1; ?></th>
                        <td><?= $p['no_pemesanan']; ?></td>
                        <td><?= $p['no_meja']; ?></td>
                        <td><?= $p['tanggal_pemesanan']; ?></td>
                        <td class="text-left"><?= $p['nama_pelanggan']; ?></td>
                        <td>
                          <span class="badge bg-<?= ($p['status_pemesanan'] == 'Selesai') ? 'success' : 'warning'; ?>"><?= $p['status_pemesanan']; ?></span>
                        </td>
                        <td><?= $p['nrp']; ?></td>
                        <td><a href="<?= base_url('/pemesanan') . '/' . $p['no_pemesanan'] ?>"><button class="btn btn-info">Detail</button></a></td>
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