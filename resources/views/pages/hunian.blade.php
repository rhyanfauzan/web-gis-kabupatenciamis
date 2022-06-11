	@extends("layouts.app")

	@section("style")
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- <link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" /> -->
	@endsection

	@section("wrapper")
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">
			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Hunian</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-buildings"></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Daftar Hunian</li>
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
									<th>Desa</th>
									<th>Luas Tanah</th>
									<th>Luas bangunan</th>
									<th>Foto hunian</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<!-- body  -->
							<tbody>
								<tr>
									<td>Tiger Nixon</td>
									<td>System Architect</td>
									<td>61 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Garrett Winters</td>
									<td>Accountant</td>
									<td>63 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Ashton Cox</td>
									<td>Junior Technical Author</td>
									<td>66 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Cedric Kelly</td>
									<td>Senior Javascript Developer</td>
									<td>22 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Airi Satou</td>
									<td>Accountant</td>
									<td>33 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Brielle Williamson</td>
									<td>Integration Specialist</td>
									<td>61 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Herrod Chandler</td>
									<td>Sales Assistant</td>
									<td>59 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Rhona Davidson</td>
									<td>Integration Specialist</td>
									<td>55 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Colleen Hurst</td>
									<td>Javascript Developer</td>
									<td>39 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Sonya Frost</td>
									<td>Software Engineer</td>
									<td>23 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Jena Gaines</td>
									<td>Office Manager</td>
									<td>30 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Quinn Flynn</td>
									<td>Support Lead</td>
									<td>22 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Charde Marshall</td>
									<td>Regional Director</td>
									<td>36 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Haley Kennedy</td>
									<td>Senior Marketing Designer</td>
									<td>43 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
										</a>
									</td>
									<td>
										<a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
										<a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
								<tr>
									<td>Donna Snider</td>
									<td>Customer Support</td>
									<td>27 m<sup>2</sup></td>
									<td>45 m<sup>2</sup></td>
									<td>
										<a href="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg">
											<img src="https://www.harapanrakyat.com/wp-content/uploads/2020/11/Rumah-Hunian-Minimalis-dengan-Tips-tips-dalam-Merancang-Desain.jpg" alt="Hunian" style="height: 30px">
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
									<th>Desa</th>
									<th>Luas tanah</th>
									<th>Luas bangunan</th>
									<th>Foto hunian</th>
									<th>Action</th>
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
					<div class="card">
						<div class="card-body">
							<div id="simple-map-desa" class="gmaps"></div>
						</div>
					</div>
				</div>
				<!-- card  -->
				<div class="col-lg-3 mx-auto">
					<div class="card radius-10 overflow-hidden">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-primary font-14">Rumah layak huni</p>
									<h5 class="my-0 text-primary">32</h5>
								</div>
								<div class="text-primary ms-auto font-30"><i class='bx bx-home-smile'></i>
								</div>
							</div>
						</div>
					</div>

					<!-- row 3  -->
					<div class="card radius-10 overflow-hidden">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary font-14">Tidak layak huni</p>
									<h5 class="my-0 text-secondary">15</h5>
								</div>
								<div class="text-secondary ms-auto font-30"><i class='bx bx-home-circle'></i>
								</div>
							</div>
						</div>
					</div>

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
	<!-- google maps api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async defer></script>
	<script src="assets/plugins/gmaps/map-custom-script.js"></script>
	<!-- chart  -->
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/chartjs-custom.js"></script>
	@endsection