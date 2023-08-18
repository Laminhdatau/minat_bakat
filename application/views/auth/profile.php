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
		<form action="<?= base_url('dashboard/ubahprofile/' . $data->nis) ?>" method="post" enctype="multipart/form-data">
			<div class="card card-outline card-primary">
				<?php if ($data->user_image) { ?>
					<div class="card-header text-center">
						<label for="userfile">
							<img class="img-circle" src="<?= base_url('public/dist/img/' . $data->user_image); ?>" alt="" width="50%">
						</label>
						<input type="file" name="userfile" id="userfile" style="display: none;" accept=".jpg, .jpeg, .png">
					</div>
				<?php } else { ?>
					<div class="card-header text-center">
						<input type="file" name="userfile" id="userfile" class="form-control" accept=".jpg, .jpeg, .png">
					</div>

				<?php } ?>

				<div class="card-body">
					<p class="login-box-msg"> <?= $this->session->userdata('nama') ?></p>
					<div class="input-group mb-3">
						<input type="number" class="form-control" id="nis" name="nis" placeholder="nis" readonly value="<?= $data->nis; ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $data->nama; ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>


					<?php
					if ($data->id_role !== '1' && $data->id_role !== '2') {
						$ortu = explode(',', $data->ortu);
						foreach ($ortu as $index => $o) {
							$placeholder = ($index === 0) ? "Ayah" : "Ibu";
					?>
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="ortu<?= $index ?>" name="ortu[]" placeholder="<?= $placeholder ?>" value="<?= $o; ?>">
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-user"></span>
									</div>
								</div>
							</div>
					<?php
						}
					}
					?>

					<div class="input-group mb-3">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $data->username; ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $data->password; ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>

					<div class="input-group mb-3">
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?= $data->alamat; ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-home"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= $data->email; ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>

					<?php if ($data->id_role !== '1' && $data->id_role !== '2') { ?>
						<div class="input-group mb-3">
							<select name="id_jurusan" id="" class="form-control">
								<option>--PILIH JURUSAN--</option>
								<?php foreach ($jurusan as $j) : ?>
									<option value="<?= $j->id_jurusan; ?>" <?= ($j->id_jurusan == $data->id_jurusan) ? 'selected' : ''; ?>><?= $j->jurusan; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					<?php } ?>




					<div class="row">
						<div class="col-4">
						</div>
						<div class="col-4">
							<a href="<?= base_url('dashboard'); ?>" type="reset" class="btn btn-dark btn-block">Kembali</a>
						</div>

						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Ubah</button>
						</div>
					</div>
				</div>
		</form>
	</div>

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