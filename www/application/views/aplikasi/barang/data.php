<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

<link href="<?= base_url('/public/assets/select2/css/select2.min.css') ?>" rel="stylesheet" />


<div class="container-fluid">

    <div class="d-flex justify-content-between px-3">
        <h4><i class="bi bi-bag-check-fill"></i> Data Barang</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> <i class="bi bi-plus"></i>Tambah Data</button>
    </div>

    <div class="card mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th width="40px">No</th>
                            <th width="60px">supplier</th>
                            <th width="60px">Kode</th>
                            <th>Nama</th>
                            <th width="100px">Harga Jual</th>
                            <th width="100px">Harga Beli</th>
                            <th width="50px">Stok</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang as $list) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $list->kode_sup; ?></td>
                                <td><?= $list->kode; ?></td>
                                <td><?= $list->nama; ?></td>
                                <td>Rp. <?= number_format($list->harga_jual); ?></td>
                                <td>Rp. <?= number_format($list->harga_beli); ?></td>
                                <td><?= $list->stok; ?></td>
                                <td class="text-center" width="150px">
                                    <button class="btn btn-sm btn-warning" data-stok="<?= $list->stok; ?>" data-kode_sup="<?= $list->kode_sup; ?>" data-kode="<?= $list->kode; ?>" data-nama="<?= $list->nama; ?>" data-harga_jual="<?= $list->harga_jual; ?>" data-harga_beli="<?= $list->harga_beli; ?>" data-toggle="modal" data-target="#modalUpdate">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="hapus('<?= $list->kode ?>')">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="<?= site_url('/aplikasi/barang/insert') ?>" method="post">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-plus-circle-fill"></i> Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label>Kode Supplier</label>
                            <select name="kode_sup" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            </select>
                            <small class="text-danger"><?php echo form_error('kode_sup'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kode">Kode Barang</label>
                            <input type="text" name="kode" id="kode" class="form-control">
                            <small class="text-danger"><?php echo form_error('kode'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Barang</label>
                            <input type="text" name="stok" id="stok" class="form-control">
                            <small class="text-danger"><?php echo form_error('stok'); ?></small>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" name="harga_jual" id="harga_jual" class="form-control">
                                    <small class="text-danger"><?php echo form_error('harga_jual'); ?></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="text" name="harga_beli" id="harga_beli" class="form-control">
                                    <small class="text-danger"><?php echo form_error('harga_beli'); ?></small>
                                </div>
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
    </div>
</form>

<form action="<?= site_url('/aplikasi/barang/update') ?>" method="post">
    <!-- Modal -->
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-plus-circle-fill"></i> Update Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="kode">Kode Supplier</label>
                            <input type="text" disabled name="kode_sup" id="kode_sup" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kode">Kode Barang</label>
                            <input type="text" readonly name="kode" id="kode" class="form-control">
                            <small class="text-danger"><?php echo form_error('kode'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Barang</label>
                            <input type="text" name="stok" id="stok" class="form-control">
                            <small class="text-danger"><?php echo form_error('stok'); ?></small>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" name="harga_jual" id="harga_jual" class="form-control">
                                    <small class="text-danger"><?php echo form_error('harga_jual'); ?></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="text" name="harga_beli" id="harga_beli" class="form-control">
                                    <small class="text-danger"><?php echo form_error('harga_beli'); ?></small>
                                </div>
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
    </div>
</form>

<?php $this->load->view('template/footer') ?>
<script src="<?= base_url('/public/assets/select2/js/select2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            ajax: {
                url: '<?= site_url('/ajax/select/getSupplier/') ?>',
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
            placeholder: 'Cari Kode Supplier',
            minimumInputLength: 3,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Untuk sunting
        $('#modalUpdate').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#kode_sup').attr("value", div.data('kode_sup'));
            modal.find('#kode').attr("value", div.data('kode'));
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#harga_jual').attr("value", div.data('harga_jual'));
            modal.find('#harga_beli').attr("value", div.data('harga_beli'));
            modal.find('#stok').attr("value", div.data('stok'));

        });
    });
</script>

<style>
    body {
        background: #eee
    }

    .form-control {
        border-radius: 0;
        box-shadow: none;
        border-color: #d2d6de
    }

    .select2-hidden-accessible {
        border: 0 !important;
        clip: rect(0 0 0 0) !important;
        height: 1px !important;
        margin: -1px !important;
        overflow: hidden !important;
        padding: 0 !important;
        position: absolute !important;
        width: 1px !important
    }

    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
    }

    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0;
        padding: 6px 12px;
        height: 34px
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #aaa;
        border-radius: 4px
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 28px;
        user-select: none;
        -webkit-user-select: none
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-right: 10px
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 0;
        padding-right: 0;
        height: auto;
        margin-top: -3px
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 28px
    }

    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0 !important;
        padding: 6px 12px;
        height: 40px !important
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 6px !important;
        right: 1px;
        width: 20px
    }
</style>

<script>
    function hapus(kode) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Berhasil! data kamu akan dihapus dan kamu akan dialihkan ke halaman selanjutnya", {
                        icon: "success",
                        button: false,
                    });
                    setInterval(function() {
                        window.location.replace("<?= site_url('/aplikasi/barang/delete/') ?>" + kode + "");
                    }, 1500);
                } else {
                    swal("Data kamu masih aman !");
                }
            });
    }
</script>