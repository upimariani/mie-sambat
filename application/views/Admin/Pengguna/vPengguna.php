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
									<h4>Informasi Pengguna</h4>

									<span>Akun user admin, supplier, gudang dan pemilik</span><br>
									<a href="<?= base_url('Admin/cPengguna/create') ?>" class="btn btn-outline-success">Tambah Data Pengguna</a><br>
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
									<li class="breadcrumb-item"><a href="#!">Informasi Pengguna</a>
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
							<h5>Akun Pengguna</h5>
							<span>Informasi Pengguna Sistem Mie Sambat</span>
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
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>No Telepon</th>
											<th>Akun</th>
											<th>Level Pengguna</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($pengguna as $key => $value) {
										?>

											<tr>
												<th scope="row"><?= $no++ ?></th>
												<td><?= $value->nama ?></td>
												<td><?= $value->alamat ?></td>
												<td><?= $value->no_hp ?></td>
												<td><span class="badge badge-success"><?= $value->username ?></span> <span class="badge badge-warning"><?= $value->password ?></span></td>
												<td><?php
													if ($value->level_pengguna == '1') {
													?>
														<span class="badge badge-danger">Admin</span>
													<?php
													} else if ($value->level_pengguna == '2') {
													?>
														<span class="badge badge-warning">Gudang</span>
													<?php
													} else if ($value->level_pengguna == '3') {
													?>
														<span class="badge badge-success">Supplier</span>
													<?php
													} else {
													?>
														<span class="badge badge-info">Pemilik</span>
													<?php
													} ?>
												</td>
												<td> <a href="<?= base_url('Admin/cPengguna/update/' . $value->id_pengguna) ?>" class="btn btn-success btn-outline-success btn-icon"><i class="icofont icofont-edit"></i></a>
													<a href="<?= base_url('Admin/cPengguna/delete/' . $value->id_pengguna) ?>" class="btn btn-danger btn-outline-danger btn-icon"><i class="icofont icofont-trash"></i></a>
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
