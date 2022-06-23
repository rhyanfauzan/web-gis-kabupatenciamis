@extends('layout.main')

@section('styles')
    <meta name="geojson-url" content="{{ route('backend.verifikasiUsulan.geojson') }}">
    <meta name="icons-base-url" content="{{ asset('assets/img/icon') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Detail Usulan Di Daftar Tunggu</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.verifikasiUsulan.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Detail Usulan Di Daftar Tunggu</li>
        <li class="breadcrumb-item">Detail</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Usulan Di Daftar Tunggu</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="tab-hunian" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="hunian-tab" data-toggle="tab" href="#hunian" role="tab"
                               aria-controls="hunian" aria-selected="true">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab"
                               aria-controls="keluarga" aria-selected="false">Kumpulan Foto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="lokasi-tab" data-toggle="tab" href="#lokasi" role="tab"
                               aria-controls="lokasi" aria-selected="false">Informasi Bangunan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hasil-verifikasi-tab" data-toggle="tab" href="#hasil-verifikasi" role="tab"
                               aria-controls="hasil-verifikasi" aria-selected="false">Informasi Pengusul</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="tab-hunian-content">
                        <div class="tab-pane fade show active" id="hunian" role="tabpanel" aria-labelledby="hunian-tab">
                            @include('backend.verifikasi-usulan.sub-detail.detail-informasi-dasar')
                        </div>
                        <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                            @include('backend.verifikasi-usulan.sub-detail.detail-foto', ['label' => 'Prasarana', 'jenisFotos' => ['Jaringan Jalan','Saluran Pembuangan Air Limbah','Drainase','TPS']])
                        </div>
                        <div class="tab-pane fade" id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                            @include('backend.verifikasi-usulan.sub-detail.detail-informasi-bangunan')
                        </div>
                        <div class="tab-pane fade" id="hasil-verifikasi" role="tabpanel" aria-labelledby="hasil-verifikasi-tab">
                            @include('backend.verifikasi-usulan.sub-detail.detail-informasi-pengusul')
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
    <script src="{{ asset('js/backend/usulan/index.js') }}"></script>
    @include('backend.verifikasi-usulan.sub-detail.script')
@endsection
