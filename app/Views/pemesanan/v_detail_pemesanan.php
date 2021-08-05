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
            <h1>Detail Pemesanan</h1>
            <a href="<?= base_url('/pemesanan/ubah_pemesanan') . '/' . $detailPemesanan[0]['no_pemesanan'] ?>" class="btn btn-warning mt-3">Ubah</a>
            <form action="/pemesanan/6" method="POST" class="d-inline ml-2">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE" />
              <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Yakin?')">Hapus Semua</button>
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item p-1"><a href="#">Pemesanan</a></li>
              <li class="breadcrumb-item active p-1">Detail Pemesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>No. Pemesanan</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['no_pemesanan']; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>Tanggal</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['tanggal_pemesanan']; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>Nama Pelanggan</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['nama_pelanggan']; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>No. Meja</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['no_meja']; ?></p>
                      </div>
                    </div> 
                  </div>
                  <div class="col-6">
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>No. Pembayaran</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['no_pembayaran']; ?></p>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>Total Bayar</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> Rp<?= number_format($detailPemesanan[0]['total_bayar'], 2, ',', '.'); ?></p>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>Status</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['status_pemesanan']; ?></p>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>NRP</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['nrp']; ?></p>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="width: 10%;">No</th>
                      <th style="width: 10%;">Kode Menu</th>
                      <th style="width: 30%;" class="text-center">Nama Menu</th>
                      <th style="width: 10%;">Harga</th>
                      <th style="width: 10%;">Kuantitas</th>
                      <th style="width: 20%;" class="text-center">Subtotal</th>
                      <th style="width: 10%;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($detailPemesanan as $i => $dp) : ?>
                      <tr>
                        <td><?= $i + 1; ?></td>
                        <td><?= $dp['kode_menu']; ?></td>
                        <td class="text-center"><?= $dp['nama']; ?></td>
                        <td><?= number_format($dp['harga'], 2, ',', '.'); ?></td>
                        <td class="text-center"><?= $dp['kuantitas']; ?></td>
                        <td class="text-center"><?= number_format($dp['subtotal'], 2, ',', '.'); ?></td>
                        <td><a href="#"><button class="btn-sm btn-danger">Hapus</button></a></td>
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