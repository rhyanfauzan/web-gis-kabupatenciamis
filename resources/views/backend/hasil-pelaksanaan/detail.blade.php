@extends('layout.main')

@section('styles')
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
            <h4 class="page-title m-b-0">Detail Rutilahu</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.usulan.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Rutilahu</li>
        <li class="breadcrumb-item">Detail</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Rutilahu</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="tab-hunian" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="hunian-tab" data-toggle="tab" href="#hunian" role="tab"
                               aria-controls="hunian" aria-selected="true">Informasi Rutilahu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab"
                               aria-controls="keluarga" aria-selected="false">Keluarga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="lokasi-tab" data-toggle="tab" href="#lokasi" role="tab"
                               aria-controls="lokasi" aria-selected="false">Lokasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="hasil-verifikasi-tab" data-toggle="tab" href="#hasil-verifikasi" role="tab"
                               aria-controls="hasil-verifikasi" aria-selected="false">Hasil Verifikasi</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="tab-hunian-content">
                        <div class="tab-pane fade show active" id="hunian" role="tabpanel" aria-labelledby="hunian-tab">
                            @include('backend.usulan.sub-detail.detail-hunian')
                        </div>
                        <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="keluarga-tab">
                            @include('backend.usulan.sub-detail.detail-keluarga')
                        </div>
                        <div class="tab-pane fade" id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                            @include('backend.usulan.sub-detail.detail-lokasi')
                        </div>
                        <div class="tab-pane fade" id="hasil-verifikasi" role="tabpanel" aria-labelledby="hasil-verifikasi-tab">
                            @include('backend.usulan.sub-detail.detail-hasil-verifikasi')
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
    <script src="{{ asset('js/backend/hunian/detail.js') }}"></script>
    @include('backend.usulan.sub-detail.script')
@endsection
