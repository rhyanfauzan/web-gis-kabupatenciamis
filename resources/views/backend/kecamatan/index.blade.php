@extends('layout.main')

@section('styles')
    <meta name="kecamatan-geo-json-url" content="{{ route('backend.kecamatan.geojson') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
    <style>
        .tablehead {
            text-decoration: none;
            color: #000;
            font-size: 16px;
        }

        .tablebody {
            text-decoration: none;
            color: #888888;
        }

    </style>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Kecamatan</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="map"></i></a>
        </li>
        <li class="breadcrumb-item">Kawasan Kumuh</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 mb-5">
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
                        <div class="card-icon" style="background-color: #8C489F;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{ $total_kecamatan }}
                                    </h3>
                                    <span class="text-muted">Total Kecamatan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
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
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/backend/kecamatan/index.js') }}"></script>
    <script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endsection
