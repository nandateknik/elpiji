<script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?=base_url('assets/')?>js/ruang-admin.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>  
  <script src="<?=base_url('assets/js/sweetalert2.all.min.js')?>"></script>
  <?=$this->session->flashdata('msg');?>
<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="<?=site_url('auth/')?>logout" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
</body>

</html>