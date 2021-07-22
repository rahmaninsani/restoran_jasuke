<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid p-2 ml-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="mt-3 mb-1 p-2">Pelaporan Periodik</h1>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- /.card-header -->
            <div class="row p-1 mb-0">
                <div class="col p-3">
                    <!-- select -->
                    <div class="form-group p-3">
                        <label>Jangka Pelaporan</label>
                        <select class="form-control">
                            <option>Harian</option>
                            <option>Mingguan</option>
                            <option>Bulanan</option>
                            <option>Tahunan</option>
                        </select>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="form-group p-3">
                        <label>Dari</label>
                        <select class="form-control">
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>....</option>
                        </select>
                    </div>
                </div>
                <div class="col p-3">
                    <div class="form-group p-3">
                        <label>Ke</label>
                        <select class="form-control">
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>....</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row p-2">
                <div class="col p-3">
                    <!-- Small Box (Stat card) -->
                    <div class="row p-4">
                        <div class="col-lg-3 col-6 p-3 d-inline-block">
                            <!-- small card -->
                            <div class="small-box bg-info p-3">
                                <div class="inner p-1">
                                    <p>Total Data Pembayaran</p>
                                    <h3>Rp. 30.000.000 ,-</h3>
                                    <sub style="font-size: 20px"></sub>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill-wave-alt p-1"></i></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6 p-3 d-inline-block">
                            <!-- small card -->
                            <div class="small-box bg-success p-3">
                                <div class="inner p-1">
                                    <p>Total Pesanan</p>
                                    <h3>200<sub style="font-size: 15px">Pesanan</sub></h3>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart p-1"></i>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</div>

<?= $this->endSection(); ?>