<footer class="py-4 bg-light mt-auto">
	<div class="container-fluid">
		<div class="d-flex align-items-center justify-content-between small">
			<div class="text-muted">Copyright &copy; Lalare IT 2021</div>
			<div>
				<a href="#">Privacy Policy</a>
				&middot;
				<a href="#">Terms &amp; Conditions</a>
			</div>
		</div>
	</div>
</footer>
<?= $this->session->userdata('pesan'); ?>
<?php $this->session->unset_userdata('pesan'); ?>
<script src="<?= base_url() ?>/public/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>/public/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/public/js/scripts.js"></script>
<script src="<?= base_url() ?>/public/js/Chart.min.js" \></script>
<script src="<?= base_url() ?>/public/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/public/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/public/assets/demo/datatables-demo.js"></script>

</body>

</html>