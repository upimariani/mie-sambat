<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<!-- Page-header start -->
				<div class="page-header card">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<i class="icofont icofont-layout bg-c-blue"></i>
								<div class="d-inline">
									<h4>Pemesanan Bahan Baku</h4>
									<span>Informasi pemesanan bahan baku kepada Supplier</span><br>

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
									<li class="breadcrumb-item"><a href="#!">Informasi Pemesanan Bahan Baku</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Page-header end -->

				<!-- Page-header start -->
				<div class="page-header card">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="d-inline">
								<h5>Periode Cetak Laporan</h5>

							</div>
							<?php
							$periode = $this->db->query("SELECT MONTH(tgl) as bulan, YEAR(tgl) as tahun FROM `transaksi` WHERE stat_transaksi='3' GROUP BY MONTH(tgl), YEAR(tgl)")->result();
							?>
							<hr>
							<form action="<?= base_url('Pemilik/cLaporan/pemesanan') ?>" method="POST">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Bulan</label>
									<div class="col-sm-10">
										<select class="form-control" name="bulan" required>
											<option value="">Pilih Salah Satu Bulan</option>
											<?php
											foreach ($periode as $key => $value) {
											?>
												<option value="<?= $value->bulan ?>"><?php if ($value->bulan == '1') {
																							echo 'Januari';
																						} else if ($value->bulan == '2') {
																							echo 'Februari';
																						} else if ($value->bulan == '3') {
																							echo 'Maret';
																						} else if ($value->bulan == '4') {
																							echo 'April';
																						} else if ($value->bulan == '5') {
																							echo 'Mei';
																						} else if ($value->bulan == '6') {
																							echo 'Juni';
																						} else if ($value->bulan == '7') {
																							echo 'Juli';
																						} else if ($value->bulan == '8') {
																							echo 'Agustus';
																						} else if ($value->bulan == '9') {
																							echo 'September';
																						} else if ($value->bulan == '10') {
																							echo 'Oktober';
																						} else if ($value->bulan == '11') {
																							echo 'November';
																						} else if ($value->bulan == '12') {
																							echo 'Desember';
																						} ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tahun</label>
									<div class="col-sm-10">
										<select name="tahun" class="form-control" required>
											<option value="">Pilih Salah Satu Tahun</option>
											<?php
											foreach ($periode as $key => $value) {
											?>
												<option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-success">Cetak Laporan</button>
									</div>
								</div>
							</form>
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
					<!-- Row start -->
					<div class="row">
						<!-- Multiple Open Accordion start -->
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-header-text">Pemesanan Bahan Baku</h5>
								</div>
								<div class="card-block accordion-block">
									<div id="accordion" role="tablist" aria-multiselectable="true">

										<div class="accordion-panel">
											<div class=" accordion-heading" role="tab" id="headingFour">
												<h3 class="card-title accordion-title">
													<a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
														Pesanan Selesai
													</a>
												</h3>
											</div>
											<div id="collapseFour" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingFour">
												<div class="accordion-content accordion-desc">
													<div class="table-responsive">
														<table class="table" id="selesai">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Nama Supplier</th>
																	<th>Tanggal</th>
																	<th>Total Pembayaran</th>

																</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																foreach ($pemesanan as $key => $value) {
																	if ($value->stat_transaksi == '3') {
																?>

																		<tr>
																			<th scope="row"><?= $no++ ?></th>
																			<td><?= $value->nama ?></td>
																			<td><?= $value->tgl ?></td>
																			<td>Rp. <?= number_format($value->total_bayar) ?></td>


																		</tr>
																<?php
																	}
																} ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Multiple Open Accordion ends -->
						<!-- Single Open Accordion start -->

						<!-- Single Open Accordion ends -->
					</div>
					<!-- Row end -->

				</div>

			</div>
		</div>
	</div>
</div>
</div>
</div>