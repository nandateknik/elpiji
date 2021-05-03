<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>
<link href="<?= base_url('/public/assets/select2/css/select2.min.css') ?>" rel="stylesheet" />

<div class="container-fluid">
    <div class="d-flex justify-content-between px-3">
        <h4><i class="bi bi-bag-check-fill"></i> Penjualan</h4>
        <div class="form-group">
            <select id="brg-select" name="kode_brg" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
            </select>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                        <th scope="col">Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?php echo $items['name']; ?></td>
                            <td><?php echo $items['qty']; ?></td>
                            <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                            <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            <td width="150px">
                                <button id="minus" data-qty="<?= $items['qty'] ?>" data-rowid="<?= $items['rowid'] ?>" class="btn btn-sm btn-secondary"> <i class="bi bi-clipboard-minus"></i> </button>
                                <button id="plus" data-qty="<?= $items['qty'] ?>" data-rowid="<?= $items['rowid'] ?>" class="btn btn-sm btn-primary"> <i class="bi bi-clipboard-plus"></i> </button>
                                <button class="btn btn-sm btn-danger" <?php $rowid = $items['rowid'] ?> onclick="hapusRow('<?= $rowid ?>')"><i class="bi bi-clipboard-x"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr class="text-primary">
                        <td colspan="3"> </td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <button onclick="hapus()" class="btn btn-secondary">Hapus</button>
                <button id="btn-bayar" class="btn btn-primary" data-toggle="modal" data-target="#bayar">Bayar (F8)</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer') ?>

<form method="post" action="<?= site_url('aplikasi/penjualan/bayar') ?>">
    <!-- Modal -->
    <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lanjut Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?= uniqid() ?>" name="nota" id="nota">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('id'); ?>">
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" readonly value="<?php echo $this->cart->total(); ?>" name="total" id="total" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bayar">Bayar</label>
                        <input type="number" onkeyup="hitung(this.value,<?php echo $this->cart->total(); ?>)" name="bayar" id="bayar2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kembalian">Kembalian</label>
                        <input type="number" readonly name="kembalian" id="kembalian" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="minus" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="savebayar" class="btn btn-primary">Save (F9)</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?= site_url('/aplikasi/penjualan/addCart') ?>" method="post">
    <!-- Modal -->
    <div class="modal fade" id="dataBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="kode_brg">Kode Barang</label>
                            <input type="text" readonly name="kode_brg" id="kode_brg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Barang</label>
                            <input type="text" readonly name="nama" id="nama" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga_jual">Harga</label>
                                    <input type="text" readonly name="harga_jual" id="harga_jual" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" onkeyup="cek(this.value)" name=" jumlah" id="jumlah" class="form-control jumlah">
                                    <input type="hidden" name="stok" id="stok">
                                    <small>Stok Sisa: <span id="sisa"></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveCart" class="btn btn-primary">Add Cart (F10)</button>
                </div>
            </div>
        </div>
    </div>
</form>

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

<script>
    $(document).on('keydown', 'body', function(e) {
        var charCode = (e.which) ? e.which : event.keyCode;


        if (charCode == 118) //F7
        {

            return false;
        }


        if (charCode == 119) //F8
        {
            $('#btn-bayar').click();
            return false;
        }

        if (charCode == 120) //F9
        {
            $('#savebayar').click();
            return false;
        }

        if (charCode == 121) //F10
        {
            $('#saveCart').click();
            return false;
        }
    });

    $('.select2').change(function() {
            var id = $(this).val();
            $('.jumlah').focus();
            $.ajax({
                type: 'post',
                url: '<?= site_url('/ajax/select/getBarangData/') ?>',
                dataType: 'json',
                data: {
                    'kode': id
                },
                success: function(data) {
                    $('#dataBarang').modal('show');
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('harga_jual').value = data.harga_jual;
                    document.getElementById('kode_brg').value = data.kode;
                    document.getElementById('stok').value = data.stok;
                    document.getElementById('sisa').innerHTML = data.stok;
                }
            });

        }

    );

    $('#dataBarang').on('shown.bs.modal', function() {
        $('#jumlah').focus();
    })

    $('#bayar').on('shown.bs.modal', function() {
        $('#bayar2').focus();
    })

    $(document.body).on('click', '#minus', function() {

        $.ajax({
            type: 'post',
            url: '<?= site_url('/aplikasi/penjualan/minusCart') ?>',
            dataType: 'json',
            data: {
                'rowid': $(this).data("rowid"),
                'qty': $(this).data("qty")
            },
        });
        $(document).ajaxStop(function() {
            window.location.reload();
        });

    });

    $(document.body).on('click', '#plus', function() {

        $.ajax({
            type: 'post',
            url: '<?= site_url('/aplikasi/penjualan/plusCart') ?>',
            dataType: 'json',
            data: {
                'rowid': $(this).data("rowid"),
                'qty': $(this).data("qty")
            },
        });
        $(document).ajaxStop(function() {
            window.location.reload();
        });

    });

    $(document.body).on('keyup', '#jumlah', function() {
        let stok = parseInt(document.getElementById('stok').value);
        let input = parseInt($(this).val());
        if (input > stok) {
            swal({
                title: "Batas Stok LIMIT !",
                text: "Jumlah pembelian melebihi stok!",
                icon: "warning",
                buttons: true,
            })
            $(this).val('')
        }
    })
</script>

<script>
    function hapus() {
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
                        window.location.replace("<?= site_url('/aplikasi/penjualan/deletecart') ?>");
                    }, 1500);
                } else {
                    swal("Data kamu masih aman !");
                }
            });
    }

    function hapusRow(id) {
        swal({
                title: "Are you sure?",
                text: "Apakah kamu yakin akan hapus data cart ?!",
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
                        window.location.replace("<?= site_url('/aplikasi/penjualan/deletecartrow/') ?>" + id + "");
                    }, 1500);
                } else {
                    swal("Data kamu masih aman !");
                }
            });
    }

    function hitung(input, total) {
        document.getElementById('kembalian').value = parseInt(input) - total;
    }
</script>