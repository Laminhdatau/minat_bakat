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
			<!-- /.row -->
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Awal</h4>
				</div>
				<div class="card-body">

					<table id="user_table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 5%;">NO</th>
								<th style="width: 10%;">NIS</th>
								<th style="width: 25%;">Nama Siswa</th>
								<th style="width: 25%;">Alamat</th>
								<th style="width: 20%;">Email</th>
								<th style="width: 10%;">Jurusan</th>
								<th style="width: 5%;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($user as $v) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $v->nis; ?></td>
									<td><?= $v->nama; ?></td>
									<td><?= $v->alamat; ?></td>
									<td><?= $v->email; ?></td>
									<td>
										<?php
										$jurusan = $v->jurusan;
										$jurray = explode(',', $jurusan);

										foreach ($jurray as $value) {
											echo $value . "<br>";
										}
										?>
									</td>
<td>
									<button class="btn bg-info btn-xs btn-edit" style="width: 30px;" data-toggle="modal" data-target="#baru" data-id="<?= $v->nis ?>">
										<i class="fas fa-eye"></i>
									</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /.card -->
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<div class="modal fade" id="baru">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Data Awal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="nis">NIS</label>
					<input type="text" class="form-control" id="nis" name="nis" disabled>
				</div>
				<div class="form-group">
					<label for="nama">Nama Siswa</label>
					<input type="text" class="form-control" id="nama" name="nama" disabled>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea class="form-control" id="alamat" name="alamat" disabled></textarea>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" disabled>
				</div>
				
				<table id="pilihan_pelajaran" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 10%;">NO</th>
							<th style="width: 90%;">Pelajaran Pilihan</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>

<script>
	$(function() {
		$("#user_table").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false
		}).buttons().container().appendTo('#user_table_wrapper .col-md-6:eq(0)');
	});

	$(function() {
		$("#pilihan_pelajaran").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false
		}).buttons().container().appendTo('#pilihan_pelajaran_wrapper .col-md-6:eq(0)');
	});
</script>

<script>
	$(document).on("click", ".btn-edit", function() {
		var nis = $(this).data('id');
		$('#pilihan_pelajaran tbody').empty();
		$.ajax({
			url: "<?= base_url('data_awal/getById/') ?>" + nis,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('#nis').val(data.data.nis);
				$('#nama').val(data.data.nama);
				$('#alamat').val(data.data.alamat);
				$('#email').val(data.data.email);
				$.ajax({
					url: "<?= base_url('data_awal/getDataTable/') ?>" + nis,
					type: "GET",
					dataType: "JSON",
					success: function(response) {
						$.each(response, function(i, item) {
							console.log(item);
							var row = '<tr><td>' + (i + 1) + '</td><td>' + item.pelajaran + '</td></tr>';
							$('#pilihan_pelajaran tbody').append(row);
						});
					}
				});
			}
		});
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