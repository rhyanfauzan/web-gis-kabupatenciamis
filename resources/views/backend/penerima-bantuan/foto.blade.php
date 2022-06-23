@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Tambah foto setelah perbaikan</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.penerimaBantuan.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Penerima Bantuan</li>
        <li class="breadcrumb-item">Foto setelah perbaikan</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Foto setelah perbaikan</h4>
                </div>
                <div class="card-body">
                    @include('backend.penerima-bantuan.tambah-foto')
                </div>
                <div class="card-footer">
                    <!-- <button class="btn btn-primary" id="btn-lanjutkan">Lanjutkan</button>&nbsp; -->
                    <button class="btn btn-success" id="btn-simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    @include('backend.penerima-bantuan.sub-form.script', ['id' => $item->id])
    <script src="{{ asset('js/backend/hunian/form.js') }}"></script>
@endsection
