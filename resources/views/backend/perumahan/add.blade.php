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
            <h4 class="page-title m-b-0">{{$judul}}</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.perumahan.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Perumahan</li>
        <li class="breadcrumb-item">{{$subjudul}}</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{$judul}}</h4>
                </div>
                <div class="card-body">
                    @include('backend.perumahan.form', ['action' => route('backend.perumahan.insert')])
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="btn-lanjutkan">Lanjutkan</button>&nbsp;
                    <button class="btn btn-success" id="btn-simpan" style="display: none">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
    @include('backend.perumahan.sub-form.script', ['action' => route('backend.perumahan.insert')])
    <script src="{{ asset('js/backend/perumahan/form.js') }}"></script>
@endsection
