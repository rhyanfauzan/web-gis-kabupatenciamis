		@extends("layouts.app")


		@section("wrapper")
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Map</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-map-alt'></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Desa</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="text-uppercase">Kawasan kumuh</h6>
						<hr />
						<div class="card">
							<div class="card-body">
								<div id="simple-map-desa" class="gmaps"></div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		@endsection


		@section("script")
		<!-- google maps api -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async defer></script>
		<script src="assets/plugins/gmaps/map-custom-script.js"></script>
		@endsection