	@extends("layouts.app")

	@section("style")
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	@endsection

	@section("wrapper")
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Usulan</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-list-ol'></i></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Daftar Usulan</li>
						</ol>
					</nav>
				</div>
				<div class="ms-auto">
					<button type="button" class="btn btn-primary px-3 align-content-center"><i class='bx bxs-plus-circle'></i>Tambah</button>
				</div>
			</div>
			<!--end breadcrumb-->
			<!-- table  -->
			<!-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> -->
			<hr />
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="example2" class="table table-striped table-bordered">
							<!-- judul  -->
							<thead>
								<tr>
									<th>Nama pemilik</th>
									<th>No. KK</th>
									<th>No. KTP</th>
									<th>Diusulkan kepada</th>
									<th>Verifikator</th>
									<th>Status verifikasi</th>
									<th>Pesan</th>
									<th>Pengusul</th>
									<th>Foto rumah</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<!-- body  -->
							<tbody>
								<tr>
									<td>Tiger Nixon</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										PT. Sampoerna
									</td>
									<td>Belum diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Garrett Winters</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										PT. Sampoerna
									</td>
									<td>Belum diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Ashton Cox</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										PT. Sampoerna
									</td>
									<td>Belum diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Cedric Kelly</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										PT. Sampoerna
									</td>
									<td>Belum diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Airi Satou</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										PT. Sampoerna
									</td>
									<td>Belum diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Brielle Williamson</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Waskita</td>
									<td>
										PT. Sampoerna
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Herrod Chandler</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Waskita</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Rhona Davidson</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Waskita</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Colleen Hurst</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Waskita</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Sonya Frost</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Waskita</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Jena Gaines</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Waskita</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Quinn Flynn</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Charde Marshall</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Haley Kennedy</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										Wijayakarta
									</td>
									<td>Diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Donna Snider</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>Adhi Karya</td>
									<td>
										Wijayakarta
									</td>
									<td>Belum diverifikasi</td>
									<td></td>
									<td></td>
									<td>
										<a href="https://parboaboa.com/data/foto_berita/min1-western.webp">
											<img src="https://parboaboa.com/data/foto_berita/min1-western.webp" alt="Rumah" style="height: 40px;">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Nama pemilik</th>
									<th>No. KK</th>
									<th>No. KTP</th>
									<th>Diusulkan kepada</th>
									<th>Verifikator</th>
									<th>Status verifikasi</th>
									<th>Pesan</th>
									<th>Pengusul</th>
									<th>Foto rumah</th>
									<th>Aksi</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<hr>
			<!-- map & chart -->
			<div class="row">
				<!-- map  -->
				<div class="col-lg-9 mx-auto">
					<!-- <h6 class="text-uppercase">Area rawan bencana</h6> -->
					<!-- <hr /> -->
					<!-- chart  -->
					<!-- <h6 class="mb-0 text-uppercase">Doughnut Chart</h6> -->
					<!-- <hr /> -->
					<div class="card">
						<div class="card-body">
							<div class="chart-container1">
								<canvas id="chart-hunian"></canvas>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>
	<!--end page wrapper -->
	@endsection

	@section("script")
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'print']
			});

			table.buttons().container()
				.appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	</script>

	<!-- chart  -->
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/chartjs-custom.js"></script>
	@endsection