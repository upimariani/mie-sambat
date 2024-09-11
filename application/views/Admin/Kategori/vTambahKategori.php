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
									<h4>Informasi Kategori</h4>

									<span>Kategori Bahan baku yang tersedia di Mie Sambat</span><br>
									<a href="<?= base_url('Admin/cKategori') ?>" class="btn btn-outline-danger">Kembali</a><br>
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
									<li class="breadcrumb-item"><a href="#!">Kategori</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Tambah Data Kategori</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Page-header end -->

				<!-- Page body start -->
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<!-- Basic Form Inputs card start -->
							<div class="card">
								<div class="card-header">
									<h5>Masukkan Data Kategori</h5>
									<div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

									<div class="card-header-right">
										<i class="icofont icofont-spinner-alt-5"></i>
									</div>

								</div>
								<div class="card-block">
									<h4 class="sub-title">Kategori</h4>
									<form action="<?= base_url('Admin/cKategori/create') ?>" method="POST">

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Kategori</label>
											<div class="col-sm-10">
												<input type="text" name="nama" class="form-control" placeholder="Masukkan Data Nama Kategori">
												<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
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
