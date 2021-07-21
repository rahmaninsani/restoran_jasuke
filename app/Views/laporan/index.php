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
                        <h1 class="mt-3">Pelaporan Periodik</h1>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- /.card-header -->
            <div class="row mt-4">
                <div class="col-sm-4">
                    <!-- select -->
                    <div class="form-group">
                        <label>Jangka Pelaporan</label>
                        <select class="form-control">
                            <option>Harian</option>
                            <option>Mingguan</option>
                            <option>Bulanan</option>
                            <option>Tahunan</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
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
                <div class="col-sm-4">
                    <div class="form-group">
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

            <div class="mx-auto">
                <div class="col-mt-5">
                    <!-- Small Box (Stat card) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <p>Total Data Pembayaran</p>
                                    <h3>Rp. 30.000.000 ,-</h3>
                                    <sub style="font-size: 20px"></sub>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-bill-wave-alt"></i></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <p>Total Pesanan</p>
                                    <h3>200<sub style="font-size: 15px">Pesanan</sub></h3>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
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