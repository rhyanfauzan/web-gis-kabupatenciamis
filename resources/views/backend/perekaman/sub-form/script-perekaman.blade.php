<script>
    //Tambah data hunian
    let fotoHunian = ''
    $("#file-foto-hunian").fileinput(getFileInputOptions('foto-hunian'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoHunian = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        }).on('fileselect', function(event, numFiles, label) {
            $("#file-foto-hunian").fileinput('upload')
        })

    let fotoDinding = ''
    $("#file-foto-dinding").fileinput(getFileInputOptions('foto-dinding'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoDinding = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-dinding").fileinput('upload')
    })

    let fotoKamarMandi = ''
    $("#file-foto-kamar-mandi").fileinput(getFileInputOptions('foto-kamar-mandi'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoKamarMandi = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-kamar-mandi").fileinput('upload')
    })

    let fotoMck = ''
    $("#file-foto-mck").fileinput(getFileInputOptions('foto-mck'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoMck = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-mck").fileinput('upload')
    })

    $('#status-kepemilikan').select2({
        tags: false
    })

    /*$('#layak-huni-y').on('click', function (){
        toggleLayakHuni()
    })

    $('#layak-huni-t').on('click', function (){
        toggleLayakHuni()
    })

    function toggleLayakHuni()
    {
        if ($('#layak-huni-y').is(':checked') === 0)
        {
            $('#kondisi-rumah-container').attr('style', 'display: none')
        } else {
            $('#kondisi-rumah-container').attr('style', 'display: block')
        }
    }*/

    $('#dibangun-oleh-pengembang-y').on('click', function (){
        toggleNamaPengembang()
    })

    $('#dibangun-oleh-pengembang-t').on('click', function (){
        toggleNamaPengembang()
    })

    function toggleNamaPengembang()
    {
        if ($('#dibangun-oleh-pengembang-y').is(':checked') === 0)
        {
            $('#nama-pengembang-container').attr('style', 'display: none')
        } else {
            $('#nama-pengembang-container').attr('style', 'display: block')
        }
    }

    $('#memiliki-imb-y').on('click', function (){
        toggleNomorImb()
    })

    $('#memiliki-imb-t').on('click', function (){
        toggleNomorImb()
    })

    function toggleNomorImb()
    {
        if ($('#memiliki-imb-y').is(':checked') === 0)
        {
            $('#nomor-imb-container').attr('style', 'display: none')
        } else {
            $('#nomor-imb-container').attr('style', 'display: block')
        }
    }

    let fotoAtap = ''
    $("#file-foto-atap").fileinput(getFileInputOptions('foto-atap'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoAtap = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-atap").fileinput('upload')
    })

    let fotoLantai = ''
    $("#file-foto-lantai").fileinput(getFileInputOptions('foto-lantai'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoLantai = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-lantai").fileinput('upload')
    })

    let fotoSumberAirMinum = ''
    $("#file-foto-sumber-air-minum").fileinput(getFileInputOptions('foto-sumber-air-minum'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoSumberAirMinum = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-sumber-air-minum").fileinput('upload')
    })

    $('#status-kepemilikan').select2({
        tags: false
    })

    let fotoHunianFinal = ''
    $("#file-foto-hunian-final").fileinput(getFileInputOptions('foto-hunian'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoHunianFinal = previewId.response.filename
            console.log(fotoHunianFinal);
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        }).on('fileselect', function(event, numFiles, label) {
            $("#file-foto-hunian").fileinput('upload')
        })

    let fotoMckFinal = ''
    $("#file-foto-mck-final").fileinput(getFileInputOptions('foto-mck'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoMckFinal = previewId.response.filename
            console.log(fotoMckFinal);
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-mck").fileinput('upload')
    })

    let fotoPemilik = ''
    $("#file-foto-pemilik").fileinput(getFileInputOptions('foto-pemilik'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoPemilik = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-pemilik").fileinput('upload')
    })

    $('#pendapatan-keluarga').select2({
        tags: false
    })

    // $('#luas-bangunan').on('keyup', function () {
    //     const luasBangunan = parseFloat($('#luas-bangunan').val())
    //     const jumlahKeluarga = parseFloat($('#jumlah-keluarga').val())
    //     const luasBangunanPerkapita = luasBangunan / jumlahKeluarga
    //     $('#luas-bangunan-perkapita').val(luasBangunanPerkapita)
    // })
    /*$('#layak-huni-y').on('click', function (){
        toggleLayakHuni()
    })

    $('#layak-huni-t').on('click', function (){
        toggleLayakHuni()
    })

    function toggleLayakHuni()
    {
        if ($('#layak-huni-y').is(':checked') === 0)
        {
            $('#kondisi-rumah-container').attr('style', 'display: none')
        } else {
            $('#kondisi-rumah-container').attr('style', 'display: block')
        }
    }*/

    $('#dibangun-oleh-pengembang-y').on('click', function (){
        toggleNamaPengembang()
    })

    $('#dibangun-oleh-pengembang-t').on('click', function (){
        toggleNamaPengembang()
    })

    function toggleNamaPengembang()
    {
        if ($('#dibangun-oleh-pengembang-y').is(':checked') === 0)
        {
            $('#nama-pengembang-container').attr('style', 'display: none')
        } else {
            $('#nama-pengembang-container').attr('style', 'display: block')
        }
    }

    $('#memiliki-imb-y').on('click', function (){
        toggleNomorImb()
    })

    $('#memiliki-imb-t').on('click', function (){
        toggleNomorImb()
    })

    function toggleNomorImb()
    {
        if ($('#memiliki-imb-y').is(':checked') === 0)
        {
            $('#nomor-imb-container').attr('style', 'display: none')
        } else {
            $('#nomor-imb-container').attr('style', 'display: block')
        }
    }



    //Disable Next Button First
    // $(document).ready(function() {
    //     $('a[href="#next"]').parent().addClass("disabled").attr("aria-disabled", "true");
    //     $('a[href="#next"]').attr('href', '#');
    // });

    //Validasi Data
    var btncek = $("#btn-cek-keluarga");
    var text = $("#no-kk-pemilik-feedback");
    var formtext = $("#no-kk-pemilik");
    btncek.on('click', function() {

        var form = new FormData();
        form.append("no_kk", $("#no-kk-pemilik").val());

        $.ajax({
            method: "POST",
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            url: "{{ route('backend.hunian.cekKK') }}",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: form,
            success: function(result) {
                console.log(result)
                if (result.data == null) {
                    formtext.attr('class', 'form-control is-invalid');
                    text.attr('class', 'badge badge-danger');
                    text.html('Data Hunian Tidak Ditemukan');
                } else {
                    formtext.attr('class', 'form-control is-valid');
                    text.attr('class', 'badge badge-success');
                    text.html('Data Hunian Ditemukan');

                    $('a[href="#"]').parent().removeClass("disabled").attr("aria-disabled",
                        "false");
                    $('a[href="#"]').attr('href', '#next');
                }
                if (result.data2.length > 0 && result.data != null) {
                    formtext.attr('class', 'form-control is-invalid');
                    text.attr('class', 'badge badge-danger');
                    text.html('Sudah pernah menerima bantuan 5 tahun terakhir');
                }
                if (result.data2.length <= 0 && result.data != null) {
                    formtext.attr('class', 'form-control is-valid');
                    text.attr('class', 'badge badge-success');
                    text.html('Belum pernah menerima bantuan 5 tahun terakhir');

                    $('a[href="#"]').parent().removeClass("disabled").attr("aria-disabled",
                        "false");
                    $('a[href="#"]').attr('href', '#next');
                }

                $('#nama-pemilik').val(result.data.nama_pemilik);
                $('#nik-pemilik').val(result.data.nik_pemilik);
                $('#tanggal-lahir').val(result.data.tanggal_lahir_pemilik);
                $('#no-telepon-pemilik').val(result.data.no_telepon_pemilik);
                $('#email-pemilik').val(result.data.email_pemilik);
                $('#jumlah-keluarga').val(result.data.jumlah_keluarga);
                $('#pendapatan-keluarga').val(result.data.pendapatan_keluarga_id).change();
                $('#foto-pemilik').attr('src', '{{ url('') }}/' + result.data.foto_pemilik);
                $('#status-kepemilikan').val(result.data.status_kepemilikan_id).change();
                $('#luas-tanah').val(result.data.luas_tanah);
                $('#luas-bangunan').val(result.data.luas_bangunan);
                $('#luas-bangunan-perkapita').val(result.data.luas_bangunan / result.data
                    .jumlah_keluarga);
                if (result.data.tersedia_listrik == 'y') {
                    $('#tersedia-listrik-y').prop('checked', true);
                } else {
                    $('#tersedia-listrik-t').prop('checked', true);
                }
                if (result.data.septic_tank == 'y') {
                    $('#septic-tank-y').prop('checked', true);
                } else {
                    $('#septic-tank-t').prop('checked', true);
                }
                if (result.data.memiliki_imb == 'y') {
                    $('#memiliki-imb-y').prop('checked', true);
                } else {
                    $('#memiliki-imb-t').prop('checked', true);
                }
                $('#foto-atap').attr('src', '{{ url('') }}/' + result.data.kondisi_atap);
                $('#foto-dinding').attr('src', '{{ url('') }}/' + result.data
                    .kondisi_dinding);
                $('#foto-lantai').attr('src', '{{ url('') }}/' + result.data.kondisi_lantai);
                $('#foto-kamar-mandi').attr('src', '{{ url('') }}/' + result.data
                    .kondisi_kamar_mandi);
                $('#foto-mck').attr('src', '{{ url('') }}/' + result.data.kondisi_mck);
                $('#foto-sumber-airminum').attr('src', '{{ url('') }}/' + result.data.kondisi_sumber_air_minum);
                $('#alamat-detail').val(result.data.alamat_detail);
                idHunian = result.data.id;
            },
            error: function(error) {
                alert("Maaf server sedang sibuk, cobalah beberapa saat lagi");
            }
        });
    })

    // input data penerima bantuan
    $('#rencana-tahun-penanganan').select2();

    function getFileInputOptions(jenis) {
        return {
            'uploadUrl': "{{ route('backend.upload.do') }}",
            'previewFileType': 'any',
            'uploadAsync': true,
            'maxFileSize': 5120,
            'allowedFileExtensions': ['jpg', 'jpeg', 'png'],
            'overwriteInitial': true,
            'showUpload': true,
            'uploadExtraData': function(previewId, index) {
                return {
                    '_token': '{{ csrf_token() }}',
                    'jenis': jenis,
                }
            }
        }
    }


    const btnEditSimpan = $('#btn-simpan-edit');
    const editUrl = "{{ route('backend.penerimaBantuan.update', ['id' => ':id']) }}"
    // console.log(edit);

    // btnEditSimpan.on('click', function() {
    //     console.log($('#rencana-tahun-penanganan').val());
    //     console.log($('#nominal').val());
    //     try {
    //         $.ajax({
    //                 method: "POST",
    //                 url: `${edit}`,
    //                 headers: {
    //                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //                 },
    //                 data: {
    //                     rencana_tahun_penanganan: $('#rencana-tahun-penanganan').val(),
    //                     nominal: $('#nominal').val(),
    //                 }
    //             })
    //             .done(function(result) {
    //                 if (result.success == false) {
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Error',
    //                         text: `${result.message}`,
    //                         onBeforeOpen: () => {
    //                             Swal.showLoading()
    //                         },
    //                     })
    //                 }
    //                 console.log(result);
    //                 // if('{{Auth::user()->role}}' == 'admin')
    //                 window.location.href = "{{ route('backend.penerimaBantuan.index') }}"
    //                 // if('{{Auth::user()->role}}' == 'pihak-ketiga')
    //                 // window.location.href = "{{ route('backend.penerimaBantuan.index') }}"
    //             })
    //     } catch (error) {
    //         console.log(error.toString());
    //     }

    // })


    const updateUrl = "{{ route('backend.penerimaBantuan.updateFoto', ['id' => ':id']) }}"
    // const btnSimpan = $('#btn-simpan');

    // btnSimpan.on('click', function() {
    //     console.log(update);
    //     console.log(fotoHunian);
    //     console.log(fotoMck);
    //     try {
    //         $.ajax({
    //                 method: "POST",
    //                 url: `${update}`,
    //                 headers: {
    //                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //                 },
    //                 data: {
    //                     foto_rumah: fotoHunian,
    //                     foto_mck: fotoMck,
    //                 }
    //             })
    //             .done(function(result) {
    //                 console.log(result);
    //                 if ('{{Auth::user()->role}}' == 'admin')
    //                     window.location.href = "{{ route('backend.hasilPelaksanaan.index') }}"
    //                 if ('{{Auth::user()->role}}' == 'pihak-ketiga')
    //                     window.location.href = "{{ route('backend.hasilPelaksanaan.index') }}"
    //             })
    //     } catch (error) {
    //         console.log(error.toString());
    //     }

    // })

</script>
