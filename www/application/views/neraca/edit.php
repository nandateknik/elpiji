<?php $this->load->view('layouts/menu');?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DataTrangki</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Daftar Tangki</li>
            </ol>
          </div>
          <div class="d-flex justify-content-center mb-4">
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center mt-2">
                            <h5>Form Ubah Neraca</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" readonly name="tanggal" id="tanggal" class="form-control" value="<?=$neraca['tanggal']; ?>">
                                <small class="text-warning"><?php echo form_error('tanggal'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="tangki_awal">Tangki Awal</label>
                                <input type="number" name="tangki_awal" id="tangki_awal" class="form-control" value="<?=$neraca['tangki_awal']; ?>">
                                <small class="text-warning"><?php echo form_error('tangki_awal'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="tangki_isi">Tangki Isi Ulang</label>
                                <input type="number" name="tangki_isi" id="tangki_isi" class="form-control" value="<?=$neraca['tangki_isi']; ?>">
                                <small class="text-warning"><?php echo form_error('tangki_isi'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="tangki_akhir">Tangki Akhir</label>
                                <input type="number" name="tangki_akhir" id="tangki_akhir" class="form-control" value="<?=$neraca['tangki_akhir']; ?>">
                                <small class="text-warning"><?php echo form_error('tangki_akhir'); ?></small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
<?php $this->load->view('layouts/copyright');?>
