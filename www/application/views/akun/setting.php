<?php $this->load->view('layouts/menu');?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DataAkun</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Daftar Akun</li>
            </ol>
          </div>
          <div class="d-flex justify-content-center mb-4">
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center mt-2">
                            <h5>Form Edit Akun</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $akun->nama ?>">
                                <small class="text-warning"><?php echo form_error('nama'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input readonly type="text" name="username" id="username" class="form-control" value="<?php echo $akun->username ?>">
                                <small class="text-warning"><?php echo form_error('username'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" id="password" class="form-control" cols="20" rows="4" value="<?php echo $akun->password ?>">
                                <small class="text-warning"><?php echo form_error('password'); ?></small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
<?php $this->load->view('layouts/copyright');?>
