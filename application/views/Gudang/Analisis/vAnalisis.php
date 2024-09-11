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
							<span>Informasi Analisis Bahan Baku di Mie Sambat</span>
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
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($bahan_baku as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?>.</th>
												<td>
													<?= $value->nama_barang ?><span class="badge badge-warning"><?= $value->keterangan ?></span></td>
												<td> <a href="<?= base_url('Gudang/cAnalisis/view/' . $value->id_barang) ?>" class="btn btn-success btn-outline-success btn-icon"><i class="icofont icofont-eye"></i></a>
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
