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
        <h4 class="page-title m-b-0">Usulan</h4>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('backend.home.index') }}">
            <i data-feather="archive"></i></a>
    </li>
    <li class="breadcrumb-item">Usulan</li>
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
        <div class="card">
            <div class="card-header">
                <h4>Usulan Penerima Bantuan Rutilahu</h4>
            </div>
            <div class="card-body">
                <canvas id="bentukBangunanChart"></canvas>

                <ul class="p-t-30 list-unstyled">
                    <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-blue"></i></span>DPRKPLH<span class="float-right">{{$usulans[0]}}</span></li>
                    <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-green"></i></span>Dinsos<span class="float-right">{{$usulans[1]}}</span></li>
                    <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Baznas<span class="float-right">{{$usulans[2]}}</span></li>
                    <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-red"></i></span>Lainnya<span class="float-right">{{$usulans[3]}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-2">
                @if (Auth::user()->role == 'pihak-ketiga')
                <a href="{{ route('backend.hunian.add') }}" class="btn btn-primary">Tambah</a>
                @else
                <a href="{{ route('backend.usulan.add') }}" class="btn btn-primary">Tambah</a>
                @endif
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
                <label class="switch">
                    <input type="checkbox" id="toggle">
                    <span class="slider round"></span>
                </label>
            </div>

            <a href="{{ route('backend.usulan.export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
            <div class="col-12 mb-2" id="tb-resp">
                <div class="card">
                    <div class="card-body">
                        <p>Usulan Penerima Bantuan</p>
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
                                        <th>Diusulkan Kepada</th>
                                        <th>Verifikator</th>
                                        <th>Status Verifikasi</th>
                                        <th>Pesan</th>
                                        <th>Pengusul</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2" id="tb-resp2">
                <div class="card">
                    <div class="card-body">
                        <p>Daftar Hunian</p>

                        <div class="table-responsive">
                            <table class="table table-striped" id="table-data2">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama Pemilik</th>
                                        <th>Nomor KK</th>
                                        <th>NIK</th>
                                        <th>Luas Tanah</th>
                                        <th>Luas Bangunan</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hunians as $row)
                                    <tr>
                                        <td class="text-center">
                                            #
                                        </td>
                                        <td>{{$row->nama_pemilik}}</td>
                                        <td>{{$row->no_kk_pemilik}}</td>
                                        <td>{{$row->nik_pemilik}}</td>
                                        <td>{{$row->luas_tanah}}</td>
                                        <td>{{$row->luas_bangunan}}</td>
                                        @if ($row->status == 1)
                                        <td class="text-center">
                                            <div class="bade badge-success">
                                                Diterima
                                            </div>
                                        </td>
                                        @elseif ($row->status == 0)
                                        <td class="text-center">
                                            <div class="bade badge-warning">
                                                Pending
                                            </div>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <div class="bade badge-danger">
                                                Ditolak
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
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
                    <form method="post" action="{{ route('backend.usulan.import_excel') }}" enctype="multipart/form-data">
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
<script src="{{ asset('js/backend/usulan/index.js') }}"></script>
<script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
<script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#tb-resp2').hide();
    });

    $('#toggle').change(function() {
        if ($(this).prop('checked')) {
            $('#tb-resp').hide();
            $('#tb-resp2').show(); //checked
        } else {
            $('#tb-resp').show();
            $('#tb-resp2').hide(); //not checked
        }
    });

    const tableData = $('#table-data').DataTable({
        "processing": true,
        "serverSide": true,
        'dom': "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-right ml-2'B>f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        "ajax": {
            "url": "{{ route('backend.usulan.getData') }}",
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
                "data": "status",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    switch (Number(data)) {
                        case 0:
                            console.log(`data : ${data}`);
                            return '<div class="badge badge-warning">Pending</div>'
                            break;
                        case 1:
                            return '<div class="badge badge-success">Diterima</div>'
                            break;
                        case 2:
                            return '<div class="badge badge-danger">Ditolak</div>'
                        case 3:
                            return '<div class="badge badge-success">Telah diproses</div>'
                            break;
                        default:
                            return "Invalid"
                            break;
                    }
                }
            },
            {
                "data": "pesan",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    if (data == undefined || data == "")
                        return "-"
                    return `${data}`;
                }
            },
            {
                "data": "pengusul.name",
                'class': 'text-right',
                "render": function(data, type, full, meta) {
                    if (data == undefined || data == "")
                        return "-"
                    return `${data}`;
                }
            },
            {
                "data": "id",
                "render": function(data, type, full, meta) {
                    const actions = []
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
                        url: "{{ route('backend.usulan.delete',['id' => ':id']) }}".replace(':id', id),
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

    // const ctxBentukBangunanChart = document.getElementById("bentukBangunanChart").getContext("2d");
    // const bentukBangunanChart = new Chart(ctxBentukBangunanChart, {
    //     type: "bar",
    //     data: {
    //         datasets: [{
    //             data: {
    //                 {
    //                     json_encode($usulans)
    //                 }
    //             },
    //             backgroundColor: ["#2196f3", "#63ed7a", "#ffa426", "#f44336", "#ffe821"],
    //             label: "Usulan Penerima Bantuan",
    //         }, ],
    //         labels: ["DPRKPLH", "Dinsos", "Baznas", "Lainnya"],
    //     },
    //     options: {
    //         responsive: true,
    //         legend: {
    //             position: "top",
    //             display: false,
    //         },
    //     },
    // });
</script>
@endsection