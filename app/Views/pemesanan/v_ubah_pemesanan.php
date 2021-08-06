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
            <h1>Ubah Pemesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item p-1"><a href="#">Pemesanan</a></li>
              <li class="breadcrumb-item active p-1">Ubah Pemesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Pemesanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/pemesanan/update/<?= $pemesanan['no_pemesanan']; ?>" method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" id="tanggal" name="tanggal" class="form-control datetimepicker-input <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" data-target="#reservationdate" value="<?= $pemesanan['tanggal_pemesanan']; ?>" placeholder="Tanggal" autocomplete="off" autofocus required />
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                          <div id="tanggal" class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label for="namaPelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control <?= ($validation->hasError('namaPelanggan')) ? 'is-invalid' : ''; ?>" id="namaPelanggan"name="namaPelanggan" value="<?= $pemesanan['nama_pelanggan']; ?>" placeholder="Nama Pelanggan" autocomplete="off" required />
                        <div id="namaPelanggan" class="invalid-feedback">
                          <?= $validation->getError('namaPelanggan'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="noMeja">Meja</label>
                        <input type="hidden" name="noMejaLama" value="<?= $pemesanan['no_meja'];  ?>" /> 
                        <select class="form-control <?= ($validation->hasError('noMeja')) ? 'is-invalid' : ''; ?>" id="noMeja" name="noMeja" required>
                          <option value="<?= $pemesanan['no_meja']; ?>" selected><?= $pemesanan['no_meja']; ?></option>
                          <?php foreach($mejaKosong as $mk) : ?>
                            <option value="<?= $mk['no_meja']; ?>"><?= $mk['no_meja']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <div id="noMeja" class="invalid-feedback">
                          <?= $validation->getError('noMeja'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-md-12">
                      <table class="table">
                        <thead>
                          <tr class="text-center">
                            <!-- <th style="width: 10%">No</th> -->
                            <th style="width: 50%">Menu</th>
                            <th style="width: 30%">Kuantias</th>
                            <th style="width: 20%"></th>
                          </tr>
                        </thead>
                        <tbody id="tbody">
                          <?php foreach($detailPemesananMenu as $i => $dpm) : ?>
                            <tr class="text-center">
                              <!-- <td>1</td> -->
                              <td>
                                <input type="hidden" name="namaMenuLama[]" value="<?= $dpm['nama']; ?>" /> 
                                <input class="form-control <?= ($validation->hasError('namaMenu')) ? 'is-invalid' : ''; ?>" list="namaMenuDataList" id="namaMenu" name="namaMenu[]" placeholder="Menu Makanan" value="<?= $dpm['nama']; ?>" autocomplete="off" required />
                                <datalist id="namaMenuDataList">
                                  <?php foreach($menuTersedia as $mt) : ?>
                                    <option value="<?= $mt['nama']; ?>"><?= $mt['kode_menu']; ?></option>
                                  <?php endforeach; ?>
                                </datalist>
                                <div id="namaMenu" class="invalid-feedback text-left">
                                  <?= $validation->getError('namaMenu'); ?>
                                </div>
                              </td>
                              <td>
                                <input type="hidden" name="kuantitasLama[]" value="<?= $dpm['kuantitas']; ?>" />
                                <input type="number" min=1 class="form-control <?= ($validation->hasError('kuantitas')) ? 'is-invalid' : ''; ?>" id="kuantitas"name="kuantitas[]" value="<?= $dpm['kuantitas']; ?>" placeholder="Kuantitas" autocomplete="off" required />
                                <div id="kuantitas" class="invalid-feedback text-left">
                                  <?= $validation->getError('kuantitas'); ?>
                                </div>
                              </td>
                          <?php endforeach; ?>
                              <td>
                                <button class="btn-sm btn-success tambah-item" type="button">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="<?= base_url('/pemesanan') . '/' . $pemesanan['no_pemesanan']; ?>" class="btn btn-secondary mr-2">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <!-- /.col -->
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