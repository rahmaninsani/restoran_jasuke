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
          <h1 class="mt-2">Ubah Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Ubah Menu</li>
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
                <h3 class="card-title">Ubah Menu</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form action="/menu/update/<?= $menu['kode_menu']; ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <?= csrf_field(); ?>

                  <input type="hidden" name="slug" value="<?= $menu['slug']; ?>">
                  <input type="hidden" name="gambarLama" value="<?= $menu['gambar']; ?>">

                  <div class="row mb-3">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $menu['nama'] ?>">
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                      </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="harga" name="harga" value="<?= (old('harga')) ? old('harga') : $menu['harga'] ?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="stok" name="stok" value="<?= (old('stok')) ? old('stok') : $menu['stok'] ?>">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                      <div class="col-sm-3 mb-2">
                        <img src="/assets/img/<?= $menu['gambar']; ?>" class="img-thumbnail img-preview">
                      </div>
                      <div class="col-sm-15">
                        <div class="input-group mb-3">
                          <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>"  id="gambar" name="gambar" onchange="previewImg">
                          <label class="input-group-text" for="gambar">Unggah</label>
                          <div class="invalid-feedback">
                            <?= $validation->getError('gambar'); ?>
                          </div>
                        </div>
                        <h6><?= $menu['gambar']; ?></h6>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                      <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" ><?= (old('deskripsi')) ? old('deskripsi') : $menu['deskripsi'] ?></textarea>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                <a href="<?= base_url('/menu') . '/' . $menu['slug']; ?>" class="btn btn-secondary mr-2">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
</div>
<?= $this->endSection(); ?>