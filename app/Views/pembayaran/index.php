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
                                        <?php
                                        $db = \Config\Database::connect();
                                        $query   = $db->query("SELECT 
                                            pembayaran.no_pembayaran,
                                            pemesanan.nama_pelanggan, 
                                            pemesanan.no_meja 
                                        FROM 
                                            pembayaran 
                                        INNER JOIN 
                                            pemesanan 
                                        ON 
                                            pembayaran.no_pembayaran = pemesanan.no_pemesanan
                                        AND
                                            pembayaran.tanggal = pemesanan.tanggal;");
                                        
                                        foreach ($query->getResult() as $byr) {
                                        ?>
                                            <tr>
                                                <td><?php echo $byr->no_pembayaran; ?></td>
                                                <td><?php echo $byr->nama_pelanggan; ?></td>
                                                <td><?php echo $byr->no_meja; ?></td>
                                                <td><a href="<?= site_url('../hitung_bayar/index') ?>"><button class="btn btn-primary">Bayar</button></a></td>
                                            </tr>
                                        <?php } ?>
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