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
									<h4>Informasi Bahan Baku Keluar</h4>
									<span>Informasi Bahan Baku Keluar di Mie Sambat</span><br>

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
									<li class="breadcrumb-item"><a href="#!">Bahan Baku Keluar</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Informasi Bahan Baku Keluar</a>
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
					<div class="row">
						<div class="col-sm-5">
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
									<form action="<?= base_url('Gudang/cBbKeluar/create') ?>" method="POST">

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Nama Bahan Baku</label>
											<div class="col-sm-8">
												<select class="form-control" name="bb" id="bb">
													<option value=" ">Pilih Salah Satu Bahan Baku</option>
													<?php
													foreach ($bb as $key => $value) {
														if ($value->stok_gudang != '0') {

													?>
															<option value="<?= $value->id_barang ?>" data-nama="<?= $value->nama_barang ?>" data-harga="<?= $value->harga_supplier ?>" data-stok="<?= $value->stok_gudang ?>"><?= $value->nama_barang ?></option>
													<?php
														}
													}
													?>
												</select>
												<?= form_error('bb', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<hr>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Nama Bahan Baku</label>
											<div class="col-sm-8">
												<input type="text" name="nama" class="nama form-control" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Harga Bahan Baku</label>
											<div class="col-sm-8">
												<input type="text" name="harga" class="harga form-control" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Stok Tersedia di Gudang</label>
											<div class="col-sm-8">
												<input type="text" name="stok" class="stok form-control" readonly>
											</div>
										</div>
										<hr>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Quantity Keluar</label>
											<div class="col-sm-8">
												<input type="text" name="qty" class="form-control" placeholder="Masukkan Quantity Bahan Baku Keluar">
												<?= form_error('qty', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>

										<div class="form-group">
											<button type="submit" class="btn btn-outline-success">Simpan</button>
											<a href="<?= base_url('Admin/cKategori') ?>" class="btn btn-outline-danger">Kembali</a>
										</div>
									</form>

								</div>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="card">
								<div class="card-header">
									<h5>Keranjang Bahan Baku</h5>
									<span>Informasi Keranjang Bahan Baku yang sudah terpakai</span>
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
								<div class="card-block ">
									<div class="table-responsive">
										<form action="<?= base_url('Gudang/cBbKeluar/add') ?>" method="POST">
											<table class="table" id="belum_bayar">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama Bahan Baku</th>
														<th>Harga</th>
														<th>Quantity</th>
														<th>Sub Total</th>
														<th>Action</th>
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
															<td>
																<a href="<?= base_url('Gudang/cBbKeluar/delete/' . $value['rowid']) ?>" class="btn btn-danger btn-outline-danger btn-icon"><i class="icofont icofont-trash"></i></a>
															</td>
														</tr>
													<?php
													}
													?>
												</tbody>
												<?php
												if ($this->cart->contents()) {
												?>
													<tfoot>
														<th></th>
														<th>

														</th>

														<th>
															<button type="submit" class="btn btn-outline-success">Selesai</button>
														</th>
														<th>Total</th>
														<th>Rp. <?= number_format($this->cart->total()) ?></th>
														<th></th>
													</tfoot>
												<?php
												}
												?>


											</table>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
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