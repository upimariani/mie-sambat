<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<!-- Main-body start -->
		<div class="main-body">
			<div class="page-wrapper">
				<!-- Page-header start -->
				<div class="page-header card">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<i class="icofont icofont-table bg-c-blue"></i>
								<div class="d-inline">
									<h4>Informasi Bahan Baku</h4>

									<span>Bahan Baku yang digunakan di Mie Sambat</span><br>
									<a href="<?= base_url('Admin/cBahanBaku/create') ?>" class="btn btn-outline-success">Tambah Data Bahan Baku</a><br>
								</div>

							</div>

						</div>

						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="index.html">
											<i class="icofont icofont-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Bahan Baku</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Informasi Bahan Baku</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
				<!-- Page-header end -->
				<?php


				if ($this->session->userdata('success') != '') {
				?>
					<div class="alert alert-success" role="alert">
						<?= $this->session->userdata('success') ?>
					</div>
				<?php
				}
				?>
				<!-- Page-body start -->
				<div class="page-body">
					<!-- Basic table card start -->
					<div class="card">
						<div class="card-header">
							<h5>Bahan Baku Bahan Baku</h5>
							<span>Informasi Bahan Baku di Mie Sambat</span>
							<div class="card-header-right">
								<ul class="list-unstyled card-option">
									<li><i class="icofont icofont-simple-left "></i></li>
									<li><i class="icofont icofont-maximize full-card"></i></li>
									<li><i class="icofont icofont-minus minimize-card"></i></li>
									<li><i class="icofont icofont-refresh reload-card"></i></li>
									<li><i class="icofont icofont-error close-card"></i></li>
								</ul>
							</div>
						</div>
						<div class="card-block table-border-style">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Bahan Baku</th>
											<th>Harga Supplier</th>
											<th>Stok Minimal</th>
											<th>EOQ</th>
											<th>Stok Gudang</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($bahanbaku as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?></th>
												<td><img style="width: 70px; " src="<?= base_url('asset/gambar/' . $value->gambar) ?>"><br>
													<?= $value->nama_barang ?><span class="badge badge-warning"><?= $value->keterangan ?></span></td>
												<td>Rp. <?= number_format($value->harga_supplier)  ?></td>
												<td><?= $value->stok_min ?></td>
												<td><?= $value->eoq_in ?></td>
												<td><?= $value->stok_gudang ?></td>

												<td> <a href="<?= base_url('Admin/cBahanBaku/update/' . $value->id_barang) ?>" class="btn btn-success btn-outline-success btn-icon"><i class="icofont icofont-edit"></i></a>
													<a href="<?= base_url('Admin/cBahanBaku/delete/' . $value->id_barang) ?>" class="btn btn-danger btn-outline-danger btn-icon"><i class="icofont icofont-trash"></i></a>
												</td>
											</tr>
										<?php
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- Background Utilities table end -->
				</div>
				<!-- Page-body end -->
			</div>
		</div>
		<!-- Main-body end -->

		<div id="styleSelector">

		</div>
	</div>
</div>
</div>
</div>
</div>
</div>