@extends('layout.main')

@section('styles')
    <meta name="kecamatan-geo-json-url" content="{{ route('backend.kecamatan.geojson') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">

    @endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Tambah Backlog</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.backlog.index') }}">
                <i data-feather="target"></i></a>
        </li>
        <li class="breadcrumb-item">Backlog</li>
        <li class="breadcrumb-item">Tambah</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Backlog</h4>
                </div>
                <div class="card-body">
                    @if (isset($menu))
                        @include('backend.backlog.form', ['action' => route('backend.backlog.update')])
                    @else
                        @include('backend.backlog.form', ['action' => route('backend.backlog.insert')])
                    @endif
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="btn-simpan">Simpan</button>&nbsp;
                    <button class="btn btn-success" id="btn-simpan" style="display: none">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (isset($menu))
        @include('backend.backlog.sub-form.script', ['action' => route('backend.backlog.update')])
    @else
        @include('backend.backlog.sub-form.script', ['action' => route('backend.backlog.insert')])
    @endif

@endsection
