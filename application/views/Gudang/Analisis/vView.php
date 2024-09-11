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
								<i class="icofont icofont-chart-pie bg-c-blue"></i>
								<div class="d-inline">
									<h4>Informasi Analisis EOQ Bahan Baku</h4>

									<span>Analisis bahan baku menggunakan metode Economic Quantity Order dan hasil Reorder Point</span><br>
									<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
										Tambah Analisis
									</button>
									<br>
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
									<li class="breadcrumb-item"><a href="#!">Analisis Bahan Baku</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Informasi Analisis Bahan Baku</a>
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
							<h5>Bahan Baku</h5>
							<span>Economic Order Quantity adalah suatu metode yang bertujuan untuk mengoptimalkan biaya<br> yang dikeluarkan perusahaan mengenai persediaan, sehingga perusahaan mampu menyeimbangkan antara biaya pemesanan dan biaya penyimpanan</span>
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
								<table class="table" id="belum_bayar">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Bahan Baku</th>
											<th>Periode/Bulan</th>
											<th>Jumlah Kebutuhan</th>
											<th>EOQ </th>
											<th>Frequensi Pemesanan</th>
											<th>ROP</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($dt_view as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?>.</th>
												<td><?= $value->nama_barang ?><span class="badge badge-warning"><?= $value->keterangan ?></span></td>
												<td><?php if ($value->periode == '1') {
														echo 'Januari';
													} else if ($value->periode == '2') {
														echo 'Februari';
													} else if ($value->periode == '3') {
														echo 'Maret';
													} else if ($value->periode == '4') {
														echo 'April';
													} else if ($value->periode == '5') {
														echo 'Mei';
													} else if ($value->periode == '6') {
														echo 'Juni';
													} else if ($value->periode == '7') {
														echo 'Juli';
													} else if ($value->periode == '8') {
														echo 'Agustus';
													} else if ($value->periode == '9') {
														echo 'September';
													} else if ($value->periode == '10') {
														echo 'Oktober';
													} else if ($value->periode == '11') {
														echo 'November';
													} else if ($value->periode == '12') {
														echo 'Desember';
													} ?> <?= $value->tahun ?></td>

												<td><?= $value->total_kebutuhan ?> <?= $value->keterangan ?></td>
												<td><?= $value->eoq ?> <?= $value->keterangan ?></td>
												<td><?= $value->frequensi ?> x</td>
												<td><?= $value->rop ?> <?= $value->keterangan ?></td>
												<td> <a href="<?= base_url('Gudang/cAnalisis/delete/' . $value->id_analisis) ?>" class="btn btn-danger btn-outline-danger btn-icon"><i class="icofont icofont-trash"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form action="<?= base_url('Gudang/cAnalisis/hitung/' . $id_barang) ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Periode Analisis<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<select id="bahanbaku" name="periode" class="form-control" required>
								<option value=" ">Pilih Salah Satu Periode Analisis</option>
								<?php
								//periode transaksi bahan baku
								$periode = $this->db->query("SELECT MONTH(tgl) as tgl, YEAR(tgl) as year FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE barang.id_barang='" . $id_barang . "' GROUP BY MONTH(tgl)")->result();
								foreach ($periode as $key => $value) {
								?>
									<option value="<?= $value->tgl ?>"><?php if ($value->tgl == '1') {
																			echo 'Januari';
																		} else if ($value->tgl == '2') {
																			echo 'Februari';
																		} else if ($value->tgl == '3') {
																			echo 'Maret';
																		} else if ($value->tgl == '4') {
																			echo 'April';
																		} else if ($value->tgl == '5') {
																			echo 'Mei';
																		} else if ($value->tgl == '6') {
																			echo 'Juni';
																		} else if ($value->tgl == '7') {
																			echo 'Juli';
																		} else if ($value->tgl == '8') {
																			echo 'Agustus';
																		} else if ($value->tgl == '9') {
																			echo 'September';
																		} else if ($value->tgl == '10') {
																			echo 'Oktober';
																		} else if ($value->tgl == '11') {
																			echo 'November';
																		} else if ($value->tgl == '12') {
																			echo 'Desember';
																		} ?> <?= $value->year ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Biaya Pemesanan per Bulan<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="number" name="biaya_pemesanan" class="form-control" placeholder="Masukkan Biaya Pemesanan" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Biaya Penyimpanan per Bulan<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="number" name="biaya_penyimpanan" class="form-control" placeholder="Masukkan Data Biaya Penyimpanan" required>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Lead Time / Waktu Menunggu Pengiriman Bahan Baku<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="number" name="lead_time" class="form-control" placeholder="Masukkan Data Quantity Pemesanan" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Hari Aktif Penjualan dalam satu bulan<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="number" name="hari_aktif" class="form-control" placeholder="Masukkan Data Quantity Pemesanan" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</form>

	</div>
</div>
