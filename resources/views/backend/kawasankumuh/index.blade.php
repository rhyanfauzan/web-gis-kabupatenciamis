@extends('layout.main')

@section('styles')
<meta name="kecamatan-geo-json-url" content="{{ route('backend.kawasankumuh.geojson') }}">
<meta name="geo-json-url" content="{{ route('backend.kawasankumuh.geojsonPoint') }}">
<meta name="icons-base-url" content="{{ asset('assets/img/icon') }}">
<link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<style>
    .tablehead {
        text-decoration: none;
        color: #000;
        font-size: 16px;
    }

    .tablebody {
        text-decoration: none;
        color: #888888;
    }
</style>
@endsection

@section('breadcrumb')
<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Kawasan Kumuh</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('backend.home.index') }}">
            <i data-feather="meh"></i></a>
    </li>
    <li class="breadcrumb-item">Kawasan Kumuh</li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 mb-5">
        <div id="map" class="map-js-height"></div>
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card card-statistic-1">
                    <div class="card-icon" style="background-color: #FFFF00;">
                        <i data-feather="meh"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="padding-20">
                            <div class="text-right">
                                <h3 class="font-light mb-0">
                                    <i class="ti-arrow-up text-success"></i> {{ $total_kawasan_kumuh }}
                                </h3>
                                <span class="text-muted">Total Kawasan Kumuh</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card card-statistic-1">
                    <div class="card-icon l-bg-green">
                        <i class="fas fa-map"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="padding-20">
                            <div class="text-right">
                                <h3 class="font-light mb-0">
                                    <i class="ti-arrow-up text-success"></i> {{ $total_luas_area }} (ha)
                                </h3>
                                <span class="text-muted">Total Luas Wilayah Kumuh</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 mt-2">
        <div class="row justify-content-end">
            <div class="col-4 text-right mb-2">
                <a href="{{ route('backend.kawasankumuh.add') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <p>Daftar Kawasan Kumuh</p>
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-data">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Desa</th>
                                        <th>Nama Area</th>
                                        <th>Luas Area</th>
                                        <th>Foto Area</th>
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
<script src="{{ asset('js/backend/kumuh/index.js') }}"></script>
<script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
<script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script>
    const editUrl = '{{ route('backend.kawasankumuh.edit', ['id' => ':id']) }}'
    const deleteUrl = '{{ route('backend.kawasankumuh.delete', ['id' => ':id']) }}'
    const tableData = $('#table-data').DataTable({
        "processing": true,
        "serverSide": true,
        'dom': "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-right ml-2'B>f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "ajax": {
            "url": '{{ route('backend.kawasankumuh.getData') }}',
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
                "data": "kecamatan.nama",
                'class': 'text-right'
            },
            {
                "data": "desa.nama",
                'class': 'text-right'
            },
            {
                "data": "nama_area",
                'class': 'text-right'
            },
            {
                "data": "luas_area",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    return `${data} ha`;
                }
            },
            {
                "data": "foto_lokasi",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    const image = `{{ asset('') }}${data}`
                    return `<div class="gallery gallery-fw"><div class="gallery-item" data-image="${image}" data-title="${full.nama_pemilik}"></div></div>`;
                }
            },
            {
                "data": "id",
                "render": function(data, type, full, meta) {
                    const actions = []
                    actions.push(`<a href='${editUrl.replace(':id', data)}' class="btn btn-icon btn-success btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Edit"><i class="far fa-edit"></i></a>`)
                    actions.push(`<button onclick="del(${data})" class="btn btn-icon btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Delete"><i class="far fa-trash-alt"></i></button>`)
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

    function del(id) {
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
                        url: "{{ route('backend.kawasankumuh.delete', ['id' => ':id']) }}".replace(':id', id),
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .done(function(msg) {
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