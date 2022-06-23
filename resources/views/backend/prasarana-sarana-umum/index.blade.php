@extends('layout.main')

@section('styles')
    <meta name="geojson-url" content="{{ route('backend.prasaranaSaranaUmum.geojson') }}">
    <meta name="icons-base-url" content="{{ asset('assets/img/icon') }}">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/hunian/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Prasarana Sarana Utilitas Umum</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="archive"></i></a>
        </li>
        <li class="breadcrumb-item">Prasarana Sarana Utilitas Umum</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-5">
            <div id="map" class="map-js-height"></div>
            <div id="popup" class="ol-popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
        </div>

        <div class="col-12 mb-2">
            <div class="col-12 text-right mb-2">
                <a href="{{ route('backend.prasaranaSaranaUmum.add') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <p>Daftar PSU</p>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table-data">
                            <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/backend/prasarana-sarana-umum/index.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>

        const detailUrl = '{{ route('backend.prasaranaSaranaUmum.detail', ['id' => ':id']) }}'
        const editUrl = '{{ route('backend.prasaranaSaranaUmum.edit', ['id' => ':id']) }}'
        const deleteUrl = '{{ route('backend.prasaranaSaranaUmum.delete', ['id' => ':id']) }}'

        const tableData = $('#table-data').DataTable({
            "processing": true,
            "serverSide": true,
            'dom':
                "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-right ml-2'B>f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "ajax": {
                "url": '{{ route('backend.prasaranaSaranaUmum.getData') }}',
            },
            'buttons': [ 'csv', {
                'text': '<i class="fa fa-id-badge fa-fw" aria-hidden="true"></i>',
                'action': function (e, dt, node) {

                    $(dt.table().node()).toggleClass('cards');
                    $('.fa', node).toggleClass(['fa-table', 'fa-id-badge']);

                    dt.draw('page');
                },
                'className': 'btn-sm',
                'attr': {
                    'title': 'Change views',
                }
            }],
            "columns": [
                {
                    "data": "id",
                    'class': 'text-right',
                    "render": function (data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {"data": "nama"},
                {"data": "keterangan"},
                {"data": "desa.nama"},
                {"data": "kecamatan.nama"},
                {
                    "data": "id",
                    "render": function (data, type, full, meta) {
                        const actions = []
                        actions.push(`<a href='${detailUrl.replace(':id', data)}' class="btn btn-icon btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Detail"><i class="far fa-eye"></i></a>`)
                        actions.push(`<a href='${editUrl.replace(':id', data)}' class="btn btn-icon btn-success btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Edit"><i class="far fa-edit"></i></a>`)
                        actions.push(`<button onclick="del(${data})" class="btn btn-icon btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Delete"><i class="far fa-trash-alt"></i></button>`)
                        return actions.join('&nbsp;')
                    }
                }
            ],
            'drawCallback': function (settings) {
                const api = this.api();
                const $table = $(api.table().node());

                if ($table.hasClass('cards')) {

                    // Create an array of labels containing all table headers
                    var labels = [];
                    $('thead th', $table).each(function () {
                        labels.push($(this).text());
                    });

                    // Add data-label attribute to each cell
                    $('tbody tr', $table).each(function () {
                        $(this).find('td').each(function (column) {
                            $(this).attr('data-label', labels[column]);
                        });
                    });

                    var max = 0;
                    $('tbody tr', $table).each(function () {
                        max = Math.max($(this).height(), max);
                    }).height(max);

                } else {
                    // Remove data-label attribute from each cell
                    $('tbody td', $table).each(function () {
                        $(this).removeAttr('data-label');
                    });

                    $('tbody tr', $table).each(function () {
                        $(this).height('auto');
                    });
                }
            }
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
                        url: "{{ route('backend.prasaranaSaranaUmum.delete', ['id' => ':id']) }}".replace(':id', id),
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
