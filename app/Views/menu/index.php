<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<<<<<<< HEAD
=======

>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<<<<<<< HEAD
          <h1 class="mt-2">Daftar Menu</h1>
            <a href="/menu/create" class="btn btn-primary mt-3">Tambah Data Menu</a>
=======
            <a href="#" class="btn btn-success">Tambah Menu</a>
            <h1 class="mt-4">Daftar Menu</h1>
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
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

<<<<<<< HEAD
    <div class="container">
      <div class="row">
        <div class="col-6">
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan keyword pencarian" aria-label="Recipient's username" aria-describedby="button-addon2" 
            name="keyword">
            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
          </div>
        </form>
        </div>
      </div>
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
                      <?php $i = 1 + (3 * ($currentPage - 1)); ?>
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

                  <?= $pager->links('menu','menu_pagination') ?>
        </div>
      </div>
    </div>
    
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
</div>


=======
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <p class="text-white">Rp13000</p>
                    <p class="text-white">12 porsi</p>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary">Ubah</button>
                  <button class="btn btn-danger">Hapus</button>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <p class="text-white">Rp13000</p>
                    <p class="text-white">12 porsi</p>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary">Ubah</button>
                  <button class="btn btn-danger">Hapus</button>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <p class="text-white">Rp13000</p>
                    <p class="text-white">12 porsi</p>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary">Ubah</button>
                  <button class="btn btn-danger">Hapus</button>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <p class="text-white">Rp13000</p>
                    <p class="text-white">12 porsi</p>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary">Ubah</button>
                  <button class="btn btn-danger">Hapus</button>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <p class="text-white">Rp13000</p>
                    <p class="text-white">12 porsi</p>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary">Ubah</button>
                  <button class="btn btn-danger">Hapus</button>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="/assets/img/telur-dadar.jpg" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white"><b>Nasi Goreng</b></h5>
                    <!-- <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor.</p> -->
                    <p class="text-white">Rp13000</p>
                    <p class="text-white">12 porsi</p>
                  </div>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary">Ubah</button>
                  <button class="btn btn-danger">Hapus</button>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
<?= $this->endSection(); ?>