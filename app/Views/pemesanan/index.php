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
            <h1 class="mt-4">Daftar Pemesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item p-1"><a href="#">Pemesanan</a></li>
              <li class="breadcrumb-item active p-1">Daftar Pemesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Responsive Hover Table</h3> -->

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No Pemesanan</th>
                      <th>No Menu</th>
                      <th>No Pembayaran</th>
                      <th>Kuantitas</th>
                      <th>Subtotal</th>
                      <th>Status</th>
                      <th>Ubah Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>PS01</td>
                      <td>MN01</td>
                      <td>BY01</td>
                      <td>2</td>
                      <td>Rp.26.000,-</td>
                      <td>Belum Selesai</td>
                      <td><button class="btn btn-primary">Ubah</button></td>
                    </tr>
                    <tr>
                      <td>PS01</td>
                      <td>MN01</td>
                      <td>BY01</td>
                      <td>2</td>
                      <td>Rp.26.000,-</td>
                      <td>Belum Selesai</td>
                      <td><button class="btn btn-primary">Ubah</button></td>
                    </tr>
                    <tr>
                      <td>PS01</td>
                      <td>MN01</td>
                      <td>BY01</td>
                      <td>2</td>
                      <td>Rp.26.000,-</td>
                      <td>Belum Selesai</td>
                      <td><button class="btn btn-primary">Ubah</button></td>
                    </tr>
                    <tr>
                      <td>PS01</td>
                      <td>MN01</td>
                      <td>BY01</td>
                      <td>2</td>
                      <td>Rp.26.000,-</td>
                      <td>Belum Selesai</td>
                      <td><button class="btn btn-primary">Ubah</button></td>
                    </tr>
                    <tr>
                      <td>PS01</td>
                      <td>MN01</td>
                      <td>BY01</td>
                      <td>2</td>
                      <td>Rp.26.000,-</td>
                      <td>Belum Selesai</td>
                      <td><button class="btn btn-primary">Ubah</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>