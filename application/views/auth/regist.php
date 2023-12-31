<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('public/dist/img/logo.png') ?>">
	<link rel="icon" type="image/png" href="<?= base_url('public/dist/img/logo.png') ?>">
	<title>BMBK</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('public/dist/css/adminlte.min.css') ?>">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?= base_url('public/plugins/toastr/toastr.min.css') ?>">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h3"><b>BMBK - </b>Bakat Minat BK</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Wajib Diisi Semua Yaaa</p>

				<form action="<?= base_url('auth/prosesdaftar') ?>" method="post">

					<div class="userlogin">
						<p class="login-box-msg">Silahkan Mendaftar</p>

						<div class="input-group mb-3">
							<input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" required>
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
						</div>
						<div class="input-group mb-3">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
						</div>
					</div>

					<div class="row">
						<div class="col-4">
							<a href="<?= base_url(); ?>" type="reset" class="btn btn-dark btn-block">LOGIN</a>
						</div>
						<div class="col-4"></div>

						<div class="col-4">
							<button type="submit" id="save" class="btn btn-primary btn-block">DAFTAR</button>
						</div>
					</div>
				</form>

			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('public/dist/js/adminlte.min.js') ?>"></script>
	<!-- SweetAlert2 -->
	<script src="<?= base_url('public/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
	<!-- Toastr -->
	<script src="<?= base_url('public/plugins/toastr/toastr.min.js') ?>"></script>

	<?php if ($this->session->flashdata('error')) { ?>
		<script>
			$(function() {
				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				toastr.error('<?php echo $this->session->flashdata('error'); ?>')
			});
		</script>
	<?php } else if ($this->session->flashdata('success')) { ?>
		<script>
			$(function() {
				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				toastr.success('<?php echo $this->session->flashdata('success'); ?>')
			});
		</script>
	<?php } ?>


</body>

</html>