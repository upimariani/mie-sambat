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
									<h4>Informasi Bahan Baku</h4>

									<span>Bahan Baku yang digunakan di Mie Sambat</span><br>
									<a href="<?= base_url('Admin/cBahan Baku/create') ?>" class="btn btn-outline-success">Tambah Data Bahan Baku</a><br>
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
									<li class="breadcrumb-item"><a href="#!">Bahan Baku</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Tambah Data Bahan Baku</a>
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
									<h5>Masukkan Data Bahan Baku</h5>
									<div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

									<div class="card-header-right">
										<i class="icofont icofont-spinner-alt-5"></i>
									</div>

								</div>
								<div class="card-block">
									<h4 class="sub-title">Bahan Baku</h4>
									<?= form_open_multipart('Admin/cBahanBaku/create') ?>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Nama Kategori</label>
										<div class="col-sm-10">
											<select name="kategori" class="form-control">
												<option value=" ">Pilih Salah Satu Kategori Bahan Baku</option>
												<?php
												foreach ($kategori as $key => $value) {
												?>
													<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
												<?php
												}
												?>

											</select>
											<?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Nama Bahan Baku</label>
										<div class="col-sm-10">
											<input type="text" name="nama" class="form-control" placeholder="Masukkan Data Nama Bahan Baku">
											<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Keterangan</label>
										<div class="col-sm-10">
											<input type="text" name="keterangan" class="form-control" placeholder="Masukkan Data keterangan ">
											<?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Harga</label>
										<div class="col-sm-10">
											<input type="number" name="harga" class="form-control" placeholder="Masukkan Data Harga ">
											<?= form_error('harga', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Gambar</label>
										<div class="col-sm-10">
											<input type="file" name="gambar" class="form-control" placeholder="Masukkan Data Nama " required>

										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-outline-success">Simpan</button>
										<a href="<?= base_url('Admin/cBahanBaku') ?>" class="btn btn-outline-danger">Kembali</a>
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
