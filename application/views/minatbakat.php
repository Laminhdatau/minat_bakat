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

					<?php if ($v->status == '0') { ?>
						<p class="login-box-msg">Pilih Minat</p>

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

									<input type="number" class="form-control" id="nis" name="nis" placeholder="NIS" readonly value="<?= $this->session->userdata('nis'); ?>">

								</div>
							</div>
						</div>


						<!-- Bagian JURUSAN 1 -->
						<div class="input-group mb-3">
							<div class="row col-12">

								<div class="col-6">
									<select name="id_jurusan[1]" id="id_jurusan[1]" class="form-control select-jurusan" required>
										<option>--JURUSAN 1--</option>
										<?php foreach ($jurusan as $p) { ?>
											<option value="<?= $p->id_jurusan; ?>"><?= $p->jurusan; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-6">
									<select name="id_pelajaran[1]" id="id_pelajaran[1]" class="form-control pelajaran-dropdown" required>

									</select>
								</div>
							</div>
						</div>

						<!-- Bagian JURUSAN 2 -->
						<div class="input-group mb-3">
							<div class="row col-12">

								<div class="col-6">
									<select name="id_jurusan[2]" id="id_jurusan[2]" class="form-control select-jurusan" required>
										<option>--JURUSAN 2 --</option>

										<?php foreach ($jurusan as $p) { ?>
											<option value="<?= $p->id_jurusan; ?>"><?= $p->jurusan; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-6">
									<select name="id_pelajaran[2]" id="id_pelajaran[2]" class="form-control pelajaran-dropdown" required>

									</select>
								</div>
							</div>
						</div>

						<!-- Bagian JURUSAN 2 -->
						<div class="input-group mb-3">
							<div class="row col-12">

								<div class="col-6">
									<select name="id_jurusan[3]" id="id_jurusan[3]" class="form-control select-jurusan" required>
										<option>--JURUSAN 3 --</option>

										<?php foreach ($jurusan as $p) { ?>
											<option value="<?= $p->id_jurusan; ?>"><?= $p->jurusan; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-6">
									<select name="id_pelajaran[3]" id="id_pelajaran[3]" class="form-control pelajaran-dropdown" required>

									</select>
								</div>
							</div>
						</div>



						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI 1</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilai[1]" id="nilai[1]" class="form-control" min="10" max="100" placeholder="Masukan Nilai 1" required>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI 2</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilai[2]" id="nilai[2]" class="form-control" min="10" max="100" placeholder="Masukan Nilai 2" required>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI 3</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilai[3]" id="nilai[3]" class="form-control" min="10" max="100" placeholder="Masukan Nilai 3" required>
								</div>
							</div>
						</div>



						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KEAKTIFAN 1</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilaiaktif[1]" id="nilaiaktif[1]" class="form-control" min="10" max="100" placeholder="Masukan nilaiaktif KEAKTIFAN 1" required>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KEAKTIFAN 2</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilaiaktif[2]" id="nilaiaktif[2]" class="form-control" min="10" max="100" placeholder="Masukan NILAI KEAKTIFAN 2" required>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KEAKTIFAN 3</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilaiaktif[3]" id="nilaiaktif[3]" class="form-control" min="10" max="100" placeholder="Masukan NILAI KEAKTIFAN 3" required>
								</div>
							</div>
						</div>





						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KETERAMPILAN 1</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilaitampil[1]" id="nilaitampil[1]" class="form-control" min="10" max="100" placeholder="Masukan NILAI KETERAMPILAN 1" required>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KETERAMPILAN 2</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilaitampil[2]" id="nilaitampil[2]" class="form-control" min="10" max="100" placeholder="Masukan NILAI KETERAMPILAN 2" required>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KETERAMPILAN 3</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="number" name="nilaitampil[3]" id="nilaitampil[3]" class="form-control" min="10" max="100" placeholder="Masukan NILAI KETERAMPILAN 3" required>
								</div>
							</div>
						</div>


					<?php } elseif ($v->status == '1') { ?>



						<p class="login-box-msg">Tekan Kirim Untuk Mengirim</p>

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

									<input type="number" class="form-control" id="nis" name="nis" placeholder="NIS" readonly value="<?= $this->session->userdata('nis'); ?>">

								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>MAPEL 1</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data1['pelajaran']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>MAPEL 2</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data2['pelajaran']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>MAPEL 3</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data3['pelajaran']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI 1</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data1['nilai']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI 2</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data2['nilai']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI 3</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data3['nilai']; ?>" readonly>
								</div>
							</div>
						</div>


						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KEAKTIFAN 1</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data1['nilaktif']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KEAKTIFAN 2</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data2['nilaktif']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KEAKTIFAN 3</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data3['nilaktif']; ?>" readonly>
								</div>
							</div>
						</div>



						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KETERAMPILAN 1</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data1['niltampil']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KETERAMPILAN 2</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data2['niltampil']; ?>" readonly>
								</div>
							</div>
						</div>

						<div class="input-group mb-3">
							<div class="row col-12">
								<div class="col-4">
									<div class="input-group-append">
										<div class="input-group-text">
											<span><b>NILAI KETERAMPILAN 3</b></span>
										</div>
									</div>
								</div>
								<div class="col-8">
									<input type="text" class="form-control" placeholder="<?= $data3['niltampil']; ?>" readonly>
								</div>
							</div>
						</div>


					<?php } else { ?>
						<p class="login-box-msg">Terima Kasih Sudah Berpartisipasi</p>
					<?php } ?>

					<div class="row">
						<?php if ($v->status == '0' || $v->status == '1') { ?>
							<div class="col-4">
								<a href="<?= base_url('dashboard'); ?>" type="reset" class="btn btn-secondary btn-block">Kembali</a>
							</div>
						<?php } else { ?>
							<div class="col-12">
								<a href="<?= base_url('dashboard'); ?>" type="reset" class="btn btn-secondary btn-block">Kembali</a>
							</div>
						<?php } ?>

						<?php if ($v->status == '1') { ?>
							<div class="col-4">
								<a href="<?= base_url('minat/hapus/' . $this->session->userdata('nis')); ?>" id="hapus" class="btn btn-danger btn-block">Hapus</a>
							</div>
						<?php } ?>

						<?php if ($v->status == '0') { ?>
							<div class="col-4">
							</div>
							<div class="col-4">
								<button type="submit" id="simpan" class="btn btn-primary btn-block">Simpan</button>
							</div>
						<?php } ?>

						<?php if ($v->status == '1') { ?>
							<div class="col-4">
								<a href="<?= base_url('minat/kirim/' . $this->session->userdata('nis')); ?>" id="kirim" class="btn btn-info btn-block">Kirim</a>
							</div>
						<?php } ?>

					</div>

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
		$(document).ready(function() {
			function populatePelajaranOptions(jurusanDropdown, pelajaranDropdown) {
				var id_jurusan = $(jurusanDropdown).val();
				console.log(id_jurusan);
				$.ajax({
					url: '<?= base_url('minat/getMapelByJurusan') ?>',
					dataType: 'json',
					method: 'post',
					data: {
						id_jurusan: id_jurusan
					},
					success: function(response) {
						console.log(response);
						$(pelajaranDropdown).empty();

						$(pelajaranDropdown).append($('<option>', {
							value: '',
							text: '--PELAJARAN--'
						}));

						response.forEach(function(pelajaran) {
							$(pelajaranDropdown).append($('<option>', {
								value: pelajaran.id_pelajaran,
								text: pelajaran.pelajaran
							}));
						});
					}
				});
			}


			$('.select-jurusan').change(function() {
				var pelajaranDropdown = $(this).closest('.input-group').find('.form-control.pelajaran-dropdown');
				populatePelajaranOptions(this, pelajaranDropdown);
			});

			$('.select-jurusan').each(function() {
				var pelajaranDropdown = $(this).closest('.input-group').find('.form-control.pelajaran-dropdown');
				populatePelajaranOptions(this, pelajaranDropdown);
			});
		});
	</script>





</body>

</html>