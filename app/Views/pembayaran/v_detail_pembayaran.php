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
            <h1>Detail Pembayaran</h1>
            <?php if($detailPemesanan[0]['status_pembayaran'] == "Sudah Bayar") : ?>
              <a href="<?= base_url('/pembayaran/belum_bayar') . '/' . $detailPemesanan[0]['no_pembayaran'] ?>" class="btn btn-warning mt-3 ml-2">Ubah Bayar</a>
            <?php endif; ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item p-1"><a href="#">Pembayaran</a></li>
              <li class="breadcrumb-item active p-1">Detail Pembayaran</li>
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
                        <p class="card-text"><b>No. Pembayaran</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['no_pembayaran']; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>Tanggal</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= ($detailPemesanan[0]['tanggal_pembayaran']) ? $detailPemesanan[0]['tanggal_pembayaran'] : '-'; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>NRP</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['nrp_kasir']; ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>No. Meja</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['no_meja']; ?></p>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>Nama Pelanggan</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <?= $detailPemesanan[0]['nama_pelanggan']; ?></p>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>Status Pembayaran</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> <span class="badge bg-<?= ($detailPemesanan[0]['status_pembayaran'] == 'Sudah Bayar') ? 'success' : 'warning'; ?>"><?= $detailPemesanan[0]['status_pembayaran']; ?></p>
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
                      <th style="width: 15%;">Harga</th>
                      <th style="width: 10%;">Kuantitas</th>
                      <th style="width: 15%;" class="text-right">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($detailPemesanan as $i => $dp) : ?>
                      <tr>
                        <th><?= $i + 1; ?></th>
                        <td><?= $dp['kode_menu']; ?></td>
                        <td class="text-center"><?= $dp['nama']; ?></td>
                        <td><?= number_format($dp['harga'], 2, ',', '.'); ?></td>
                        <td class="text-center"><?= $dp['kuantitas']; ?></td>
                        <td class="text-right"><?= number_format($dp['subtotal'], 2, ',', '.'); ?></td>
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
        <div class="row d-flex justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>Total Harga</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> Rp<?= number_format($detailPemesanan[0]['total_harga'], 2, ',', '.'); ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>Pajak</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> Rp<?= number_format($detailPemesanan[0]['pajak'], 2, ',', '.'); ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <p class="card-text"><b>Total Bayar</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> Rp<?= number_format($detailPemesanan[0]['total_bayar'], 2, ',', '.'); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>Uang Bayar</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> Rp<?= number_format($detailPemesanan[0]['uang_bayar'], 2, ',', '.'); ?></p>
                      </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                      <div class="col-4">
                        <p class="card-text"><b>Kembalian</b></p>
                      </div>
                      <div class="col-4">
                        <p><b>:</b> Rp<?= number_format($detailPemesanan[0]['uang_kembalian'], 2, ',', '.'); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <?php if($detailPemesanan[0]['status_pembayaran'] != "Sudah Bayar") : ?>
                <form action="/pembayaran/bayar/<?= $detailPemesanan[0]['no_pembayaran']; ?>/<?= $detailPemesanan[0]['no_meja']; ?>" method="POST">
                  <div class="card-body">
                    <div class="row justify-content-center">
                      <div class="col-5">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" min="<?= $detailPemesanan[0]['total_bayar']; ?>" class="form-control" id="uangBayar" name="uangBayar" placeholder="Masukkan nominal pembayaran" autofocus required />
                        <div div class="input-group-append">
                          <span class="input-group-text">,00</span>
                        </div>
                      </div>
                      </div>
                    </div>          
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Bayar</button>
                  </div>
                  <!-- /.card-footer -->
                </form>
              <?php endif; ?>
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