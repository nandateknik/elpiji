<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>


<div class="row justify-content-center">
    <div class="col-12 col-xs-12 col-md-6 ">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="text-center">INFORMASI USER</h5>
                <div class="row">
                    <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 text-center">
                        <img width="150px" src="<?= base_url('public/') ?>img/default.jpg" alt="" srcset="">
                    </div>
                    <div class="col-sm-12 col-lg-9 mt-4">
                        <div class="row p-1">
                            <div class="col-2 col-sm-3 col-lg-3 col-xl-2">Nama</div>
                            <div class="col">: <?= $user->nama; ?></div>
                        </div>
                        <div class="row p-1">
                            <div class="col-2 col-sm-3 col-lg-3 col-xl-2">User</div>
                            <div class="col">: <?= $user->user; ?></div>
                        </div>
                        <div class="row p-1">
                            <div class="col-2 col-sm-3 col-lg-3 col-xl-2">Role</div>
                            <div class="col">: <?php echo $user->role_id == '1' ? 'Admin' : '' ?> <?php echo $user->role_id == '2' ? 'Supervisor' : '' ?> <?php echo $user->role_id == '3' ? 'Kasir' : '' ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#edit-data">
                        <i class="fa fa-edit"></i> Edit Profile
                    </a>
                    <a class="btn btn-warning" href="javascript:;" data-toggle="modal" data-target="#edit-password">
                        <i class="fa fa-eye"></i> Update Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>

<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('/aplikasi/user/updateprofile/') . $user->id ?>" method="post">
                <div class="modal-body">
                    <h5 class="text-center">Edit Profile User</h5>
                    <hr>
                    <div class="form-group">
                        <label for="nama">NAMA</label>
                        <input type="text" value="<?= $user->nama ?>" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input disabled type="text" value="<?= $user->user ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">ROLE</label>
                        <select disabled class="form-control">
                            <option <?php echo $user->role_id == '1' ? 'selected' : '' ?> value="Admin">Admin</option>
                            <option <?php echo $user->role_id == '2' ? 'selected' : '' ?> value="Supervisor">Supervisor</option>
                            <option <?php echo $user->role_id == '3' ? 'selected' : '' ?> value="Kasir">Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-password" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('/aplikasi/user/updatePassword/') . $user->id ?>" method="post">
                <div class="modal-body">
                    <h5 class="text-center">Ganti password</h5>
                    <hr>
                    <div class="form-group">
                        <label for="password_lama">Password lama</label>
                        <input type="password" name="password_lama" id="password_lama" value="<?php echo set_value('password_lama'); ?>" class="form-control" placeholder="Masukan password lama">
                        <small class="text-danger"><?php echo form_error('password_lama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Masukan password Baru">
                        <small class="text-danger"><?php echo form_error('password'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password'); ?>" class="form-control" placeholder="Masukan Confirm password">
                        <small class="text-danger"><?php echo form_error('confirm_password'); ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>