<?php
$this->load->view('template/header');
$this->load->view('template/navbar'); ?>

<div class="container-fluid p-3">

    <div class="card mb-5 d-print-none">
        <div class="card-body">
            <div class="text-center mb-3">
                <h3>LAPORAN PENJUALAN</h3>
            </div>
            <center>
                <form method="post">
                    <div class="row col-8">
                        <div class="col-5">
                            <div class="form-group">
                                <input type="date" name="start" id="start" class="form-control" placeholder="Start Date" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <input type="date" name="end" id="end" class="form-control" placeholder="End Date" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </div>

    <?php if (!empty($penjualan)) : ?>
        <div class="card p-3">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a class="d-print-none" href="<?= site_url('laporan/penjualan/cetak') ?>"><i class="bi bi-file-earmark-arrow-down-fill"></i> EXPORT PDF</a>
                </div>
                <div class="d-print-block d-none">
                    <div class="text-center">
                        <h3>LAPORAN PENDAPATAN PENJUALAN</h3>
                        <h3><i class="bi bi-bag"></i> TOKO SINDA BANYUWANGI</h3>
                        <p>JL. Yos Sudarso, NO 72, Klatak, Banyuwangi. Telp: 082331201148</p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-center" id="dataTable">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pendapatan</th>
                                <th scope="col">Keuntungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penjualan as $data) : ?>
                                <tr>
                                    <td class="text-center"><?= $data->tanggal; ?></td>
                                    <td>Rp. <?= number_format($data->total); ?></td>
                                    <td>Rp. <?= number_format($data->keuntungan); ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <?php
                            $sum = 0;
                            $sum2 = 0;
                            foreach ($penjualan as $key => $value) {
                                if (isset($value->total)) {
                                    $sum += $value->total;
                                    $sum2 += $value->keuntungan;
                                }
                            };
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">Total</th>
                                <th>Rp. <?= number_format($sum) ?></th>
                                <th>Rp. <?= number_format($sum2) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    <?php endif; ?>
</div>

<div class="d-print-none">
    <?php $this->load->view('template/footer') ?>
</div>