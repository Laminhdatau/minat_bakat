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
		<form action="<?= base_url('minat/simpan/') ?>" method="post">
			<div class="card card-outline card-primary">
				<div class="card-body">
					<?php if (!empty($v)) { ?>
						<?php if ($v->status == '0') { ?>
							<p class="login-box-msg">Pilih Minat</p>
						<?php } elseif($v->status=='1') { ?>
							<p class="login-box-msg">Anda Yakin Dengan Pilihan Anda?</p>
						<?php } ?>
						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NIS</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">

									<input type="number" class="form-control" id="nis" name="nis" placeholder="NIS" readonly value="<?= $v->nis; ?>">

								</div>
							</div>
						</div>

						<?php if ($v->status == '0') { ?>
							<div class="input-group mb-3">
								<div class="row col-12">
									<div class="col-4">

										<div class="input-group-append">
											<div class="input-group-text">
												<span><b>JURUSAN</b></span>
											</div>
										</div>

									</div>

									<div class="col-8">
										<select name="id_jurusan" id="id_jurusan" class="form-control" required>
											<option>--PILIH JURUSAN --</option>
											<?php foreach ($jurusan as $p) { ?>
												<option value="<?= $p->id_jurusan; ?>"><?= $p->jurusan; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>

							<div class="input-group mb-3" id="pel">
								<div class="row col-12">
									<div class="col-4">

										<div class="input-group-append">
											<div class="input-group-text">
												<span><b>MAPEL</b></span>
											</div>
										</div>
									</div>

									<div class="col-8">
										<select name="id_pelajaran" id="id_pelajaran" class="form-control" required>
										</select>
									</div>
								</div>
							</div>


							<div class="input-group mb-3">
								<div class="row col-12">
									<div class="col-4">
										<div class="input-group-append">
											<div class="input-group-text">
												<span><b>NILAI</b></span>
											</div>
										</div>
									</div>
									<div class="col-8">
										<input type="number" class="form-control" id="nilai" name="nilai" min="1" max="100" placeholder="Nilai" required>
									</div>
								</div>
							</div>

						<?php } elseif ($v->status == '1') { ?>
							<div class="input-group mb-3">
								<div class="row col-12">
									<div class="col-4">
										<div class="input-group-append">
											<div class="input-group-text">
												<span><b>JURUSAN</b></span>
											</div>
										</div>
									</div>
									<div class="col-8">
										<input type="text" class="form-control" min="1" max="100" placeholder="<?= $a->jurusan; ?>" readonly>
									</div>
								</div>
							</div>

							<div class="input-group mb-3">
								<div class="row col-12">
									<div class="col-4">
										<div class="input-group-append">
											<div class="input-group-text">
												<span><b>MAPEL</b></span>
											</div>
										</div>
									</div>
									<div class="col-8">
										<input type="text" class="form-control" min="1" max="100" placeholder="<?= $a->pelajaran; ?>" readonly>
									</div>
								</div>
							</div>


							<div class="input-group mb-3">
								<div class="row col-12">
									<div class="col-4">
										<div class="input-group-append">
											<div class="input-group-text">
												<span><b>NILAI</b></span>
											</div>
										</div>
									</div>
									<div class="col-8">
										<input type="text" class="form-control" min="1" max="100" placeholder="<?= $a->nilai; ?>" readonly>
									</div>
								</div>
							</div>

						<?php } ?>

						<div class="row">
							<div class="col-4">
								<a href="<?= base_url('dashboard'); ?>" type="reset" class="btn btn-secondary btn-block">Kembali</a>
							</div>
							<div class="col-4">
								<?php if ($v->status == '1') { ?>
									<a href="<?= base_url('minat/hapus/' . $this->session->userdata('nis')); ?>" id="hapus" class="btn btn-danger btn-block">Hapus</a>
								<?php } ?>
							</div>
							<?php if ($v->status == '0') { ?>
								<div class="col-4">
									<button type="submit" id="simpan" class="btn btn-primary btn-block">Simpan</button>
								</div>
							<?php } elseif ($v->status == '1') { ?>
								<div class="col-4">
									<a href="<?= base_url('minat/kirim/' . $this->session->userdata('nis')); ?>" id="kirim" class="btn btn-info btn-block">Kirim</a>
								</div>

							<?php } ?>
						</div>
					<?php } else { ?>
						<p class="login-box-msg">Anda Telah Mengirim Pelajaran Yang Di Minati</p>
					<?php } ?>
		</form>
	</div>
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



	<script>
		$('#pel').hide();
		$(document).ready(function() {
			$('#id_jurusan').change(function() {
				var id_jurusan = $(this).val();
				$.ajax({
					url: '<?= base_url('minat/getMapelByJurusan') ?>',
					dataType: 'json',
					// type: 'ajax',
					method: 'post',
					data: {
						id_jurusan: id_jurusan
					},
					success: function(response) {
						$('#id_pelajaran').empty();
						$('#pel').show();

						// Tambahkan opsi default
						$('#id_pelajaran').append($('<option>', {
							value: '',
							text: '-- PILIH PELAJARAN'
						}));
						// Looping dan tambahkan opsi berdasarkan data JSON
						response.forEach(function(pelajaran) {
							$('#id_pelajaran').append($('<option>', {
								value: pelajaran.id_pelajaran,
								text: pelajaran.pelajaran
							}));
						});
					}
				});

			});
		});
	</script>
	<script>
		<?php if ($v->status === '0') { ?>
			$('#kirim').hide();
		<?php } else if ($v->status === '1') { ?>
			$('#kirim').show();
			$('#simpan').hide();
		<?php } else { ?>
			$('#kirim').hide();
			$('#simpan').hide();
		<?php } ?>
	</script>
</body>

</html>