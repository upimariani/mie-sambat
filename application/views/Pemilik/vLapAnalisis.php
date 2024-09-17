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
									<h4>Laporan Hasil Analisis EOQ Pada Bahan Baku Mie Sambat</h4>
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
									<li class="breadcrumb-item"><a href="#!">Laporan</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Laporan Hasil Analisis</a>
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
								<h5>Cetak Laporan</h5>

							</div>
							<?php
							$bb = $this->db->query("SELECT * FROM `analisis` JOIN barang ON barang.id_barang=analisis.id_barang GROUP BY barang.id_barang")->result();
							?>
							<hr>
							<form action="<?= base_url('Pemilik/cLaporan/lap_analisis') ?>" method="POST">

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Bahan Baku</label>
									<div class="col-sm-10">
										<select name="bb" class="form-control" required>
											<option value="">Pilih Salah Satu Bahan Baku</option>
											<?php
											foreach ($bb as $key => $value) {
											?>
												<option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
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

			</div>
		</div>
	</div>
</div>
</div>
</div>