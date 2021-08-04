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
          <h1 class="mt-2">Detail Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Detail Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="container">
            <div class="row">
                <div class="col">
                <div class="card mb-3" style="max-width:940px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="/assets/img/<?= $menu['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-text mb-3"><b><?= $menu['nama']; ?></b></h2>
                        <p class="card-text"><b>Harga : </b><?= $menu['harga']; ?>.</p>
                        <p class="card-text"><b>Stok : </b><?= $menu['stok']; ?>.</p>
                        <p class="card-text"><medium><b>Deskripsi : </b><?= $menu['deskripsi']; ?>.</medium></p>
                    
                        <a href="/menu/edit/<?= $menu['slug']; ?>" class="btn btn-warning">Ubah</a>
                        

                        <form action="/menu/<?= $menu['kode_menu']; ?>" method="post" class="d-inline" >
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                        </form>
                        <br><br>
                        <a href="/menu">Kembali ke daftar menu</a>
                    </div>
                    </div>
                </div>
                </div>

                </div>
            </div>
        </div>

    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
</div>
<?= $this->endSection(); ?>