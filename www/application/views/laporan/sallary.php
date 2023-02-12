<?php $this->load->view('layouts/menu');?>

<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LaporanSallary</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sallary</li>
            </ol>
          </div>
        <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <span>Cari Data Berdasar Tanggal</span>
                    <hr>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_awal">Tanggal Awal</label>
                                    <input require type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                    <input require type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="id">Agen</label>
                                    <select name="id" id="id" class="form-control">
                                            <option value="0">All Data</option>
                                        <?php foreach ($agen as $list ) :?>
                                            <option value="<?=$list->id?>"><?=$list->nama?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-1 text-align-center">
                                <button type="submit" style='margin-top: 33px;' class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div> 
        <?php if (isset($sallary)):?>
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Gain</h6>
                <a href="<?=site_url('laporan/exportsallary')?>" class="btn btn-primary">Export</a>
            </div>

            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Agen</th>
                        <th>Nama Sopir</th>
                        <th>No Polisi</th>
                        <th>Fee</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($sallary as $list):?>
                            <tr>
                                <td><?=$list->tanggal?></td>
                                <td><?=$list->agen?></td>
                                <td><?=$list->sopir?></td>
                                <td><?=$list->nopol?></td>
                                <td>Rp. <?=number_format($list->fee*560)?></td>
                            </tr>  
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
            </div>
        </div>
        <?php endif?>

    </div>
</div>

<?php $this->load->view('layouts/copyright');?>