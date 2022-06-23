@extends('layout.main')

@section('styles')
    <meta name="geojson-url" content="{{ route('backend.usulan.geojson') }}">
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

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
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
            <h4 class="page-title m-b-0">Penerima Bantuan</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="archive"></i></a>
        </li>
        <li class="breadcrumb-item">Penerima Bantuan</li>
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

        <div class="col-12">
            <div class="col-12 mb-2" id="tb-resp">
                <div class="card">
                    <div class="card-body">
                        <p>Penerima Bantuan</p>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-data">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Foto Rumah</th>
                                    <th>Nama Pemilik</th>
                                    <th>No.KK</th>
                                    <th>No.KTP</th>
                                    <th>Rekomendasi Penanganan</th>
                                    <th>Verifikator</th>
                                    <th>Pengusul</th>
                                    <th>Rencana Tahun Penanganan</th>
                                    <!-- <th>Nominal</th> -->
                                    <th></th>
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
    <script src="{{ asset('js/backend/usulan/index.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        const editUrl = "{{ route('backend.penerimaBantuan.edit', ['id' => ':id']) }}"
        const fotoUrl = "{{ route('backend.penerimaBantuan.foto', ['id' => ':id']) }}"
        const tableData = $('#table-data').DataTable({
            "processing": true,
            "serverSide": true,
            'dom': "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-right ml-2'B>f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "ajax": {
                "url": "{{ route('backend.penerimaBantuan.getData') }}",
            },
            'buttons': ['csv', {
                'text': '<i class="fa fa-id-badge fa-fw" aria-hidden="true"></i>',
                'action': function(e, dt, node) {

                    $(dt.table().node()).toggleClass('cards');
                    $('.fa', node).toggleClass(['fa-table', 'fa-id-badge']);

                    dt.draw('page');
                },
                'className': 'btn-sm',
                'attr': {
                    'title': 'Change views',
                }
            }],
            "columns": [{
                "data": "id",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    return meta.row + 1;
                }
            },
                {
                    "data": "hunian.foto_hunian",
                    'class': 'text-right',
                    "render": function(data, type, full, meta) {
                        const image = `{{ asset('') }}${data}`
                        return `<div class="gallery gallery-fw"><div class="gallery-item" data-image="${image}" data-title="${full.nama_pemilik}"></div></div>`;
                    }
                },
                {
                    "data": "hunian.nama_pemilik",
                    'class': 'text-right'
                },
                {
                    "data": "hunian.no_kk_pemilik",
                    'class': 'text-right'
                },
                {
                    "data": "hunian.nik_pemilik",
                    'class': 'text-right'
                },
                {
                    "data": "dinas.nama",
                    'class': 'text-right',
                    "render": function(data, type, full, meta) {
                        if (data == undefined || data == "") return "Ditentukan oleh verifikator";
                        return `${data}`;
                    }
                },
                {
                    "data": "verifikator.name",
                    'class': 'text-right',
                    "render": function(data, type, full, meta) {
                        if (data == undefined || data == "") return "Belum ada verifikator";
                        return `${data}`;
                    }
                },
                {
                    "data": "pengusul.name",
                    'class': 'text-right',
                    "render": function(data, type, full, meta) {
                        return `${data}`;
                    }
                },
                {
                    "data": "rencana_tahun_penanganan",
                    "render": function(data, type, full, meta) {
                        if (data == undefined || data == "") return '-'
                        return `${data}`;
                    }
                },
                // {
                //     "data": "penerima_bantuans",
                //     "render": function(data, type, full, meta) {
                //         if (data !== null && data.length > 0)
                //         {
                //             return data[0].nominal
                //         }
                //         return '-'
                //     }
                // },
                {
                    "data": "id",
                    "render": function(data, type, full, meta) {
                        const actions = []
                        const url = editUrl.replace(':id', data);
                        const foto = url.replace('edit', 'foto');
                        actions.push(
                            `<a href="${url}" class="btn btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Update"><i class="fa fa-edit"></i></a>`
                        )
                        actions.push(
                            `<a href="${foto}" class="btn btn-icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Update"><i class="fa fa-camera"></i></a>`
                        )
                        return actions.join('&nbsp;')
                    }
                }
            ],
            'drawCallback': function(settings) {
                const api = this.api();
                const $table = $(api.table().node());

                if ($table.hasClass('cards')) {

                    // Create an array of labels containing all table headers
                    var labels = [];
                    $('thead th', $table).each(function() {
                        labels.push($(this).text());
                    });

                    // Add data-label attribute to each cell
                    $('tbody tr', $table).each(function() {
                        $(this).find('td').each(function(column) {
                            $(this).attr('data-label', labels[column]);
                        });
                    });

                    var max = 0;
                    $('tbody tr', $table).each(function() {
                        max = Math.max($(this).height(), max);
                    }).height(max);

                } else {
                    // Remove data-label attribute from each cell
                    $('tbody td', $table).each(function() {
                        $(this).removeAttr('data-label');
                    });

                    $('tbody tr', $table).each(function() {
                        $(this).height('auto');
                    });
                }

                $(".gallery .gallery-item").each(function() {
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
    </script>
@endsection