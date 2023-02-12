<?php
	$this->load->view('layouts/head');
?>
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('assets/')?>index.html">
        <div class="sidebar-brand-icon">
          <img src="<?=base_url('assets/')?>img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">ELPIJI</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item <?=$this->uri->segment(1) == ''? 'active' : '';?>">
        <a class="nav-link" href="<?=base_url('')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Data Transaksi
      </div>
      <li class="nav-item <?=$this->uri->segment(1) == 'neraca'? 'active' : '';?>">
        <a class="nav-link <?=$this->uri->segment(1) == 'neraca'? '' : 'collapsed';?>" href="<?=base_url('assets/')?>#" data-toggle="collapse" data-target="#collapsePage00" aria-expanded="true"
          aria-controls="collapsePage00">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Neraca</span>
        </a>
        <div id="collapsePage00" class="collapse <?=$this->uri->segment(1) == 'neraca'? 'show' : '';?>" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Neraca</h6>
            <a class="collapse-item <?=$this->uri->segment(1) == 'neraca' && $this->uri->segment(2) == ''? 'active' : '';?>" href="<?=site_url('neraca')?>">Daftar Neraca</a>
            <a class="collapse-item <?=$this->uri->segment(1) == 'neraca' && $this->uri->segment(2) == 'tambah'? 'active' : '';?>" href="<?=site_url('neraca/tambah')?>">Tambah Neraca</a>
          </div>
        </div>
      </li>
      <li class="nav-item <?=$this->uri->segment(1) == 'transaksi'? 'active' : '';?>">
        <a class="nav-link <?=$this->uri->segment(1) == 'transaksi'? '' : 'collapsed';?>" href="<?=base_url('assets/')?>#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapsePage" class="collapse <?=$this->uri->segment(1) == 'transaksi'? 'show' : '';?>" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Transaksi</h6>
            <a class="collapse-item <?=$this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == ''? 'active' : '';?>" href="<?=site_url('transaksi')?>">Daftar Transaksi</a>
            <a class="collapse-item <?=$this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'tambah'? 'active' : '';?>" href="<?=site_url('transaksi/tambah')?>">Tambah Transaksi</a>
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu Data
      </div>
      <li class="nav-item <?=$this->uri->segment(1) == 'agen'? 'active' : '';?>">
        <a class="nav-link <?=$this->uri->segment(1) == 'agen'? '' : 'collapsed';?> " href="<?=base_url('assets/')?>#" data-toggle="collapse" data-target="#collapsePage2" aria-expanded="true"
          aria-controls="collapsePage2">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Agen</span>
        </a>
        <div id="collapsePage2" class="collapse <?=$this->uri->segment(1) == 'agen'? 'show' : '';?>" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Agen</h6>
            <a class="collapse-item <?=$this->uri->segment(1) == 'agen' && $this->uri->segment(2) == ''? 'active' : '';?>" href="<?=site_url('agen')?>">Daftar agen</a>
            <a class="collapse-item <?=$this->uri->segment(1) == 'agen' && $this->uri->segment(2) == 'tambah'? 'active' : '';?>" href="<?=site_url('agen/tambah')?>">Tambah agen</a>
          </div>
        </div>
      </li>
      <li class="nav-item <?=$this->uri->segment(1) == 'sopir'? 'active' : '';?>">
        <a class="nav-link <?=$this->uri->segment(1) == 'sopir'? '' : 'collapsed';?> " href="<?=base_url('assets/')?>#" data-toggle="collapse" data-target="#collapsePage3" aria-expanded="true"
          aria-controls="collapsePage3">
          <i class="fa fa-fw fa-car"></i>
          <span>Sopir</span>
        </a>
        <div id="collapsePage3" class="collapse <?=$this->uri->segment(1) == 'sopir'? 'show' : '';?>" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Sopir</h6>
            <a class="collapse-item <?=$this->uri->segment(1) == 'sopir' && $this->uri->segment(2) == ''? 'active' : '';?>" href="<?=site_url('sopir')?>">Daftar sopir</a>
            <a class="collapse-item <?=$this->uri->segment(1) == 'sopir' && $this->uri->segment(2) == 'tambah'? 'active' : '';?>" href="<?=site_url('sopir/tambah')?>">Tambah Sopir</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Laporan Transaksi
      </div>
      <li class="nav-item <?=$this->uri->segment(1) == 'laporan'? 'active' : '';?>">
        <a class="nav-link <?=$this->uri->segment(1) == 'laporan'? '' : 'collapsed';?> " href="<?=base_url('assets/')?>#" data-toggle="collapse" data-target="#collapsePage30" aria-expanded="true"
          aria-controls="collapsePage30">
          <i class="fa fa-fw fa-book"></i>
          <span>Export</span>
        </a>
        <div id="collapsePage30" class="collapse <?=$this->uri->segment(1) == 'laporan'? 'show' : '';?>" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu Laporan</h6>
            <a class="collapse-item <?=$this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'gain'? 'active' : '';?>" href="<?=site_url('laporan/gain')?>">Laporan Gain</a>
            <a class="collapse-item <?=$this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'sallary'? 'active' : '';?>" href="<?=site_url('laporan/sallary')?>">Laporan Sallary</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="<?=base_url('assets/')?>#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?=base_url('assets/')?>img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?=$_SESSION['nama']?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=site_url('akun/setting')?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->