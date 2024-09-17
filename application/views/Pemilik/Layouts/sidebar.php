<div id="pcoded" class="pcoded">
	<div class="pcoded-overlay-box"></div>
	<div class="pcoded-container navbar-wrapper">

		<nav class="navbar header-navbar pcoded-header">
			<div class="navbar-wrapper">

				<div class="navbar-logo">
					<a class="mobile-menu" id="mobile-collapse" href="#!">
						<i class="ti-menu"></i>
					</a>
					<a class="mobile-search morphsearch-search" href="#">
						<i class="ti-search"></i>
					</a>
					<a href="index.html">
						<img class="img-fluid" src="<?= base_url('asset/guruable-master/') ?>assets/images/Mie.png" alt="Theme-Logo" />
					</a>
					<a class="mobile-options">
						<i class="ti-more"></i>
					</a>
				</div>

				<div class="navbar-container container-fluid">
					<ul class="nav-left">
						<li>
							<div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
						</li>

						<li>
							<a href="#!" onclick="javascript:toggleFullScreen()">
								<i class="ti-fullscreen"></i>
							</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>
		<div class="pcoded-main-container">
			<div class="pcoded-wrapper">
				<nav class="pcoded-navbar">
					<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
					<div class="pcoded-inner-navbar main-menu">
						<div class="">
							<div class="main-menu-header">
								<img class="img-40 img-radius" src="<?= base_url('asset/guruable-master/') ?>assets/images/avatar-4.jpg" alt="User-Profile-Image">
								<div class="user-details">
									<span>John Doe</span>
									<span id="more-details">Pemilik<i class="ti-angle-down"></i></span>
								</div>
							</div>

							<div class="main-menu-content">
								<ul>
									<li class="more-details">
										<a href="<?= base_url('cLogin/logout') ?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
						<ul class="pcoded-item pcoded-left-item">
							<li>
								<a href="<?= base_url('Pemilik/cDashboard') ?>">
									<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
									<span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
									<span class="pcoded-mcaret"></span>
								</a>
							</li>

						</ul>
						<ul class="pcoded-item pcoded-left-item">
							<li>
								<a href="<?= base_url('Pemilik/cLaporan') ?>">
									<span class="pcoded-micon"><i class="ti-book"></i><b>FC</b></span>
									<span class="pcoded-mtext" data-i18n="nav.form-components.main">Laporan Pemesanan</span>
									<span class="pcoded-mcaret"></span>
								</a>
							</li>
							<li>
								<a href="<?= base_url('Pemilik/cLaporan/analisis') ?>">
									<span class="pcoded-micon"><i class="ti-book"></i><b>FC</b></span>
									<span class="pcoded-mtext" data-i18n="nav.form-components.main">Laporan Analisis</span>
									<span class="pcoded-mcaret"></span>
								</a>
							</li>

						</ul>



						</ul>
						</li>
						</ul>
					</div>
				</nav>