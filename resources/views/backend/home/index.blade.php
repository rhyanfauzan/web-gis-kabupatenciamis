@extends('layout.main')

@section('style')
<title>{{ config('app.name') }} | Dashboard</title>
<meta name="kecamatan-geo-json-url" content="{{ route('backend.kecamatan.geojson') }}">
<meta name="kumuh-geo-json-url" content="{{ route('backend.kawasankumuh.geojson') }}">
<meta name="bencana-geojson-url" content="{{ route('backend.rawanBencana.geojson') }}">
<meta name="icons-base-url" content="{{ asset('assets/img/icon') }}">
<link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
@endsection

@section('wrapper')
<!-- new wrapper  -->
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
                                <h5 class="my-0">{{ $bentukBangunans[0] }}</h5>
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
                                <h5 class="my-0">{{ $bentukBangunans[1] }}</h5>
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
                                <h5 class="my-0">{{ $bentukBangunans[2] }}</h5>
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
                                <h5 class="my-0">{{ $bentukBangunans[3] }}</h5>
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
                                <h5 class="my-0">{{ $bentukBangunans[4] }}</h5>
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
                    <!-- map  -->
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
                        <!-- map  -->
                        <div id="map" class="map-js-height"></div>
                        <div id="popup" class="ol-popup">
                            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                            <div id="popup-content"></div>
                        </div>
                        <!-- <div id="dashboard-map" style="height: 250px"></div> -->
                        <hr>

                        <div class="mb-4">
                            <p class="mb-2"><i class='bx bxs-home-smile' style='color:#607aea'></i> Jumlah Penghuni <span class="float-end">{{ $jumlahPenduduk }}</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-gradient-scooter" role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mb-2"><i class='bx bxs-home-heart' style='color:#3BB2B7'></i> Jumlah Hunian <span class="float-end">{{ $jumlahHunian }}</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 60%"></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="mb-2"><i class='bx bxs-home bx-flashing' style='color:#ff7577'></i> Tidak layak huni <span class="float-end">{{ $jumlahTidakLayakHuni }}</span></p>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 20%"></div>
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
                                <h5 class="my-0 text-danger">{{$total_kawasan_bencana}}</h5>
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
                                <h5 class="my-0 text-success">{{$total_kawasan_kumuh}}</h5>
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
                                <h5 class="my-0 text-warning">{{ $total_luas_area }} (m<sup>2</sup>)</h5>
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
<!-- end new wrapper  -->

@endsection

@section('script')
<script src="{{ asset('js/backend/home/index.js') }}"></script>
<script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
<script src="assets/bundles/apexcharts/apexcharts.min.js"></script>

<!-- chart skh  -->
<script>
    // chart skh
    var ctx = document.getElementById("chart-skh").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke.addColorStop(0, "#17ead9");
    gradientStroke.addColorStop(1, "#6078ea");

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["SHM ({{ $statusKepemilikans[0] }})", "Hak Beli ({{ $statusKepemilikans[1] }})", "Akta ({{ $statusKepemilikans[2] }})"],
            datasets: [{
                label: "Kepemilikan",
                data: ["{{ $statusKepemilikans[0] }}", "{{ $statusKepemilikans[1] }}", "{{ $statusKepemilikans[2] }}", ],
                backgroundColor: gradientStroke,
                hoverBackgroundColor: gradientStroke,
                borderColor: "#fff",
                pointRadius: 6,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: "#fff",
                borderWidth: 2,
            }, ],
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false,
                labels: {
                    fontColor: "#585757",
                    boxWidth: 40,
                },
            },
            tooltips: {
                displayColors: false,
            },
            scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#585757",
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.08)",
                    },
                }, ],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#585757",
                    },
                    gridLines: {
                        display: false,
                        color: "rgba(0, 0, 0, 0.08)",
                    },
                }, ],
            },
        },
    });
</script>

<!-- chart backlog  -->
<script>
    var ctx = document.getElementById("chart-backlog").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke.addColorStop(0, "#ee0979");
    gradientStroke.addColorStop(1, "#ff6a00");

    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["2021", "2022", "2023", "2024", "2025"],
            datasets: [{
                label: "Backlog",
                data: ["{{$backlogs[0]}}", "{{$backlogs[1]}}", "{{$backlogs[2]}}", "{{$backlogs[3]}}", "{{$backlogs[4]}}"],
                backgroundColor: gradientStroke,
                hoverBackgroundColor: gradientStroke,
                borderColor: "#fff",
                pointRadius: 6,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: "#fff",
                borderWidth: 2,
            }, ],
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: false,
                labels: {
                    fontColor: "#585757",
                    boxWidth: 40,
                },
            },
            tooltips: {
                displayColors: false,
            },
            scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#585757",
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.08)",
                    },
                }, ],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#585757",
                    },
                    gridLines: {
                        display: false,
                        color: "rgba(0, 0, 0, 0.08)",
                    },
                }, ],
            },
        },
    });
</script>

<!-- chart bantuan  -->
<script>
    // chart 7
    var ctx = document.getElementById("chart7").getContext("2d");

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, "rgba(255, 255, 0, 0.5)");
    gradientStroke1.addColorStop(1, "rgba(233, 30, 99, 0.0)");

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, "#ffff00");
    gradientStroke2.addColorStop(1, "#e91e63");

    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, "rgba(0, 114, 255, 0.5)");
    gradientStroke3.addColorStop(1, "rgba(0, 200, 255, 0.0)");

    var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke4.addColorStop(0, "#0072ff");
    gradientStroke4.addColorStop(1, "#00c8ff");

    var myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [" ", "DPRKPLH : {{$bantuanHunian[0]}}", "Baznas : {{$bantuanHunian[1]}}", "Dinsos : {{$bantuanHunian[2]}}", "Lainnya : {{$bantuanHunian[3]}}", " "],
            datasets: [
                // {
                //     label: "Visits",
                //     data: [6, 20, 14, 12, 17, 8, 10],
                //     backgroundColor: gradientStroke1,
                //     borderColor: gradientStroke2,
                //     pointRadius: "0",
                //     pointHoverRadius: "0",
                //     borderWidth: 3,
                // },
                {
                    label: " ",
                    data: ["", "{{$bantuanHunian[0]}}", "{{$bantuanHunian[1]}}", "{{$bantuanHunian[2]}}", "{{$bantuanHunian[3]}}", ""],
                    backgroundColor: gradientStroke3,
                    borderColor: gradientStroke4,
                    pointRadius: "0",
                    pointHoverRadius: "0",
                    borderWidth: 3,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: true,
                labels: {
                    fontColor: "#585757",
                    boxWidth: 40,
                },
            },
            tooltips: {
                enabled: false,
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#585757",
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)",
                    },
                }, ],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#585757",
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)",
                    },
                }, ],
            },
        },
    });
</script>


<!-- new script  -->

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