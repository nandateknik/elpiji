<?php
$this->load->view('template/header');
$this->load->view('template/navbar'); ?>
<link href="<?= base_url('/public/assets/select2/css/select2.min.css') ?>" rel="stylesheet" />

<div class="container-fluid p-3">
    <div class="card  p-3 mb-5">
        <div class="text-center mb-3">
            <h3>LAPORAN PENJUALAN</h3>
        </div>
        <center>
            <form method="post">
                <div class="row col-8">
                    <div class="col-4">
                        <div class="form-group">
                            <select id="brg-select" name="kode_brg" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            </select>
                            <small id="helpId" class="text-muted">Masukan kode barang</small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="date" name="start" id="start" class="form-control" placeholder="Start Date" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Pilih tanggal awal</small>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="date" name="end" id="end" class="form-control" placeholder="End Date" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Pilih tanggal akhir</small>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </center>
    </div>

    <?php if (!empty($barang)) : ?>
        <?php
        $sum_jumlah = 0;
        $sum_untung = 0;
        $sum_subtotal = 0;
        foreach ($barang as $key => $value) {
            if (isset($value->jumlah)) {
                $sum_jumlah += $value->jumlah;
                $sum_untung += $value->untung;
                $sum_subtotal += $value->subtotal;
                $nama_item = $value->nama;
            }
        };
        ?>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th class="text-center" colspan="2">Detail Penjualan</th>
                            </tr>
                            <tr>
                                <td><small>Periode</small></td>
                                <td><small> : <?= $this->session->userdata('start'); ?> / <?= $this->session->userdata('end'); ?></small></td>
                            </tr>
                            <tr>
                                <td><small> Nama Item </small></td>
                                <td><small> : <?= $nama_item; ?></small></td>
                            </tr>
                            <tr>
                                <td><small> Item Terjual</small></td>
                                <td><small> : <?= $sum_jumlah; ?> Terjual</small></td>
                            </tr>
                            <tr>
                                <td><small> Total Pendapatan</small></td>
                                <td><small> : Rp. <?= number_format($sum_subtotal); ?></small></td>
                            </tr>
                            <tr>
                                <td width="125px"><small>Total Keuntungan</small></td>
                                <td><small> : Rp. <?= number_format($sum_untung); ?></small></td>
                            </tr>
                        </table>
                        <div class="text-center">
                            <a href="<?= site_url('/laporan/penjualan/cetakbarang') ?>" class="bi bi-file-earmark-arrow-down-fill"> EXPORT PDF</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Keuntungan</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $list) : ?>
                                        <tr>
                                            <td><?= $list->tanggal; ?></td>
                                            <td><?= $list->jumlah; ?></td>
                                            <td>Rp. <?= number_format($list->harga_beli); ?></td>
                                            <td>Rp. <?= number_format($list->harga_jual); ?></td>
                                            <td>Rp. <?= number_format($list->untung); ?></td>
                                            <td>Rp. <?= number_format($list->subtotal); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>


<?php $this->load->view('template/footer') ?>
<script src="<?= base_url('/public/assets/select2/js/select2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            ajax: {
                url: '<?= site_url('/ajax/select/getBarang/') ?>',
                dataType: 'json',
                type: 'post',
                delay: 150,
                data: function(params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true,
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            },
            placeholder: 'Cari kode atau nama barang',
            minimumInputLength: 3,
        });
    });
</script>