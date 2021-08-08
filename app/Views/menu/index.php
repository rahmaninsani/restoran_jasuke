<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php if(session()->getFlashdata('pesan')) : ?>  
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
<?php endif; ?>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="mt-2">Daftar Menu</h1>
            <?php if(is_koki()) : ?>
              <a href="/menu/create" class="btn btn-primary mt-3">Tambah Menu</a>
            <?php endif; ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active">Daftar Menu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
		
    <section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-5">
						<form action="" method="POST">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Masukan kata kunci pencarian" aria-label="Recipient's username" aria-describedby="button-addon2" 
								name="keyword">
								<button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
							</div>
						</form>
					</div>
				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body table-responsive p-0">
								<table class="table table-hover text-nowrap">
									<thead>
										<tr class="text-center">
											<th style="width: 10%;">No</th>
											<th style="width: 10%;">Kode Menu</th>
											<th style="width: 20%;">Nama Menu</th>
											<th style="width: 15%;" class="text-right">Harga</th>
											<th style="width: 10%;">Stok</th>
											<th style="width: 20%;">Gambar</th>
											<th style="width: 15%;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1 + (3 * ($currentPage - 1)); ?>
										<?php  foreach ($menu as $m ) : ?>
											<tr class="text-center">
												<th scope="row"><?= $i++; ?></th>
												<td><?= $m['kode_menu']; ?></td>
												<td><?= $m['nama']; ?></td>
												<td class="text-right"><?= number_format($m['harga'], 2, ',', '.'); ?></td>
												<td><?= $m['stok']; ?></td>
												<td><img src="/assets/img/<?= $m['gambar']; ?>" alt="" class="gambar"></td>
												<td>
													<a href="/menu/<?= $m['slug']; ?>" class="btn btn-info">Detail</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<div class="col-6">
						<?= $pager->links('menu','menu_pagination') ?>
					</div>
				</div>
				<!-- /.row -->

			</div>
			<!-- /.container-fluid -->
		</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>


<?= $this->endSection(); ?>