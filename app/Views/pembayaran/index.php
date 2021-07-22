<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Search Bar -->
    <h2 class="text-center display-4 p-3">Pembayaran</h2>
    <form action="simple-results.html">
        <div class="input-group p-4">
            <input type="search" class="form-control form-control-lg" placeholder="Ketikkan Nomor Pembayaran disini">
            <div class="input-group-append">
                <button type="submit" class="btn btn-lg btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No Pembayaran</th>
                                            <th>Nama</th>
                                            <th>No Meja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Ujang</td>
                                            <td>1</td>
                                            <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Kusnandar</td>
                                            <td>2</td>
                                            <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Dedi</td>
                                            <td>3</td>
                                            <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Entis</td>
                                            <td>4</td>
                                            <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Agus</td>
                                            <td>5</td>
                                            <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Tatang</td>
                                            <td>6</td>
                                            <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Angga</td>
                                            <td>7</td>
                                            <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
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