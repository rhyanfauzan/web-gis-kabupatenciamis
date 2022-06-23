@extends('layout.main')

@section('styles')
    <meta name="geojson-url" content="{{ route('backend.rawanBencana.geojson') }}">
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
            <h4 class="page-title m-b-0">Rawan Bencana</h4>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('backend.home.index') }}">
                <i data-feather="home"></i></a>
        </li>
        <li class="breadcrumb-item">Rawan Bencana</li>
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
                <div class="col-12 mb-1">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="padding-20">
                                <div class="text-right">
                                    <h3 class="font-light mb-0">
                                        <i class="ti-arrow-up text-success"></i> {{ $countBencana }}
                                    </h3>
                                    <span class="text-muted">Kawasan Rawan Bencana</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Berdasarkan Jenis Bencana</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="bentukBangunanChart"></canvas>
        
                            <ul class="p-t-30 list-unstyled">
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-blue"></i></span>Gunung Meletus<span
                                        class="float-right">{{$tipebencanas[0]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-green"></i></span>Tsunami<span
                                        class="float-right">{{$tipebencanas[1]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-orange"></i></span>Longsor<span
                                        class="float-right">{{$tipebencanas[2]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-red"></i></span>Banjir<span
                                        class="float-right">{{$tipebencanas[3]}}</span></li>
                                <li class="padding-5"><span><i class="fa fa-circle m-r-5 col-yellow"></i></span>Puting Beliung<span
                                        class="float-right">{{$tipebencanas[4]}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
           <div class="row">
               <div class="col-12 mb-2">
                   <a href="{{ route('backend.rawanBencana.add') }}" class="btn btn-primary">Tambah</a>
               </div>
               <div class="col-12 mb-2">
                   <div class="card">
                       <div class="card-body">
                           <p>Daftar Kawasan Rawan Bencana</p>

                           <div class="table-responsive">
                               <table class="table table-striped" id="table-data">
                                   <thead>
                                   <tr>
                                       <th class="text-center">
                                           #
                                       </th>
                                       <th>Foto Kawasan Rawan</th>
                                       <th>Nama Area</th>
                                       <th>Kecamatan</th>
                                       <th>Desa</th>
                                       <th>Estimasi Bencana</th>
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
    <script src="{{ asset('js/backend/bencana/index.js') }}"></script>
    <script src="{{ asset('assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/chartjs/chart.min.js') }}"></script>
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <script>
        const editUrl = '{{ route('backend.rawanBencana.edit', ['id' => ':id']) }}'
        const deleteUrl = '{{ route('backend.pengelolaanUser.delete', ['id' => ':id']) }}'

        const tableData = $('#table-data').DataTable({
            "processing": true,
            "serverSide": true,
            'dom':
                "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'<'float-md-right ml-2'B>f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "ajax": {
                "url": '{{ route('backend.rawanBencana.getData') }}',
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
                {
                    "data": "foto_lokasi",
                    'class': 'text-right',
                    "render": function (data, type, full, meta) {
                        const image = `{{ asset('') }}${data}`
                        return `<div class="gallery gallery-fw"><div class="gallery-item" data-image="${image}" data-title="${full.nama_pemilik}"></div></div>`;
                    }},
                {"data": "nama_area", 'class': 'text-right'},
                {"data": "kecamatan.nama", 'class': 'text-right'},
                {"data": "desa.nama", 'class': 'text-right'},
                {
                    "data": "estimasi_waktu_bencana",
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
                        url: "{{ route('backend.rawanBencana.delete', ['id' => ':id']) }}".replace(':id', id),
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

        //CHART
        const ctxBentukBangunanChart = document.getElementById("bentukBangunanChart").getContext("2d");
        const bentukBangunanChart = new Chart(ctxBentukBangunanChart, {
            type: "doughnut",
            data: {
                datasets: [
                    {
                        data: {{ json_encode($tipebencanas) }},
                        backgroundColor: ["#2196f3", "#63ed7a", "#ffa426", "#f44336", "#ffe821"],
                        label: "Tipe Bencana",
                    },
                ],
                labels: ["Gunung Meletus", "Tsunami", "Longsor", "Banjir", "Puting Beliung"],
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
