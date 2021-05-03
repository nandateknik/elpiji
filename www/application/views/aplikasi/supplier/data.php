<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

<div class="container-fluid">

    <div class="d-flex justify-content-between px-3">
        <h4><i class="bi bi-bag-check-fill"></i> Data Supplier</h4>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> <i class="bi bi-plus"></i>Tambah Data</button>
    </div>

    <div class="card mt-4 mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($supplier as $list) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $list->kode; ?></td>
                                <td><?= $list->nama; ?></td>
                                <td><?= $list->alamat; ?></td>
                                <td><?= $list->nohp; ?></td>
                                <td class="text-center" width="150px">
                                    <button class="btn btn-sm btn-warning" data-kode="<?= $list->kode; ?>" data-nama="<?= $list->nama; ?>" data-alamat="<?= $list->alamat; ?>" data-nohp="<?= $list->nohp; ?>" data-toggle="modal" data-target="#modalUpdate">
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

<form action="<?= site_url('/aplikasi/supplier/insert') ?>" method="post">
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-plus-circle-fill"></i> Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" name="kode" value="<?php echo set_value('kode'); ?>" class="form-control" id="inputPassword" placeholder="Kode supplier">
                                <small class="text-danger"><?php echo form_error('kode'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control" id="inputPassword" placeholder="Nama supplier">
                                <small class="text-danger"><?php echo form_error('nama'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat" value="<?php echo set_value('alamat'); ?>" class="form-control" id="inputPassword" placeholder="Alamat supplier">
                                <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="text" name="nohp" value="<?php echo set_value('nohp'); ?>" class="form-control" id="inputPassword" placeholder="No Hp supplier">
                                <small class="text-danger"><?php echo form_error('nohp'); ?></small>
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
</form>

<form action="<?= site_url('/aplikasi/supplier/update') ?>" method="post">
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <i class="bi bi-journal-bookmark-fill"></i> Update Supplier
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" id="kode" name="kode" value="<?php echo set_value('kode'); ?>" class="form-control" id="inputPassword" placeholder="Kode supplier">
                                <small class="text-danger"><?php echo form_error('kode'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control" id="inputPassword" placeholder="Nama supplier">
                                <small class="text-danger"><?php echo form_error('nama'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>" class="form-control" id="inputPassword" placeholder="Alamat supplier">
                                <small class="text-danger"><?php echo form_error('alamat'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="text" id="nohp" name="nohp" value="<?php echo set_value('nohp'); ?>" class="form-control" id="inputPassword" placeholder="No Hp supplier">
                                <small class="text-danger"><?php echo form_error('nohp'); ?></small>
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
</form>

<?php $this->load->view('template/footer') ?>
<script type="text/javascript">
    $(document).ready(function() {
        // Untuk sunting
        $('#modalUpdate').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#kode').attr("value", div.data('kode'));
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#alamat').attr("value", div.data('alamat'));
            modal.find('#nohp').attr("value", div.data('nohp'));

        });
    });
</script>
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
                        window.location.replace("<?= site_url('/aplikasi/supplier/delete/') ?>" + kode + "");
                    }, 1500);
                } else {
                    swal("Data kamu masih aman !");
                }
            });
    }
</script>