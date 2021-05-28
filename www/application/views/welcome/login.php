<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="<?= base_url() ?>/public/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/public/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/bootstrap-icon/bootstrap-icons.css">
    <script src="<?= base_url() ?>/public/js/sweetalert.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 mt-5">
                            <h4 class="text-center mb-4 text-white">Aplikasi Penjualan</h4>
                            <div class="card shadow-lg border-0 rounded-lg p-3">
                                <div class="card-body">
                                    <form method="post">
                                        <label for="">Username</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <label for="">Password</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-download"></i> Login</button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php $this->load->view('template/footer') ?>