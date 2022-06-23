@extends('layout.main')

@section('styles')

@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Tambah User</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Pengelolaan User</li>
        <li class="breadcrumb-item">Tambah</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah User</h4>
                </div>
                <div class="card-body">
                    @include('backend.pengelolaan-user.form', ['action' => route('backend.pengelolaanUser.insert')])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
