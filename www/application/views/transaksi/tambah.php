<?php $this->load->view('layouts/menu');?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DataTransaksi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Daftar Transaksi</li>
            </ol>
          </div>
          <div class="d-flex justify-content-center mb-4">
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center mt-2">
                            <h5>Form Tambah Transaksi</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="no_lo">No Lo</label>
                                        <input type="text" name="no_lo" id="no_lo" class="form-control" value="<?php echo set_value('no_lo'); ?>">
                                        <small class="text-warning"><?php echo form_error('no_lo'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="nopol">No Polisi</label>
                                        <input type="text" name="nopol" id="nopol" class="form-control" value="<?php echo set_value('nopol'); ?>">
                                        <small class="text-warning"><?php echo form_error('nopol'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo set_value('tanggal'); ?>">
                                <small class="text-warning"><?php echo form_error('tanggal'); ?></small>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                    <label for="id_agen">Agen</label>
                                    <select name="id_agen" id="id_agen" class='form-control'>
                                        <?php foreach($agen as $list2):?>
                                            <option value="<?=$list2->id?>"><?=$list2->nama;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <small class="text-warning"><?php echo form_error('id_agen'); ?></small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">          
                                    <div class="form-group">
                                        <label for="id_sopir">Sopir</label>
                                        <select name="id_sopir" id="id_sopir" class='form-control'>
                                            <?php foreach($sopir as $list):?>
                                                <option value="<?=$list->id?>"><?=$list->nama;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <small class="text-warning"><?php echo form_error('id_sopir'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fee">Fee Pengiriman</label>
                                <input type="number" name="fee" id="fee" class="form-control" value="<?php echo set_value('fee'); ?>">
                                <small class="text-warning"><?php echo form_error('fee'); ?></small>
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
