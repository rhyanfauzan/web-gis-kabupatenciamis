@extends('layout.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
    <style>
        .tablehead{
        text-decoration: none;
        color: #000;
        font-size: 16px;
        }
        .tablebody{
        text-decoration: none;
        color: #888888;
        }
    </style>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-style ">
        <li class="breadcrumb-item">
            <h4 class="page-title m-b-0">Backlog</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="target"></i></a>
        </li>
        <li class="breadcrumb-item">Backlog</li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 text-right mb-2">
            <a href="{{ route('backend.backlog.add') }}" class="btn btn-primary">Tambah</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Backlog</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="col-md-12 mb-3">
                            <a href="#" class="btn btn-success float-right">Tambah</a>
                        </div> -->
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-data">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Kecamatan</th>
                                        <th>Jumlah KK</th>
                                        <th>Jumlah Penduduk</th>
                                        <th>Jumlah Rumah</th>
                                        <th>Backlog</th>
                                        <th>Tanggal</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Kabupaten Ciamis</th>
                                            <th>Total : {{$jumlah_kk}}</th>
                                            <th>Total : {{$jumlah_penduduk}}</th>
                                            <th>Total : {{$jumlah_rumah}}</th>
                                            <th>Total : {{$backlog}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    

                </div>
            </div>
            <div class="row justify-content-center">
            <nav aria-label="...">
            </nav>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        const editUrl = '{{ route('backend.backlog.edit', ['id' => ':id']) }}'
        const deleteUrl = '{{ route('backend.backlog.delete', ['id' => ':id']) }}'
          const tableData = $('#table-data').DataTable({
            "processing": true,
            "serverSide": true,
            'dom':
                "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-right ml-2'B>f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "ajax": {
                "url": '{{ route('backend.backlog.getData') }}',
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
                {"data": "kecamatan.nama", 'class': 'text-right'},
                {"data": "jumlah_kk", 'class': 'text-right'},
                {"data": "jumlah_penduduk", 'class': 'text-right'},
                {"data": "jumlah_rumah", 'class': 'text-right'},
                {
                    "data": "backlog",
                    'class': 'text-right',
                    "render": function (data, type, full, meta) {
                        return `${data}`;
                    }
                },
                {
                    "data": "tgl",
                    'class': 'text-right',
                    "render": function (data, type, full, meta) {
                        return `${data}`;
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

                $(".gallery .gallery-item").each(function () {
                    const me = $(this);

                    me.attr("href", me.data("image"));
                    me.attr("title", me.data("title"));
                    if (me.parent().hasClass("gallery-fw")) {
                        me.css({
                            height: me.parent().data("item-height"),
                        });
                        me.find("div").css({
                            lineHeight: me.parent().data("item-height") + "px",
                        });
                    }
                    me.css({
                        backgroundImage: 'url("' + me.data("image") + '")'
                    });
                });
                $(".gallery").Chocolat({
                    className: "gallery",
                    imageSelector: ".gallery-item",
                });
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
                        url: "{{ route('backend.backlog.delete', ['id' => ':id']) }}".replace(':id', id),
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
