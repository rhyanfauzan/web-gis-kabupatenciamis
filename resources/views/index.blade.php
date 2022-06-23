@extends("layout.main")
@section("style")
<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
@endsection


@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">

        <!-- row card  -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary font-14">Apartemen</p>
                                <h5 class="my-0">0</h5>
                            </div>
                            <div class="text-primary ms-auto font-30"><i class='bx bx-building'></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1" id="chart1"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary font-14">Deret</p>
                                <h5 class="my-0">62</h5>
                            </div>
                            <div class="text-danger ms-auto font-30"><i class='bx bx-building-house'></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1" id="chart2"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary font-14">Kopel</p>
                                <h5 class="my-0">13</h5>
                            </div>
                            <div class="text-success ms-auto font-30"><i class='bx bx-building-house'></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1" id="chart3"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary font-14">Rusunawa</p>
                                <h5 class="my-0">9</h5>
                            </div>
                            <div class="text-warning ms-auto font-30"><i class='bx bx-buildings'></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1" id="chart4"></div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary font-14">Rumah Tunggal</p>
                                <h5 class="my-0">151</h5>
                            </div>
                            <div class="text-info ms-auto font-30"><i class='bx bx-home'></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1" id="chart5"></div>
                </div>
            </div>
        </div>
        <!--end row-->

        <!-- Map  -->
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8">
                <div class="card radius-10">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Map</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="dashboard-map" style="height: 250px"></div>
                        <hr>

                        <div class="mb-4">
                            <p class="mb-2"><i class='bx bxs-home-smile' style='color:#607aea'></i> Jumlah Penghuni <span class="float-end">165</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-gradient-scooter" role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mb-2"><i class='bx bxs-home-heart' style='color:#3BB2B7'></i> Jumlah Hunian <span class="float-end">100</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 65%"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mb-2"><i class='bx bxs-home bx-flashing' style='color:#ff7577'></i> Tidak layak huni <span class="float-end">50</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- big chart  -->
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Jumlah hunian yang mendapatkan bantuan</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-container-0">
                            <canvas id="chart7"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 col-xl-4">

                <!-- row 1 -->
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-danger font-14">Total Kawasan Rawan Bencana</p>
                                <h5 class="my-0 text-danger">12</h5>
                            </div>
                            <div class="text-danger ms-auto font-30"><i class='bx bx-dizzy'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row 2 -->
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-success font-14">Total Kawasan Kumuh</p>
                                <h5 class="my-0 text-success">32</h5>
                            </div>
                            <div class="text-success ms-auto font-30"><i class='bx bx-confused'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row 3  -->
                <div class="card radius-10 overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-warning font-14">Total Luas Wilayah Kumuh</p>
                                <h5 class="my-0 text-warning">192982 (m<sup>2</sup>)</h5>
                            </div>
                            <div class="text-warning ms-auto font-30"><i class='bx bxs-map-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SKH  -->
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Status Kepemilikan Hunian</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-container-0">
                            <canvas id="chart-skh"></canvas>
                        </div>
                    </div>
                </div>

                <!-- backlog  -->
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Backlog</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-container-0">
                            <canvas id="chart-backlog"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End Row-->

    </div>
</div>
@endsection


@section("script")
<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<!--Morris JavaScript -->
<script src="assets/plugins/raphael/raphael-min.js"></script>
<script src="assets/plugins/morris/js/morris.js"></script>
<script src="assets/js/index2.js"></script>
@endsection