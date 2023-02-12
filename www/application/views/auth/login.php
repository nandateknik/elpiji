<?php $this->load->view('layouts/head');?>
  <!-- Login Content -->
  <div class="container-login mt-5">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-12 col-md-6">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                        placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                      <input type="password"  name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('layouts/foot');?>
