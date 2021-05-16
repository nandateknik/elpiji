<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

<div class="container">
    <div class="d-flex justify-content-end pb-3">
        <a href="<?= site_url('/transaksi/penjualan/') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left-short"></i> BACK</a>
    </div>
    <div class="card p-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3><i class="bi bi-bag-check-fill"></i> Toko Sinda</h3>
                    <p>Jl. Yos Sudarso no 72, Klatak, Banyuwangi.</p>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <table>
                            <tr>
                                <td>Nota </td>
                                <td>: <?= $penjualan->nota ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>: <?= $penjualan->tanggal ?></td>
                            </tr>
                            <tr>
                                <td>Petugas</td>
                                <td>: <?= $penjualan->user ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <table class="mt-2 table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="85px" scope="col">No</th>
                        <th width="200px" scope="col">Kode Barang</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $list) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $i++; ?></th>
                            <td><?= $list->id_brg ?></td>
                            <td><?= $list->nama ?></td>
                            <td><?= $list->jumlah ?></td>
                            <td>Rp. <?= number_format($list->harga_jual) ?></td>
                            <td>Rp. <?= number_format($list->total) ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <th class="text-right" colspan="5">TOTAL :</th>
                        <th>Rp. <?= number_format($penjualan->total) ?></th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="5">BAYAR :</th>
                        <th>Rp. <?= number_format($penjualan->bayar) ?></th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="5">KEMBALI :</th>
                        <th>Rp. <?= number_format($penjualan->kembalian) ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer') ?>