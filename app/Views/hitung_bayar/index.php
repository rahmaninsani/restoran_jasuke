<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col text-center p-2">
                    <h2>Pembayaran</h2>
                    <p class="mt-2 mb-1">Kamis, 22 Juli 2021</p>
                    <sup>No.Pesanan : 1</sup>
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
                <h4 class=" ml-1 mt-5">No. Meja : 1</h4>
            </div>
            <div class="col-sm-5 mr-5 invoice-col">
                <h4 class=" ml-2 mt-5">NRP : KSR001</h4>
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