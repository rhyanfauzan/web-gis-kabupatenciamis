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
            <h4 class="page-title m-b-0">Tambah Data Pelaksanaan</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.usulan.index') }}">
                <i data-feather="smile"></i></a>
        </li>
        <li class="breadcrumb-item">Hasil Pelaksanaan</li>
        <li class="breadcrumb-item">Tambah</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Usulan</h4>
                </div>
                <div class="card-body">
                    @include('backend.hasil-pelaksanaan.form', ['action' => route('backend.hunian.insertFinal')])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-steps/jquery.steps.min.js') }}"></script>
    @include('backend.hasil-pelaksanaan.sub-form.script', ['action' => route('backend.hunian.insertFinal')])
    <script src="{{ asset('js/backend/hunian/form.js') }}"></script>
@endsection
