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
                        <h1 class="mt-4">Tambah Pesanan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item p-1"><a href="<?= site_url('/pemesanan') ?>">Pemesanan</a></li>
                            <li class="breadcrumb-item active p-1">Tambah Pesanan</li>
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
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <tr>
                                            <td>No Pesanan</td>
                                            <td><input type="text" name="no_pesanan" size="9" maxlength="8"></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pelanggan</td>
                                            <td><input type="text" name="nama_pelanggan" size="9" maxlength="8"></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td><input type="text" name="tanggal" size="9" maxlength="8"></td>
                                        </tr>
                                        <tr>
                                            <td>No Meja</td>
                                            <td><select name="no_meja">
                                                    <option>Pilih No Meja</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kode Menu</td>
                                            <td><select name="kode_menu">
                                                    <option>Pilih Kode Menu</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kuantitas</td>
                                            <td><input type="text" name="kuantitas" size="9" maxlength="8"></td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td><input type="text" name="subtotal" size="9" maxlength="8"></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><select name="kode_menu">
                                                    <option>Pilih Status</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NO Pembayaran</td>
                                            <td><input type="text" name="no_pembayaran" size="9" maxlength="8"></td>
                                        </tr>
                                        <tr>
                                            <td>Aksi</td>
                                            <td><a href="<?= site_url('/pemesanan') ?>"><input type="submit" name="TblTambah" value="Tambah"></a>
                                                <input type="reset" value="Ulang">
                                            </td>
                                        </tr>
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