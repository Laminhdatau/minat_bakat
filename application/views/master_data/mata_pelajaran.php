<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><?= $title ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Beranda</a></li>
						<li class="breadcrumb-item">Master Data</li>
						<li class="breadcrumb-item active"><?= $title ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-lg-10">
									<h4 class="card-title">New Pelajaran</h4>
								</div>
							</div>
						</div>
						<form action="<?= site_url('master_data/mata_pelajaran/new') ?>" method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="mata_pelajaran">Mata Pelajaran</label>
									<input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" placeholder="Mata Pelajaran" required>
								</div>
								<div class="form-group">
									<label for="id_jurusan">Pilih Jurusan</label>
									<select class="form-control" id="id_jurusan" name="id_jurusan" required>
										<option>Pilih Jurusan</option>
										<?php foreach ($jurusan as $p) { ?>
											<option value="<?= $p->id_jurusan ?>"><?= $p->jurusan ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="card-footer justify-content-right">
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</form>
						<!-- /.card -->
					</div>

				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-lg-10">
									<h4 class="card-title">Mata Pelajaran</h4>
								</div>
							</div>
						</div>
						<div class="card-body">
							<table id="tb_kelas" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="width: 5%;">NO</th>
										<th style="width: 45%;">Mata Pelajaran</th>
										<th style="width: 45%;">Jurusan</th>
										<th style="width: 5%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($pelajaran as $v) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $v->pelajaran; ?></td>
											<td><?= $v->jurusan; ?></td>
											<td>
												<a href="<?= base_url('master_data/mata_pelajaran/hapus/' . $v->id_pelajaran) ?>">
													<button class="btn bg-danger btn-xs" title="Hapus Kelas" style="width: 30px;">
														<i class="fas fa-user-minus"></i>
													</button>
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<!-- /.card -->
					</div>
				</div>

			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<!-- jQuery -->
<script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>

<script>
	$(function() {
		$("#tb_kelas").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false
		}).buttons().container().appendTo('#tb_kelas_wrapper .col-md-6:eq(0)');
	});
</script>

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