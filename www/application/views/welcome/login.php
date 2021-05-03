<?php
$this->load->view('template/header');
?>

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
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php $this->load->view('template/footer') ?>