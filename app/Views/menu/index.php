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
          <h1 class="mt-2">Daftar Menu</h1>
            <a href="/menu/create" class="btn btn-primary mt-3">Tambah Data Menu</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Daftar Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
      <div class="row">
        <div class="col">
        <?php if (session()->getFlashdata('pesan')) : ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                  </div>
                <?php endif;  ?>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php  foreach ($menu as $m ) : ?>
                      <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $m['nama']; ?></td>
                        <td><?= $m['stok']; ?></td>
                        <td><img src="/img/<?= $m['gambar']; ?>" alt="" class="gambar"></td>
                        <td>
                            <a href="/menu/<?= $m['slug']; ?>" class="btn btn-success">Detail</a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
        </div>
      </div>
    </div>
    
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
</div>


<?= $this->endSection(); ?>