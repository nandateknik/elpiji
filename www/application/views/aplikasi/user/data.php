<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsif">
                <table class="table" id="dataTable">
                    <thead>
                        <tr class="text-center">
                            <th width="100px">No</th>
                            <th>Nama</th>
                            <th>User</th>
                            <th>Role</th>
                            <th width="100px">Status</th>
                            <th width="150px">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $list) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $list->nama; ?></td>
                                <td><?= $list->user; ?></td>
                                <td>
                                    <?php if ($list->role_id == 1) : ?>
                                        Admin
                                    <?php elseif ($list->role_id == 2) : ?>
                                        Supervisor
                                    <?php else : ?>
                                        Kasir
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($list->is_active == 1) : ?>
                                        <div class="badge badge-success">Actived</div>
                                    <?php else : ?>
                                        <div class="badge badge-danger">Deactived</div>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" data-id="<?= $list->id ?>" data-nama="<?= $list->nama ?>" data-user="<?= $list->user ?>" data-role="<?= $list->role_id ?>" data-active="<?= $list->is_active ?>" href="javascript:()" data-toggle="modal" data-target="#profil-user"><i class="bi bi-person"></i> Profil</a>
                                    <a class="btn btn-sm btn-warning" onclick="hapus(<?= $list->id ?>)" href="javascript:()"><i class="bi bi-shield-lock"></i> Reset PW</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>

<form action="<?= site_url('aplikasi/user/updateDataProfile') ?>" method="post">
    <!-- Modal -->
    <div class="modal fade" id="profil-user" tabindex="-1" role="dialog" aria-labelledby="Profil User" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pofil User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input readonly type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select class="form-control" name="role_id" id="role_id">
                                    <option value="1">Admin</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Kasir</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="is_active">Status</label>
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="1">Active</option>
                                    <option value="0">Deactived</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        // Untuk sunting
        $('#profil-user').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#username').attr("value", div.data('user'));
            modal.find('#id').attr("value", div.data('id'));
            var isi = div.data('role');
            var active = div.data('active');
            $('#role_id option[value=' + isi + ']').attr('selected', 'true');
            $('#is_active option[value=' + active + ']').attr('selected', 'true');
        });
    });
</script>


<script>
    function hapus(kode) {
        swal({
                title: "Are you sure?",
                text: "Kamu akan reset password user ke default!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Berhasil! reset password berhasil, Silahkan login dengan password baru (user)", {
                        icon: "success",
                        button: false,
                    });
                    setInterval(function() {
                        window.location.replace("<?= site_url('/aplikasi/user/resetpw/') ?>" + kode + "");
                    }, 1500);
                } else {
                    swal("Data kamu masih aman !");
                }
            });
    }
</script>