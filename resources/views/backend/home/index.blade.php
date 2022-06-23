@extends('layout.main')

@section('styles')
    <meta name="kecamatan-geo-json-url" content="{{ route('backend.kecamatan.geojson') }}">
    <meta name="kumuh-geo-json-url" content="{{ route('backend.kawasankumuh.geojson') }}">
    <meta name="bencana-geojson-url" content="{{ route('backend.rawanBencana.geojson') }}">
    <meta name="icons-base-url" content="{{ asset('assets/img/icon') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Dashboard</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Dashboard</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div id="map" class="map-js-height"></div>
            <div id="popup" class="ol-popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon l-bg-green">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{ $jumlahPenduduk }}
                                    </h3>
                                    <span class="text-muted">Jumlah Penghuni</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon l-bg-purple">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{ $jumlahHunian }}
                                    </h3>
                                    <span class="text-muted">Jumlah Hunian</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 mb-3">
                    <div class="card card-statistic-1">
                        <div class="card-icon l-bg-red">
                            <i class="fas fa-house-damage"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{ $jumlahTidakLayakHuni }}
                                    </h3>
                                    <span class="text-muted">Tidak Layak Huni</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jumlah hunian yang mendapatkan bantuan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="bantuan-hunian"></canvas>

                            <ul class="p-t-30 list-unstyled">
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-blue"></i></span>DPRKPLH<span
                                        class="float-right">{{$bantuanHunian[0]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-green"></i></span>Dinsos<span
                                        class="float-right">{{$bantuanHunian[1]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Baznas<span
                                        class="float-right">{{$bantuanHunian[2]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Lainnya<span
                                            class="float-right">{{$bantuanHunian[3]}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Backlog</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="Backlog"></canvas>

                            <ul class="p-t-30 list-unstyled">
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-blue"></i></span>Tahun 2021<span
                                        class="float-right">{{$backlogs[0]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-green"></i></span>Tahun 2022<span
                                        class="float-right">{{$backlogs[1]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Tahun 2023<span
                                        class="float-right">{{$backlogs[2]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Tahun 2024<span
                                            class="float-right">{{$backlogs[3]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Tahun 2025<span
                                                class="float-right">{{$backlogs[4]}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{$total_kawasan_bencana}}
                                    </h3>
                                    <span class="text-muted">Total Kawasan Rawan Bencana</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon" style="background-color: #FFFF00;">
                            <i data-feather="meh"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{$total_kawasan_kumuh}}
                                    </h3>
                                    <span class="text-muted">Total Kawasan Kumuh</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon l-bg-green">
                            <i class="fas fa-map"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{ $total_luas_area }} (m<sup>2</sup>)
                                    </h3>
                                    <span class="text-muted">Total Luas Wilayah Kumuh</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Status Kepemilikan Hunian</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="statusKepemilikanHunianChart"></canvas>

                            <ul class="p-t-30 list-unstyled">
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-blue"></i></span>SHM<span
                                        class="float-right">{{ $statusKepemilikans[0] }}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-green"></i></span>Hak Guna<span
                                        class="float-right">{{ $statusKepemilikans[1] }}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Akta Jual Beli<span
                                        class="float-right">{{ $statusKepemilikans[2] }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Berdasarkan Bentuk Bangunan</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="bentukBangunanChart"></canvas>

                            <ul class="p-t-30 list-unstyled">
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-blue"></i></span>Apartemen<span
                                        class="float-right">{{ $bentukBangunans[0] }}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-green"></i></span>Deret<span
                                        class="float-right">{{ $bentukBangunans[1] }}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Kopel<span
                                        class="float-right">{{ $bentukBangunans[2] }}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-red"></i></span>Rusunawa<span
                                        class="float-right">{{ $bentukBangunans[3] }}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-yellow"></i></span>Tunggal<span
                                        class="float-right">{{ $bentukBangunans[4] }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/backend/home/index.js') }}"></script>
    <script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <script>
        const ctxStatusKepemilikanHunianChart = document.getElementById("statusKepemilikanHunianChart").getContext("2d");
        const statusKepemilikanHunianChart = new Chart(ctxStatusKepemilikanHunianChart, {
            type: "bar",
            data: {
                datasets: [
                    {
                        data: {{ json_encode($statusKepemilikans) }},
                        backgroundColor: ["#2196f3", "#63ed7a", "#ffa426"],
                        label: "Status Kepemilikan",
                    },
                ],
                labels: ["SHM", "Hak Guna", "Akta Jual Beli"],
            },
            options: {
                responsive: true,
                legend: {
                    position: "bottom",
                    display: false,
                },
            },
        });

        const ctxBentukBangunanChart = document.getElementById("bentukBangunanChart").getContext("2d");
        const bentukBangunanChart = new Chart(ctxBentukBangunanChart, {
            type: "bar",
            data: {
                datasets: [
                    {
                        data: {{ json_encode($bentukBangunans) }},
                        backgroundColor: ["#2196f3", "#63ed7a", "#ffa426", "#f44336", "#ffe821"],
                        label: "Bentuk Bangunan",
                    },
                ],
                labels: ["Apartemen", "Deret", "Kopel", "Rusunawa", "Tunggal"],
            },
            options: {
                responsive: true,
                legend: {
                    position: "top",
                    display: false,
                },
            },
        });

        const bantuanHunianChart = document.getElementById("bantuan-hunian").getContext("2d");
        const bantuanHunianBars = new Chart(bantuanHunianChart, {
            type: "bar",
            data: {
                datasets: [
                    {
                        data: {{ json_encode($bantuanHunian) }},
                        backgroundColor: ["#2196f3", "#63ed7a", "#ffa426", "#f44336", "#ffe821", "#FFFF00"],
                        label: "Hunian",
                    },
                ],
                labels: ["DPRKPLH", "Dinsos", "Baznas", "Lainnya"],
            },
            options: {
                responsive: true,
                legend: {
                    position: "top",
                    display: false,
                },
            },
        });

        const BacklogChart = document.getElementById("Backlog").getContext("2d");
        const BacklogChart2 = new Chart(BacklogChart, {
            type: "bar",
            data: {
                datasets: [
                    {
                        data: {{ json_encode($backlogs) }},
                        backgroundColor: ["#2196f3", "#63ed7a", "#ffa426", "#f44336", "#ffe821", "#FFFF00"],
                        label: "Backlog",
                    },
                ],
                labels: ["2021", "2022", "2023", "2024", "2025"],
            },
            options: {
                responsive: true,
                legend: {
                    position: "top",
                    display: false,
                },
            },
        });

        const options = {
            series: [{{ $persentaseTerhubungListrik }}],
            chart: {
                height: 300,
                type: "radialBar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: "70%",
                        background: "#00ff001C",
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: "front",
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24,
                        },
                    },
                    track: {
                        background: "#fff",
                        strokeWidth: "67%",
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            opacity: 0.3,
                            blur: 6,
                            left: -10,
                            top: 0,
                        },
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: "#888",
                            fontSize: "17px",
                        },
                        value: {
                            formatter: function (val) {
                                return parseInt(val);
                            },
                            color: "#111",
                            fontSize: "36px",
                            show: true,
                        },
                    },
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    type: "horizontal",
                    shadeIntensity: 0.5,
                    gradientToColors: ["#ABE5A1"],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100],
                },
            },
            stroke: {
                lineCap: "round",
            },
            labels: ["Persen"],
        };

        const terhubungListrikChart = new ApexCharts(document.querySelector("#terhubungListrikChart"), options);
        terhubungListrikChart.render();
    </script>
@endsection
