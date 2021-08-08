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
            <h1>Tambah Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Tambah Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Menu</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="/menu/save" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <?= csrf_field(); ?>
                  
                  <div class="row mb-3">
                      <label for="kode_menu" class="col-sm-2 col-form-label">Kode Menu</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control <?= ($validation->hasError('kode_menu')) ? 'is-invalid' : ''; ?>" id="kode_menu" name="kode_menu" value="<?= old('kode_menu'); ?>" autofocus autocomplete="off" required />
                      <div class="invalid-feedback">
                      <?= $validation->getError('kode_menu'); ?>    
                      </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>" autocomplete="off" required />
                      <div class="invalid-feedback">
                      <?= $validation->getError('nama'); ?>
                      </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                      <input type="number" min="1" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>" autocomplete="off" required />
                      </div>
                  </div>
                  <div class="row mb-3">
                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                      <input type="number" min=1 class="form-control" id="stok" name="stok" value="<?= old('stok'); ?>" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-3 mb-2">
                      <img src="/assets/img/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-15">
                      <div class="input-group mb-3">
                        <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>"  id="gambar" name="gambar" onchange="previewImg" />
                        <label class="input-group-text" for="gambar">Unggah</label>
                        <div class="invalid-feedback">
                          <?= $validation->getError('gambar'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                      <label for="deskripsi" class="form-label col-sm-2 col-form-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= old('deskripsi'); ?></textarea>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="<?= base_url('/menu'); ?>" class="btn btn-secondary mr-2">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
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