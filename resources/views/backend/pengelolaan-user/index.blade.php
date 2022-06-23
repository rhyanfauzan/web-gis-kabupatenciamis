@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Pengelolaan User</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Pengelolaan User</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengelolaan User</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a href="{{ route('backend.pengelolaanUser.add') }}" class="btn btn-success float-right">Tambah</a>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-data">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        const editUrl = '{{ route('backend.pengelolaanUser.edit', ['id' => ':id']) }}'
        const deleteUrl = '{{ route('backend.pengelolaanUser.delete', ['id' => ':id']) }}'

        const tableData = $('#table-data').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": '{{ route('backend.pengelolaanUser.getData') }}',
            },
            "columns": [
                {
                    "data": "id",
                    "render": function (data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {"data": "name"},
                {"data": "email"},
                {
                    "data": "role",
                    "render": function (data, type, full, meta) {
                        if (data === 'admin')
                        {
                            return 'Administrator'
                        } else if (data === 'dinas')
                        {
                            return 'Dinas (SPRKPLH)'
                        } else if (data === 'pihak-ketiga')
                        {
                            return 'Pihak Ke-3'
                        }
                        return '-';
                    }
                },
                {
                    "data": "id",
                    "render": function (data, type, full, meta) {
                        const actions = []
                        actions.push(`<a href='${editUrl.replace(':id', data)}' class="btn btn-icon btn-success btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Edit"><i class="far fa-edit"></i></a>`)
                        actions.push(`<button onclick="del(${data})" class="btn btn-icon btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Delete"><i class="far fa-trash-alt"></i></button>`)
                        return actions.join('&nbsp;')
                    }
                }
            ]
        })

        function del(id)
        {
            swal({
                title: "Konfirmasi",
                text: "Apakah anda yakin ingin menghapus data?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('backend.pengelolaanUser.delete', ['id' => ':id']) }}".replace(':id', id),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                        .done(function (msg) {
                            swal("Data berhasil dihapus", {
                                icon: "success",
                            })
                            tableData.ajax.reload()
                        })
                }
            })
        }
    </script>
@endsection
