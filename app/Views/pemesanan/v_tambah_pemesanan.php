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
            <h1>Tambah Pemesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item p-1"><a href="#">Pemesanan</a></li>
              <li class="breadcrumb-item active p-1">Tambah Pemesanan</li>
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
                <h3 class="card-title">Tambah Pemesanan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" id="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal" autocomplete="off" autofocus required />
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <label for="namaPelanggan">Nama Pelanggan</label>
                        <input type="email" class="form-control" id="namaPelanggan"name="namaPelanggan" placeholder="Nama Pelanggan" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="noMeja">Nomor Meja</label>
                          <select class="form-control" id="noMeja" name="noMeja" required>
                            <option value="" selected>-- Pilih meja --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                  </form>
                </div>
            <!-- /.row -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

<?= $this->endSection(); ?>