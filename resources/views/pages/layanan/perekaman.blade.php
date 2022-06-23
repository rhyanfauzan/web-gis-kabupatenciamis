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
				<div class="breadcrumb-title pe-3">Perekaman</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-receipt'></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Daftar perekaman</li>
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
									<th>NIK</th>
									<th>Luas tanah</th>
									<th>Luas bangunan</th>
									<th>Status</th>
								</tr>
							</thead>
							<!-- body  -->
							<tbody>
								<tr>
									<td>Tiger Nixon</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										2407 m<sup>2</sup>
									</td>
									<td><span class="badge bg-success">Sukses</span></td>

								</tr>
								<tr>
									<td>Garrett Winters</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										2407 m<sup>2</sup>
									</td>
									<td><span class="badge bg-success">Sukses</span></td>

								</tr>
								<tr>
									<td>Ashton Cox</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										2407 m<sup>2</sup>
									</td>
									<td><span class="badge bg-success">Sukses</span></td>

								</tr>
								<tr>
									<td>Cedric Kelly</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										2407 m<sup>2</sup>
									</td>
									<td><span class="badge bg-success">Sukses</span></td>

								</tr>
								<tr>
									<td>Airi Satou</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										2407 m<sup>2</sup>
									</td>
									<td><span class="badge bg-success">Sukses</span></td>

								</tr>
								<tr>
									<td>Brielle Williamson</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>1800 m<sup>2</sup></td>
									<td>
										2407 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Herrod Chandler</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>1800 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Rhona Davidson</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>1800 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Colleen Hurst</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>1800 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Sonya Frost</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>1800 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Jena Gaines</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>1800 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Quinn Flynn</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Charde Marshall</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Haley Kennedy</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
								<tr>
									<td>Donna Snider</td>
									<td>1101</td>
									<td>14-05-2020</td>
									<td>2600 m<sup>2</sup></td>
									<td>
										1240 m<sup>2</sup>
									</td>
									<td><span class="badge bg-light text-dark">Pending</span></td>

								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Nama pemilik</th>
									<th>No. KK</th>
									<th>NIK</th>
									<th>Luas tanah</th>
									<th>Luas bangunan</th>
									<th>Status</th>
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