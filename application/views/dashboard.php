

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
					<!-- Small boxes (Stat box) -->
					<br><br>
					<hr><br><br>
					<div class="row">
						<div class="col-lg-1 col-8"></div>
						<div class="col-lg-10 col-8">
							<h3>Selamat Datang <b><?= $this->session->userdata('nama'); ?></b>, Di Aplikasi Bakat Dan Minat Bimbingan Konseling</h3>
						</div>
						<div class="col-lg-1 col-8"></div>
					</div>
					<br><br>
					<hr><br><br>
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>


<!-- jQuery -->
<script src="<?= base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
