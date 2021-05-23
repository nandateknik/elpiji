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

<script>
	function logout() {
		swal({
				title: "Apakah kamu yakin?",
				text: "Kamu akan keluar dari aplikasi ini",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					swal("Berhasil! kamu akan dikeluarkan dari aplikasi sebentar lagi", {
						icon: "success",
						button: false,
					});
					setInterval(function() {
						window.location.replace("<?= site_url('/welcome/logout') ?>");
					}, 1500);
				} else {
					swal("Kamu membatalkan keluar dari aplikasi !");
				}
			});
	}
</script>

</body>

</html>