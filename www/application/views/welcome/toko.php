<?php
$this->load->view('template/header');
$this->load->view('template/navbar');
?>

<form method="post" action="<?= site_url('aplikasi/toko/update/') . $toko->id ?>">

    <div class="container d-flex justify-content-center">
        <div class="card p-4 col-7">
            <div class="card-body">
                <h5 class="text-center">PROFIL TOKO</h5>
                <hr>
                <div class="form-group">
                    <label for="toko">Nama Toko</label>
                    <input type="text" value="<?= $toko->toko ?>" name="toko" id="toko" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="telp">No Telp </label>
                    <input type="text" value="<?= $toko->telp ?>" name="telp" id="telp" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="telp">Alamat </label>
                    <textarea name="alamat" id="alamat" cols="10" rows="3" class="form-control"><?= $toko->alamat ?></textarea>
                </div>
            </div>
            <div class="text-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                    <i class="bi bi-pencil"></i> Update
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Data toko </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Kamu akan melakukan update pada data toko yang akan mempengaruhi data sebelumnya, yakin akan update data ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

<?php $this->load->view('template/footer') ?>