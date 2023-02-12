<?php $this->load->view('layouts/menu');?>

<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LaporanGain</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gain</li>
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
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="tanggal_awal">Tanggal Awal</label>
                                    <input require type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                    <input require type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-2 text-align-center">
                                <button type="submit" style='margin-top: 33px;' class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div> 
        <?php if (isset($gain)):?>
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Gain</h6>
                <a href="<?=site_url('laporan/exportgain')?>" class="btn btn-primary">Export</a>
            </div>

            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Tangki Awal</th>
                        <th>Isi Tangki</th>
                        <th>Tangki Lo</th>
                        <th>Tangki Akhir</th>
                        <th>Isi Akhir</th>
                        <th>Gain</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                            $tangkiAwal = 0;
                            $tangkiIsi = 0;
                            $tangkiLo = 0;
                            $tangkiAkhir = 0;
                            $isiAkhir = 0;
                            $tangkiGain = 0;
                        ?>
                        <?php foreach($gain as $list):?>
                            <tr>
                                <td><?=$list->tanggal?></td>
                                <td><?=number_format($list->tangki_awal)?></td>
                                <td><?=number_format($list->tangki_isi)?></td>
                                <td><?=number_format($list->tangki_lo)?></td>
                                <td><?=number_format($list->tangki_akhir)?></td>
                                <td><?=number_format($list->isi_akhir)?></td>
                                <td><?=number_format($list->gain)?></td>
                            </tr>
                            <?php
                                $tangkiAwal += $list->tangki_awal;
                                $tangkiIsi += $list->tangki_isi;
                                $tangkiLo += $list->tangki_lo;
                                $tangkiAkhir += $list->tangki_akhir;
                                $isiAkhir += $list->isi_akhir;
                                $tangkiGain += $list->gain;
                            ?>  
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th><?=number_format($tangkiAwal)?></th>
                            <th><?=number_format($tangkiIsi)?></th>
                            <th><?=number_format($tangkiLo)?></th>
                            <th><?=number_format($tangkiAkhir)?></th>
                            <th><?=number_format($isiAkhir)?></th>
                            <th><?=number_format($tangkiGain)?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="card-footer"></div>
            </div>
        </div>
        <?php endif?>

    </div>
</div>

<?php $this->load->view('layouts/copyright');?>