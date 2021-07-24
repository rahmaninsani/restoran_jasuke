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
                        <h1 class="mt-4">Pencarian Meja</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item p-1"><a href="<?= site_url('/pemesanan') ?>">Pemesanan</a></li>
                            <li class="breadcrumb-item active p-1">Pencarian Meja</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Search Bar -->
        <form action="simple-results.html">
            <div class="input-group p-4">
                <input type="search" class="form-control form-control-lg" placeholder="Cari Meja">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No Meja</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kosong</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kosong</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kosong</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Kosong</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Kosong</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Kosong</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Terisi</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Terisi</td>
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