<?php $this->load->view('layouts/menu');?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DataSopir</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Daftar Sopir</li>
            </ol>
          </div>
          <div class="d-flex justify-content-center mb-4">
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center mt-2">
                            <h5>Form Tambah Sopir</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama Sopir</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
                                <small class="text-warning"><?php echo form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="notelp">No Telphone</label>
                                <input type="text" name="notelp" id="notelp" class="form-control" value="<?php echo set_value('notelp'); ?>">
                                <small class="text-warning"><?php echo form_error('notelp'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Sopir</label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="20" rows="4"><?php echo set_value('alamat'); ?></textarea>
                                <small class="text-warning"><?php echo form_error('alamat'); ?></small>
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
