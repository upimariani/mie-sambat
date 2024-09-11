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
									<a href="<?= base_url('Gudang/cBbKeluar/create') ?>" class="btn btn-outline-success">Tambah Data Bahan Baku Keluar</a><br>
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
					<!-- Basic table card start -->
					<div class="card">
						<div class="card-header">
							<h5>Bahan Baku Keluar</h5>
							<span>Informasi Bahan Baku Keluar di Mie Sambat</span>
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
											<th>Tanggal Keluar</th>
											<th>Total Pengeluaran</th>
											<th>Bahan Baku Keluar</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($bb_keluar as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?>.</th>
												<td><?= $value->tgl_keluar ?></td>
												<td>Rp. <?= number_format($value->total_bayar)  ?></td>
												<td><?php $dt_bb = $this->db->query("SELECT * FROM `barang_keluar` JOIN dbarang_keluar ON barang_keluar.id_bkeluar=dbarang_keluar.id_bkeluar JOIN barang ON barang.id_barang=dbarang_keluar.id_barang WHERE barang_keluar.id_bkeluar='" . $value->id_bkeluar . "'")->result();
													foreach ($dt_bb as $key => $value) {
														echo $value->nama_barang . ' Qty.' . $value->jumlah . ', ';
													} ?>
												</td>
												<td>
													<a href="<?= base_url('Gudang/cBbKeluar/hapus/' . $value->id_bkeluar) ?>" class="btn btn-danger btn-outline-danger btn-icon"><i class="icofont icofont-trash"></i></a>
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
