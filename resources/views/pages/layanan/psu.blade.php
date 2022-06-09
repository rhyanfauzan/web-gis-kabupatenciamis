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
				<div class="breadcrumb-title pe-3">Prasarana sarana utilitas umum
				</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-receipt'></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Daftar PSU
							</li>
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
									<th>Nama</th>
									<th>Keterangan</th>
									<th>Desa</th>
									<th>Kecamatan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<!-- body  -->
							<tbody>
								<tr>
									<td>Tiger Nixon</td>
									<td>Umum</td>
									<td>Cigayam </td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Garrett Winters</td>
									<td>Umum</td>
									<td>Cigayam </td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Ashton Cox</td>
									<td>Umum</td>
									<td>Cigayam </td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Cedric Kelly</td>
									<td>Umum</td>
									<td>Cigayam </td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Airi Satou</td>
									<td>Umum</td>
									<td>Cigayam </td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Brielle Williamson</td>
									<td>Umum</td>
									<td>Cigayam </td>
									<td>Buni Seuri</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Herrod Chandler</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Buni Seuri</td>
									<td>

										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Rhona Davidson</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Buni Seuri</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Colleen Hurst</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Buni Seuri</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Sonya Frost</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Buni Seuri</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Jena Gaines</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Buni Seuri</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Quinn Flynn</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Charde Marshall</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Haley Kennedy</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
								<tr>
									<td>Donna Snider</td>
									<td>Umum</td>
									<td>Girimukti</td>
									<td>Cikijing</td>
									<td>
										<a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>

								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Nama</th>
									<th>Keterangan</th>
									<th>Desa</th>
									<th>Kecamatan</th>
									<th>Aksi</th>
								</tr>
							</tfoot>
						</table>
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
	@endsection