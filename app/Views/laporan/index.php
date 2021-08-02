<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<<<<<<< HEAD=======<?php $db = \Config\Database::connect(); ?>>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
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
                <div class="row">
                    <div class="col justify-content-center">
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
                    <div class="col justify-content-center">
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
                    <div class="col justify-content-center">
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

                <div class="row p-2 ">
                    <div class="col p-3 ">
                        <!-- Small Box (Stat card) -->
                        <div class="row justify-content-center">
                            <div class="col p-3 d-inline-block">
                                <div class="p-2">
                                    <h3>Pembayaran</h3>
                                </div>
                                <!-- small card -->
                                <div class="small-box bg-info p-3">
                                    <div class="inner">
                                        <p class="mb-1">Total Data Pembayaran</p>
                                        <?php
                                        $query = $db->query("SELECT SUM(pembayaran.total_bayar) AS total_pembayaran FROM pembayaran;");

                                        foreach ($query->getResult() as $byr) {
                                        ?>
                                            <h3 class="row justify-content-center">Rp. <?php echo $byr->total_pembayaran; ?> ,-</h3>
                                        <?php } ?>
                                        <sub class="row justify-content-center mb-" style="font-size: 20px"></sub>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-money-bill-wave-alt"></i></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col p-3 d-inline-block">
                                <div class="p-2">
                                    <h3>Pemesanan</h3>
                                </div>
                                <!-- small card -->
                                <div class="small-box bg-success p-3">
                                    <div class="inner">
                                        <p class="mb-0">Total Pesanan</p>

                                        <?php
                                        $query = $db->query("SELECT COUNT(no_pemesanan) AS jumlah_pesanan FROM pemesanan;");

                                        foreach ($query->getResult() as $psn) {
                                        ?>
                                            <h3 class="row justify-content-center "><?php echo $psn->jumlah_pesanan; ?></h3>
                                        <?php } ?>

                                        <sub class="row justify-content-center mb-1" style="font-size: 15px">Pesanan</sub>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.row -->
                <div class="row justify-content-center">
                    <div class="col text-center">
                        <a href="">
                            <button type="button" class="btn btn-secondary "> Unduh</button>
                        </a>
                    </div>
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>

    <?= $this->endSection(); ?>