<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>
<link href="<?= base_url('/public/assets/select2/css/select2.min.css') ?>" rel="stylesheet" />

<div class="container-fluid">
    <div class="d-flex justify-content-between px-3">
        <h4><i class="bi bi-bag-check-fill"></i> Data Transaksi Pembelian</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addData"> <i class="bi bi-plus"></i>Tambah Data</button>
    </div>

    <div class="card mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">No</th>
                            <th width='100px'>Tanggal</th>
                            <th>Nama</th>
                            <th width='100px'>Harga Jual</th>
                            <th width='100px'>Harga Beli</th>
                            <th width='70px'>Jumlah</th>
                            <th width='70px'>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pembelian as $list) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td class="text-center"><?= $list->tanggal; ?></td>
                                <td><?= $list->nama; ?></td>
                                <td>Rp. <?= number_format($list->harga_jual); ?></td>
                                <td>Rp. <?= number_format($list->harga_beli); ?></td>
                                <td><?= $list->jumlah; ?></td>
                                <td><?= $list->user; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer') ?>
<script src="<?= base_url('/public/assets/select2/js/select2.min.js') ?>"></script>


<form action="<?= site_url('/aplikasi/pembelian/insert') ?>" method="post">
    <!-- Modal -->
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-plus-circle-fill"></i> Tambah Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('id'); ?>">
                        <div class="form-group">
                            <label for="tanggal">tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <select name="kode_brg" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            </select>
                            <small class="text-danger"><?php echo form_error('kode_brg'); ?></small>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="text" name="harga_beli" id="harga_beli" class="form-control">
                                    <small class="text-danger"><?php echo form_error('harga_beli'); ?></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" name="harga_jual" id="harga_jual" class="form-control">
                                    <small class="text-danger"><?php echo form_error('harga_jual'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control">
                            <small class="text-danger"><?php echo form_error('jumlah'); ?></small>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

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
                    console.log(data);
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