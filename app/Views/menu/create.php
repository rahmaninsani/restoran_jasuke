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
          <h2 class="my-3">Form Tambah Data Menu</h2>
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

    <div class="container">
        <div class="row">
            <div class="col-8">
    
                <form action="/menu/save" method="post" enctype="multipart/form-data" >
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="kode_menu" class="col-sm-2 col-form-label">Kode Menu</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('kode_menu')) ? 'is-invalid' : ''; ?>" id="kode_menu" name="kode_menu" autofocus value="<?= old('kode_menu'); ?>">
                        <div class="invalid-feedback">
                        <?= $validation->getError('kode_menu'); ?>    
                        </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama"  value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                        </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= old('harga'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok" name="stok" value="<?= old('stok'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-3 mb-2">
                            <img src="/assets/img/default.jpg" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-15">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>"  id="gambar" name="gambar" onchange="previewImg">
                                <label class="input-group-text" for="gambar">Upload</label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="form-label col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                        <textarea  class="form-control" id="deskripsi" name="deskripsi"><?= old('deskripsi'); ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
</div>


<?= $this->endSection(); ?>