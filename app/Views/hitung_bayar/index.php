<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<<<<<<< HEAD
=======
<?php $db = \Config\Database::connect(); ?>

>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col text-center p-2">
                    <h2>Pembayaran</h2>
<<<<<<< HEAD
                    <p class="mt-2 mb-1">Kamis, 22 Juli 2021</p>
                    <sup>No.Pesanan : 1</sup>
=======
                    <?php
                    $query   = $db->query("SELECT 
                        pembayaran.tanggal,
                        pemesanan.no_pemesanan
                        FROM 
                            pembayaran
                        INNER JOIN
                            pemesanan
                        ON	
                            pembayaran.no_pembayaran = pemesanan.no_pemesanan
                        AND 
                            pembayaran.tanggal = pemesanan.tanggal;");
                    foreach ($query->getResult() as $header) {
                    }
                    ?>
                    <p class="mt-2 mb-1">Kamis, <?php echo $header->tanggal; ?></p>
                    <sup>No.Pesanan : <?php echo $header->no_pemesanan; ?></sup>
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
        </div>
        <!-- info row -->
        <div class="row justify-content-center invoice-info p-2">
            <div class="col-sm-5 mr-5 invoice-col">
<<<<<<< HEAD
                <h4 class=" ml-1 mt-5">No. Meja : 1</h4>
            </div>
            <div class="col-sm-5 mr-5 invoice-col">
                <h4 class=" ml-2 mt-5">NRP : KSR001</h4>
=======
                <?php
                $query   = $db->query("SELECT 
                        pemesanan.no_meja,
                        pembayaran.nrp
                        FROM 
                            pembayaran
                        INNER JOIN
                            pemesanan
                        ON	
                            pembayaran.no_pembayaran = pemesanan.no_pemesanan
                        AND 
                            pembayaran.tanggal = pemesanan.tanggal;");
                foreach ($query->getResult() as $info1) {
                }
                ?>
                <h4 class=" ml-1 mt-5">No. Meja : <?php echo $info1->no_meja; ?></h4>
            </div>
            <div class="col-sm-5 mr-5 invoice-col">
                <h4 class=" ml-2 mt-5">NRP : <?php echo $info1->nrp; ?></h4>
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kode Menu</th>
                            <th>Harga</th>
<<<<<<< HEAD
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MN01</td>
                            <td>Rp. 9.000,-</td>
                        </tr>
                        <tr>
                            <td>MN02</td>
                            <td>Rp. 9.000,-</td>
                        </tr>
                        <tr>
                            <td>MN03</td>
                            <td>Rp. 9.000,-</td>
                        </tr>
                        <tr>
                            <td>MN04</td>
                            <td>Rp. 9.000,-</td>
                        </tr>
=======
                            <th>Kuantitas</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query   = $db->query("SELECT 
                                detail_pemesanan.kode_menu,
                                menu.harga,
                                detail_pemesanan.kuantitas,
                                detail_pemesanan.subtotal
                            FROM 
                                detail_pemesanan
                            INNER JOIN
                                menu
                            ON	
                                detail_pemesanan.kode_menu = menu.kode_menu;");
                        foreach ($query->getResult() as $table) {
                        ?>
                            <tr>
                                <td><?php echo $table->kode_menu; ?></td>
                                <td>Rp. <?php echo $table->harga; ?></td>
                                <td><?php echo $table->kuantitas; ?></td>
                                <td>Rp. <?php echo $table->subtotal; ?></td>
                            </tr>
                        <?php } ?>
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
            </div>
            <!-- /.col -->
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
<<<<<<< HEAD
                        <tr>
                            <th style="width:50%">Sub Total</th>
                            <td>Rp. 36.000</td>
                        </tr>
                        <tr>
                            <th style="width:50%">Pajak (10%)</th>
                            <td>Rp. 3.600</td>
                        </tr>
                        <tr>
                            <th>Total bayar</th>
                            <td>Rp. 39.000</td>
                        </tr>
                        <tr>
                            <th>Uang Bayar</th>
                            <td>Rp. 40.000</td>
                        </tr>
                        <tr>
                            <th>Kembalian</th>
                            <td>Rp. 300</td>
=======
                        <?php
                        $query   = $db->query("SELECT 
                                *
                            FROM 
                                pembayaran
                            INNER JOIN
                                pemesanan
                            ON	
                                pembayaran.no_pembayaran = pemesanan.no_pemesanan;");
                        foreach ($query->getResult() as $purchase) {
                        }
                        ?>
                        <tr>
                            <th style="width:50%">Total Harga</th>
                            <td>Rp. <?php echo $purchase->total_harga; ?></td>
                        </tr>
                        <tr>
                            <th style="width:50%">Pajak (10%)</th>
                            <td>Rp. <?php echo $purchase->pajak; ?></td>
                        </tr>
                        <tr>
                            <th>Total bayar</th>
                            <td>Rp. <?php echo $purchase->total_bayar; ?></td>
                        </tr>
                        <tr>
                            <th>Uang Bayar</th>
                            <td>Rp. <?php echo $purchase->uang_bayar; ?></td>
                        </tr>
                        <tr>
                            <th>Kembalian</th>
                            <td>Rp. <?php echo $purchase->uang_kembalian; ?></td>
>>>>>>> 74688028d8cdc6c3eb173e99de05e7cb01607b78
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row justify-content-center mt-5">
            <div class="col text-center">
                <a href="">
                    <button type="button" class="btn btn-secondary">Cetak Struk</button>
                </a>
            </div>
        </div>
        <!-- /.content -->
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<?= $this->endSection(); ?>