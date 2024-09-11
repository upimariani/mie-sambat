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
									<h4>Informasi Pengguna</h4>

									<span>Akun user admin, supplier, gudang dan pemilik</span><br>
									<a href="<?= base_url('Admin/cPengguna') ?>" class="btn btn-outline-danger">Kembali</a><br>
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
									<li class="breadcrumb-item"><a href="#!">Pengguna</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Tambah Data Pengguna</a>
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
									<h5>Masukkan Data Pengguna</h5>
									<div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

									<div class="card-header-right">
										<i class="icofont icofont-spinner-alt-5"></i>
									</div>

								</div>
								<div class="card-block">
									<h4 class="sub-title">Pengguna</h4>
									<form action="<?= base_url('Admin/cPengguna/create') ?>" method="POST">

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Pengguna</label>
											<div class="col-sm-10">
												<input type="text" name="nama" class="form-control" placeholder="Masukkan Data Nama Pengguna">
												<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Alamat</label>
											<div class="col-sm-10">
												<input type="text" name="alamat" class="form-control" placeholder="Masukkan Data Alamat">
												<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nomor Telepon</label>
											<div class="col-sm-10">
												<input type="number" name="no_hp" class="form-control" placeholder="Masukkan Data Nomor Telepon">
												<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Username</label>
											<div class="col-sm-10">
												<input type="text" name="username" class="form-control" placeholder="Masukkan Data Username">
												<?= form_error('username', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Password</label>
											<div class="col-sm-10">
												<input type="text" name="password" class="form-control" placeholder="Masukkan Data Password">
												<?= form_error('password', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Level Pengguna</label>
											<div class="col-sm-10">
												<select name="level" class="form-control">
													<option value=" ">Pilih Salah Satu Level Pengguna</option>
													<option value="1">Admin</option>
													<option value="2">Gudang</option>
													<option value="3">Supplier</option>
													<option value="4">Pemilik</option>
												</select>
												<?= form_error('level', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-outline-success">Simpan</button>
											<a href="<?= base_url('Admin/cPengguna') ?>" class="btn btn-outline-danger">Kembali</a>
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
