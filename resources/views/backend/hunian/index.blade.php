@extends('layout.main')

@section('styles')
<meta name="geojson-url" content="{{ route('backend.hunian.geojson') }}">
<meta name="icons-base-url" content="{{ asset('assets/img/icon') }}">

<link rel="stylesheet" href="{{ asset('assets/bundles/chocolat/dist/css/chocolat.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/home/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/backend/hunian/index.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
<ul class="breadcrumb breadcrumb-style ">
    <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Hunian</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('backend.home.index') }}">
            <i data-feather="home"></i></a>
    </li>
    <li class="breadcrumb-item">Hunian</li>
</ul>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div id="map" class="map-js-height"></div>
                <div id="popup" class="ol-popup">
                    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                    <div id="popup-content"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card card-statistic-1">
                    <div class="card-icon l-bg-green">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="padding-20">
                            <div class="text-right">
                                <h3 class="font-light mb-0">
                                    <i class="ti-arrow-up text-success"></i> {{ $jumlahRumahLayakHuni }}
                                </h3>
                                <span class="text-muted">Rumah Layak Huni</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card card-statistic-1">
                    <div class="card-icon l-bg-red">
                        <i class="fas fa-house-damage"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="padding-20">
                            <div class="text-right">
                                <h3 class="font-light mb-0">
                                    <i class="ti-arrow-up text-danger"></i> {{ $jumlahRumahTidakLayakHuni }}
                                </h3>
                                <span class="text-muted">Tidak Layak Huni</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Status Kepemilikan Hunian</h4>
            </div>
            <div class="card-body">
                <canvas id="donutChart"></canvas>

                <ul class="p-t-30 list-unstyled">
                    <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-blue"></i></span>SHM<span class="float-right">{{ $statusKepemilikans[0] }}</span></li>
                    <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-green"></i></span>Hak
                        Guna<span class="float-right">{{ $statusKepemilikans[1] }}</span></li>
                    <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Akta Jual
                        Beli<span class="float-right">{{ $statusKepemilikans[2] }}</span></li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Table -->
    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-2">
                <a href="{{ route('backend.hunian.add') }}" class="btn btn-primary">Tambah</a>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
            </div>
            

            <!-- EXPORT -->
            <a href="{{ route('backend.hunian.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
            <div class="col-12 mb-2">
                <div class="card">
                    <div class="card-body">
                        <p>Daftar Hunian</p>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-data">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Foto Hunian</th>
                                        <th>Nama Pemilik</th>
                                        <th>Desa</th>
                                        <th>Luas Tanah</th>
                                        <th>Luas Bangunan</th>
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

<div class="modal" id="importExcel" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('backend.hunian.import_excel') }}" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">

                                {{ csrf_field() }}

                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<script src="{{ asset('js/backend/hunian/index.js') }}"></script>
<script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
<script>
    const editUrl = '{{ route('backend.hunian.edit', ['id' => ':id']) }}'
    const deleteUrl = '{{ route('backend.pengelolaanUser.delete', ['id' => ':id']) }}'

    const tableData = $('#table-data').DataTable({
        "processing": true,
        "serverSide": true,
        'dom': "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-right ml-2'B>f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "ajax": {
            "url": '{{ route('backend.hunian.getData') }}',
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
                "data": "foto_hunian",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    const image = `{{ asset('') }}${data}`
                    return `<div class="gallery gallery-fw"><div class="gallery-item" data-image="${image}" data-title="${full.nama_pemilik}"></div></div>`;
                }
            },
            {
                "data": "nama_pemilik",
                'class': 'text-right'
            },
            {
                "data": "desa.nama",
                'class': 'text-right'
            },
            {
                "data": "luas_tanah",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    return `${data} m<sup>2</sup>`;
                }
            },
            {
                "data": "luas_bangunan",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    return `${data} m<sup>2</sup>`;
                }
            },
            {
                "data": "id",
                "render": function(data, type, full, meta) {
                    const actions = []
                    actions.push(
                        `<a href='${editUrl.replace(':id', data)}' class="btn btn-icon btn-success btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Edit"><i class="far fa-edit"></i></a>`
                    )
                    actions.push(
                        `<button onclick="del(${data})" class="btn btn-icon btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-dark" title="Delete"><i class="far fa-trash-alt"></i></button>`
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
                        url: "{{ route('backend.hunian.delete', ['id' => ':id']) }}".replace(':id', id),
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

    const ctx = document.getElementById("donutChart").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            datasets: [{
                data: {{json_encode($statusKepemilikans)}},
                backgroundColor: ["#2196f3", "#63ed7a", "#ffa426"],
                label: "Status Kepemilikan",
            }, ],
            labels: ["SHM", "Hak Guna", "Akta Jual Beli"],
        },
        options: {
            responsive: true,
            legend: {
                position: "bottom",
                display: false,
            },
        },
    });
</script>
@endsection