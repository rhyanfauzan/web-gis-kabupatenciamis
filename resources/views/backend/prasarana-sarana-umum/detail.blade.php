@extends('layout.main')

@section('styles')
    <meta name="icons-base-url" content="{{ asset('assets/img/icon') }}">
    <meta name="geojson-url" content="{{ route('backend.prasaranaSaranaUmum.geojson') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Detail Prasarana Sarana Utilitas Umum</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.prasaranaSaranaUmum.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Prasarana Sarana Utilitas Umum</li>
        <li class="breadcrumb-item">Detail</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail PSU</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="tab-hunian" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="hunian-tab" data-toggle="tab" href="#hunian" role="tab"
                               aria-controls="hunian" aria-selected="true">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab"
                               aria-controls="keluarga" aria-selected="false">Foto Prasarana</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="lokasi-tab" data-toggle="tab" href="#lokasi" role="tab"
                               aria-controls="lokasi" aria-selected="false">Foto Sarana</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hasil-verifikasi-tab" data-toggle="tab" href="#hasil-verifikasi" role="tab"
                               aria-controls="hasil-verifikasi" aria-selected="false">Foto Utilitas</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="tab-hunian-content">
                        <div class="tab-pane fade show active" id="hunian" role="tabpanel" aria-labelledby="hunian-tab">
                            @include('backend.prasarana-sarana-umum.sub-detail.detail-informasi-dasar')
                        </div>
                        <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                            @include('backend.prasarana-sarana-umum.sub-detail.detail-foto', ['label' => 'Prasarana', 'jenisFotos' => ['Jaringan Jalan','Saluran Pembuangan Air Limbah','Drainase','TPS']])
                        </div>
                        <div class="tab-pane fade" id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                            @include('backend.prasarana-sarana-umum.sub-detail.detail-foto', ['label' => 'Sarana', 'jenisFotos' => ['Ibadah', 'Perniagaan', 'Pelayanan Umum dan Pemerintahan', 'Pendidikan', 'Kesehatan', 'Rekreasi dan Olahraga', 'Pemakaman', 'Pertamanan dan RTH', 'Parkir', 'Persampahan']])
                        </div>
                        <div class="tab-pane fade" id="hasil-verifikasi" role="tabpanel" aria-labelledby="hasil-verifikasi-tab">
                            @include('backend.prasarana-sarana-umum.sub-detail.detail-foto', ['label' => 'Utilitas', 'jenisFotos' => ['Air bersih','Listrik','Telepon','Gas', 'Transportasi', 'Pemadam Kebakaran', 'Sarana Penerangan Jalan Umum']])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/backend/prasarana-sarana-umum/index.js') }}"></script>
    @include('backend.prasarana-sarana-umum.sub-detail.script')
@endsection
