<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">

				<div class="page-body">
					<div class="row">



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