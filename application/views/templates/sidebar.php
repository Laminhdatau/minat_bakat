		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">


			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-item">
							<div class="user-panel mt-3 pb-3 mb-3 d-flex">
								<div class="image">
									<img src="<?= base_url('public/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
								</div>
								<div class="info">
									<font color="white">
									<p>
										<?= $this->session->userdata('nama') ?> &ensp;&ensp;
									</p>
									</font>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('dashboard') ?>" class="nav-link <?php if ($title == "Beranda") {
																						echo "active";
																					} ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Beranda
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('data_awal') ?>" class="nav-link <?php if ($title == "Data Awal") {
																						echo "active";
																					} ?>">
								<i class="nav-icon fas fa-calendar-alt"></i>
								<p>
									Data Awal
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('data_akhir') ?>" class="nav-link <?php if ($title == "Data Akhir") {
																						echo "active";
																					} ?>">
								<i class="nav-icon fas fa-calendar-check"></i>
								<p>
									Data Akhir
								</p>
							</a>
						</li>

						<?php if ($this->session->userdata('id_role') == 1) { ?>
							<li class="nav-item">
								<a href="<?= base_url('user_management') ?>" class="nav-link <?php if ($title == "User Management") {
																									echo "active";
																								} ?>">
									<i class="nav-icon fas fa-user"></i>
									<p>
										User Management
									</p>
								</a>
							</li>
							<li class="nav-item <?php if ($title == "Jenis User") {
													echo "menu-open";
												} elseif ($title == "Jurusan") {
													echo "menu-open";
												} elseif ($title == "Mata Pelajaran") {
													echo "menu-open";
												} ?>">
								<a href="#" class="nav-link <?php if ($title == "Jenis User") {
																echo "active";
															} elseif ($title == "Jurusan") {
																echo "active";
															} elseif ($title == "Mata Pelajaran") {
																echo "active";
															} ?>">
									<i class="nav-icon fas fa-brain"></i>
									<p>
										Master Data
									</p>
									<i class="right fas fa-angle-left"></i>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url('master_data/jenis_user') ?>" class="nav-link <?php if ($title == "Jenis User") {
																												echo "active";
																											} ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Jenis User</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('master_data/jurusan') ?>" class="nav-link <?php if ($title == "Jurusan") {
																												echo "active";
																											} ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Jurusan</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url('master_data/mata_pelajaran') ?>" class="nav-link <?php if ($title == "Mata Pelajaran") {
																													echo "active";
																												} ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Mata Pelajaran</p>
										</a>
									</li>
								</ul>
							</li>
						<?php } ?>

						<li class="nav-item">
							<a href="<?= base_url('auth/logout') ?>" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									Log Out
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
