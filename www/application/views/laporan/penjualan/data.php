<?php
$this->load->view('template/header');
$this->load->view('template/navbar'); ?>

<div class="container mb-3">
    <div class="card p-4">
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
            <hr>
        </center>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pendapatan</th>
                            <th>Keuntungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($penjualan)) : ?>
                            <?php $i = 1; ?>
                            <?php foreach ($penjualan as $data) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $data->tanggal; ?></td>
                                    <td>Rp. <?= number_format($data->total); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <?php if (!empty($penjualan)) : ?>
                                <th class="text-center" colspan="2">Total Keseluruhan</th>
                                <th>Rp. <?= number_format($penjualan2->total2); ?></th>
                            <?php endif; ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer') ?>