<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

<div class="container-fluid">

    <div class="d-flex justify-content-between px-3">
        <h4><i class="bi bi-bag-check-fill"></i> Data Transaksi Penjualan</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> <i class="bi bi-plus"></i>Tambah Data</button>
    </div>

    <div class="card mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="40px">No</th>
                            <th>Nota</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($transaksi as $list) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $list->nota; ?></td>
                                <td><?= $list->tanggal; ?></td>
                                <td>Rp.<?= number_format($list->total) ?></td>
                                <td>Rp.<?= number_format($list->bayar) ?></td>
                                <td>Rp.<?= number_format($list->kembalian) ?></td>
                                <td>
                                    <a href="<?= site_url('/transaksi/penjualan/detail/' . $list->nota) ?>"><i class="bi bi-clipboard-check"></i> Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('template/footer') ?>