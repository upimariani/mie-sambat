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
									<a href="<?= base_url('Gudang/cPemesanan/create') ?>" class="btn btn-outline-success">Tambah Pemesanan Bahan Baku</a><br>
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
										<!-- <div class="accordion-panel">
											<div class="accordion-heading" role="tab" id="headingOne">
												<h3 class="card-title accordion-title">
													<a class="accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														Belum Bayar
													</a>
												</h3>
											</div>
											<div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
												<div class="accordion-content accordion-desc">
													<div class="table-responsive">
														<table class="table" id="belum_bayar">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Nama Supplier</th>
																	<th>Tanggal</th>
																	<th>Total Pembayaran</th>
																	<th>Status Pemesanan</th>
																	<th>Pemesanan Bahan Baku</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																foreach ($pemesanan as $key => $value) {
																	if ($value->stat_transaksi == '0') {
																?>

																		<tr>
																			<th scope="row"><?= $no++ ?></th>
																			<td><?= $value->nama ?></td>
																			<td><?= $value->tgl ?></td>
																			<td>Rp. <?= number_format($value->total_bayar) ?></td>
																			<td><?php
																				if ($value->stat_transaksi == '0') {
																				?>
																					<span class="badge badge-danger">Belum Bayar</span>
																				<?php
																				} else if ($value->stat_transaksi == '1') {
																				?>
																					<span class="badge badge-warning">Menunggu Konfirmasi</span>
																				<?php
																				} else if ($value->stat_transaksi == '2') {
																				?>
																					<span class="badge badge-info">Pesanan Dikirim</span>
																				<?php
																				} else if ($value->stat_transaksi == '3') {
																				?>
																					<span class="badge badge-success">Selesai</span>
																				<?php
																				}
																				?>
																			</td>
																			<?php
																			$dt_barang = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE transaksi.id_transaksi='" . $value->id_transaksi . "'")->result();
																			?>
																			<td><?php foreach ($dt_barang as $key => $value) {
																					echo $value->nama_barang . ' | Qty.' . $value->qty . '<br>';
																				} ?></td>
																			<td>
																				<?= form_open_multipart('Gudang/cPemesanan/bayar/' . $value->id_transaksi) ?>
																				<input type="file" class="form-control" name="bayar">
																				<button type="submit" class="btn btn-outline-success btn-sm">Bayar</button>
																				</form>
																			</td>
																		</tr>
																<?php
																	}
																} ?>
															</tbody>
														</table>
													</div>

												</div>
											</div>
										</div> -->
										<div class="accordion-panel">
											<div class="accordion-heading" role="tab" id="headingTwo">
												<h3 class="card-title accordion-title">
													<a class="btn btn-warning accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														Menunggu Konfirmasi
													</a>
												</h3>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												<div class="accordion-content accordion-desc">
													<div class="table-responsive">
														<table class="table" id="konfirmasi">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Nama Supplier</th>
																	<th>Tanggal</th>
																	<th>Total Pembayaran</th>
																	<th>Status Pemesanan</th>
																	<!-- <th>Bukti Pembayaran</th> -->
																	<th>Pemesanan Bahan Baku</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																foreach ($pemesanan as $key => $value) {
																	if ($value->stat_transaksi == '1') {
																?>

																		<tr>
																			<th scope="row"><?= $no++ ?></th>
																			<td><?= $value->nama ?></td>
																			<td><?= $value->tgl ?></td>
																			<td>Rp. <?= number_format($value->total_bayar) ?></td>
																			<td><?php
																				if ($value->stat_transaksi == '0') {
																				?>
																					<span class="badge badge-danger">Belum Bayar</span>
																				<?php
																				} else if ($value->stat_transaksi == '1') {
																				?>
																					<span class="badge badge-warning">Menunggu Konfirmasi</span>
																				<?php
																				} else if ($value->stat_transaksi == '2') {
																				?>
																					<span class="badge badge-info">Pesanan Dikirim</span>
																				<?php
																				} else if ($value->stat_transaksi == '3') {
																				?>
																					<span class="badge badge-success">Selesai</span>
																				<?php
																				}
																				?>
																			</td>
																			<!-- <td><a href="<?= base_url('asset/bayar/' . $value->bukti_bayar) ?>">Bukti Pembayaran</a></td> -->

																			<?php
																			$dt_barang = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE transaksi.id_transaksi='" . $value->id_transaksi . "'")->result();
																			?>
																			<td><?php foreach ($dt_barang as $key => $value) {
																					echo $value->nama_barang . ' | Qty.' . $value->qty . '<br>';
																				} ?></td>

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
										<div class="accordion-panel">
											<div class=" accordion-heading" role="tab" id="headingThree">
												<h3 class="card-title accordion-title">
													<a class="btn btn-info accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
														Pesanan Dikirim
													</a>
												</h3>
											</div>
											<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
												<div class="accordion-content accordion-desc">
													<div class="table-responsive">
														<table class="table table-striped" id="belum_bayar">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Nama Supplier</th>
																	<th>Tanggal</th>
																	<th>Total Pembayaran</th>
																	<th>Status Pemesanan</th>
																	<!-- <th>Bukti Pembayaran</th> -->
																	<th>Bahan Baku</th>
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$no = 1;
																foreach ($pemesanan as $key => $value) {
																	if ($value->stat_transaksi == '2') {
																?>

																		<tr>
																			<th scope="row"><?= $no++ ?></th>
																			<td><?= $value->nama ?></td>
																			<td><?= $value->tgl ?></td>
																			<td>Rp. <?= number_format($value->total_bayar) ?></td>
																			<td><?php
																				if ($value->stat_transaksi == '0') {
																				?>
																					<span class="badge badge-danger">Belum Bayar</span>
																				<?php
																				} else if ($value->stat_transaksi == '1') {
																				?>
																					<span class="badge badge-warning">Menunggu Konfirmasi</span>
																				<?php
																				} else if ($value->stat_transaksi == '2') {
																				?>
																					<span class="badge badge-info">Pesanan Dikirim</span>
																				<?php
																				} else if ($value->stat_transaksi == '3') {
																				?>
																					<span class="badge badge-success">Selesai</span>
																				<?php
																				}
																				?>
																			</td>
																			<!-- <td><a href="<?= base_url('asset/bayar/' . $value->bukti_bayar) ?>">Bukti Pembayaran</a></td> -->

																			<?php
																			$dt_barang = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE transaksi.id_transaksi='" . $value->id_transaksi . "'")->result();
																			?>
																			<td><?php foreach ($dt_barang as $key => $value) {
																					echo $value->nama_barang . ' | Qty.' . $value->qty . '<br>';
																				} ?></td>
																			<td>
																				<?= form_open_multipart('Gudang/cPemesanan/diterima/' . $value->id_transaksi) ?>
																				<input type="file" class="form-control" name="bayar">
																				<button type="submit" class="btn btn-outline-success btn-sm">Bayar</button>
																				</form>
																			</td>

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
										<div class="accordion-panel">
											<div class=" accordion-heading" role="tab" id="headingFour">
												<h3 class="card-title accordion-title">
													<a class="btn btn-success accordion-msg" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
														Pesanan Selesai
													</a>
												</h3>
											</div>
											<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
												<div class="accordion-content accordion-desc">
													<div class="table-responsive">
														<table class="table" id="selesai">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Nama Supplier</th>
																	<th>Tanggal</th>
																	<th>Total Pembayaran</th>
																	<th>Status Pemesanan</th>
																	<th>Bukti Pembayaran</th>
																	<th>Pemesanan Bahan Baku</th>
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
																			<td><?php
																				if ($value->stat_transaksi == '0') {
																				?>
																					<span class="badge badge-danger">Belum Bayar</span>
																				<?php
																				} else if ($value->stat_transaksi == '1') {
																				?>
																					<span class="badge badge-warning">Menunggu Konfirmasi</span>
																				<?php
																				} else if ($value->stat_transaksi == '2') {
																				?>
																					<span class="badge badge-info">Pesanan Dikirim</span>
																				<?php
																				} else if ($value->stat_transaksi == '3') {
																				?>
																					<span class="badge badge-success">Selesai</span>
																				<?php
																				}
																				?>
																			</td>
																			<td><a href="<?= base_url('asset/bayar/' . $value->bukti_bayar) ?>">Bukti Pembayaran</a></td>

																			<?php
																			$dt_barang = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE transaksi.id_transaksi='" . $value->id_transaksi . "'")->result();
																			?>
																			<td><?php foreach ($dt_barang as $key => $value) {
																					echo $value->nama_barang . ' | Qty.' . $value->qty . '<br>';
																				} ?></td>

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
