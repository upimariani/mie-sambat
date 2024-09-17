<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<?php
				$analisis = $this->db->query("SELECT COUNT(id_analisis) as jml FROM `analisis`")->row();
				$user = $this->db->query("SELECT COUNT(id_pengguna) as jml FROM `pengguna`")->row();
				$bb_keluar = $this->db->query("SELECT COUNT(id_dbarang) as jml FROM `dbarang_keluar`")->row();
				$supplier = $this->db->query("SELECT COUNT(id_pengguna) as jml FROM `pengguna` WHERE level_pengguna='3'")->row();
				?>
				<div class="page-body">
					<div class="row">
						<!-- card1 start -->
						<div class="col-md-6 col-xl-3">
							<div class="card widget-card-1">
								<div class="card-block-small">
									<i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
									<span class="text-c-blue f-w-600">Analisis</span>
									<h4><?= $analisis->jml ?></h4>
									<div>
										<span class="f-left m-t-10 text-muted">
											<i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Metode EOQ
										</span>
									</div>
								</div>
							</div>
						</div>
						<!-- card1 end -->
						<!-- card1 start -->
						<div class="col-md-6 col-xl-3">
							<div class="card widget-card-1">
								<div class="card-block-small">
									<i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
									<span class="text-c-pink f-w-600">User</span>
									<h4><?= $user->jml ?></h4>
									<div>
										<span class="f-left m-t-10 text-muted">
											<i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>User Login
										</span>
									</div>
								</div>
							</div>
						</div>
						<!-- card1 end -->
						<!-- card1 start -->
						<div class="col-md-6 col-xl-3">
							<div class="card widget-card-1">
								<div class="card-block-small">
									<i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
									<span class="text-c-green f-w-600">Bahan Baku Keluar</span>
									<h4><?= $bb_keluar->jml ?></h4>
									<div>
										<span class="f-left m-t-10 text-muted">
											<i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Bahan Baku Keluar
										</span>
									</div>
								</div>
							</div>
						</div>
						<!-- card1 end -->
						<!-- card1 start -->
						<div class="col-md-6 col-xl-3">
							<div class="card widget-card-1">
								<div class="card-block-small">
									<i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
									<span class="text-c-yellow f-w-600">Supplier</span>
									<h4><?= $supplier->jml ?></h4>
									<div>
										<span class="f-left m-t-10 text-muted">
											<i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Supplier update
										</span>
									</div>
								</div>
							</div>
						</div>
						<!-- card1 end -->
						<!-- Statestics Start -->


						<!-- Email Sent End -->
						<!-- Data widget start -->
						<div class="col-md-12 col-xl-12">
							<div class="card project-task">
								<div class="card-header">
									<div class="card-header-left ">
										<h5>Analisis Economic Order Quantity pada Bahan Baku Mie Sambat</h5>
									</div>
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
								<div class="card-block p-b-10">
									<div class="table-responsive">
										<table class="table table-hover" id="belum_bayar">
											<thead>
												<tr>
													<th>Nama Bahan Baku</th>
													<th>EOQ</th>
													<th>ROP</th>
													<th>Stok Gudang (in)</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$bb = $this->db->query("SELECT * FROM `barang` JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE eoq_in != '0'")->result();
												foreach ($bb as $key => $value) {
												?>
													<tr>
														<td>
															<div class="task-contain">
																<h6 class="bg-c-blue d-inline-block text-center">MS</h6>
																<p class="d-inline-block m-l-20"><?= $value->nama_barang ?></p>
															</div>
														</td>
														<td><?= $value->eoq_in ?> <?= $value->keterangan ?></td>
														<td><?= $value->stok_min ?> <?= $value->keterangan ?></td>
														<td><?= $value->stok_gudang ?> <?= $value->keterangan ?> <?php if ($value->stok_gudang >= $value->stok_min) {
																													?>
																<span class="badge badge-success">Stok Aman</span>
															<?php
																													} else {
															?>
																<span class="badge badge-danger">Segera Melakukan Pemesanan kembali!</span>
															<?php
																													} ?>
														</td>
													</tr>
												<?php
												}
												?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div id="styleSelector">

			</div>
		</div>
	</div>
</div>
</div>
</div>

</div>
</div>