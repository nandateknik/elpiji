<div class="sticky-top">
	<nav id="shadownav" class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
		<div class="container">
			<a href="<?= site_url('/aplikasi/dashboard/') ?>" class="navbar-brand">
				<span class="text-secondary">Aplikasi</span> <span class="text-primary">Penjualan</span>
			</a>
			<ul class="navbar-nav mr-auto">
				<?php if ($this->session->userdata('role') != 2) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('/aplikasi/penjualan/') ?>"><i class="bi bi-cart4"></i> Penjualan</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('role') != 3) : ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="bi bi-folder"></i> Transaksi
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?= site_url('/transaksi/penjualan/') ?>">Penjualan</a>
							<a class="dropdown-item" href="<?= site_url('/aplikasi/pembelian/') ?>">Pembelian</a>
						</div>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('role') == 1) : ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="bi bi-gift"></i> Data
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?= site_url('/aplikasi/supplier/') ?>">Supplier</a>
							<a class="dropdown-item" href="<?= site_url('/aplikasi/barang/') ?>">Barang</a>
						</div>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('role') != 3) : ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="bi bi-cash"></i> Laporan
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?= site_url('/laporan/penjualan/') ?>">Penjualan</a>
							<a class="dropdown-item" href="<?= site_url('/laporan/penjualan/barang') ?>">Barang</a>
						</div>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('role') == 1) : ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="bi bi-wrench"></i> Pengaturan
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?= site_url('/aplikasi/user/data') ?>">User</a>
							<a class="dropdown-item" href="<?= site_url('/aplikasi/toko/') ?>">Toko</a>
						</div>
					</li>
				<?php endif; ?>
			</ul>

			<div class="d-flex justify-content-end">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="bi bi-person-fill"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?= site_url('aplikasi/user/detail') ?>"><i class="bi bi-person-square"></i> Profile</a>
							<a class="dropdown-item" onclick="logout()" href="javascript:()"><i class="bi bi-power"></i> Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>