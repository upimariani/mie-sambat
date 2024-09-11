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
								<i class="icofont icofont-file-code bg-c-blue"></i>
								<div class="d-inline">
									<h4>Pemesanan Bahan Baku</h4>
									<span>Informasi pemesanan bahan baku kepada Supplier</span>

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
									<li class="breadcrumb-item"><a href="#!">Pemesanan</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Pemesanan Bahan Baku</a>
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
				<!-- Page body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-6">
							<!-- Basic Form Inputs card start -->
							<div class="card">
								<div class="card-header">
									<h5>Masukkan Data Bahan Baku</h5>
									<div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

									<div class="card-header-right">
										<i class="icofont icofont-spinner-alt-5"></i>
									</div>

								</div>
								<div class="card-block">
									<h4 class="sub-title">Bahan Baku</h4>
									<form action="<?= base_url('Gudang/cPemesanan/create') ?>" method="POST">

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Bahan Baku</label>
											<div class="col-sm-10">
												<select id="bahanbaku" name="nama" class="form-control">
													<option value=" ">Pilih Salah Satu Bahan Baku</option>
													<?php
													foreach ($bb as $key => $value) {
													?>
														<option data-nama="<?= $value->nama_barang ?>" data-harga="<?= $value->harga_supplier ?>" value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
													<?php
													}
													?>

												</select>
												<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<hr>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama</label>
											<div class="col-sm-10">
												<input type="text" name="namabb" class="nama form-control" placeholder="Nama Bahan Baku" readonly>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Harga</label>
											<div class="col-sm-10">
												<input type="text" name="harga" class="harga form-control" placeholder="Harga Bahan Baku" readonly>

											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Quantity</label>
											<div class="col-sm-10">
												<input type="number" name="qty" class="form-control" placeholder="Masukkan Data Quantity Pemesanan">
												<?= form_error('qty', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>

										<div class="form-group">
											<button type="submit" class="btn btn-outline-success">Simpan</button>
											<a href="<?= base_url('Gudang/cPemesanan') ?>" class="btn btn-outline-danger">Kembali</a>
										</div>
									</form>

								</div>
							</div>

						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-header">
									<h5>Keranjang Bahan Baku</h5>
									<span>Informasi Keranjang Bahan Baku yang akan dipesan</span>
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
										<form action="<?= base_url('Gudang/cPemesanan/pesan') ?>" method="POST">
											<table class="table">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama Bahan Baku</th>
														<th>Harga</th>
														<th>Quantity</th>
														<th>Sub Total</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($this->cart->contents() as $key => $value) {
													?>
														<tr>
															<th scope="row"><?= $no++ ?></th>
															<td><?= $value['name'] ?></td>
															<td>Rp. <?= number_format($value['price']) ?></td>
															<td><?= $value['qty'] ?></td>
															<td>Rp. <?= number_format($value['qty'] * $value['price'])  ?></td>
														</tr>
													<?php
													}
													?>
												</tbody>

												<tfoot>
													<th></th>
													<th>
														<select name="supplier" class="form-control" required>
															<option value=" ">Pilih Salah Satu Supplier</option>
															<?php
															$supplier = $this->db->query("SELECT * FROM `pengguna` WHERE level_pengguna='3'")->result();
															foreach ($supplier as $key => $value) {
															?>
																<option value="<?= $value->id_pengguna ?>"><?= $value->nama ?></option>
															<?php
															}
															?>
														</select>
													</th>
													<th>
														<button type="submit" class="btn btn-outline-success">Selesai</button>
													</th>
													<th>Total</th>
													<th>Rp. <?= number_format($this->cart->total()) ?></th>
												</tfoot>

											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Page body end -->
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