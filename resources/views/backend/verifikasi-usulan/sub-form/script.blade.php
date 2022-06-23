<script>
    let halaman = 'hunian'
    var idHunian;
    function getFileInputOptions(jenis)
    {
        return {
            'uploadUrl': '{{ route('backend.upload.do') }}',
            'previewFileType': 'any',
            'uploadAsync': true,
            'maxFileSize': 5120,
            'allowedFileExtensions': ['jpg', 'jpeg', 'png'],
            'overwriteInitial': true,
            'showUpload': true,
            'uploadExtraData': function (previewId, index) {
                return {
                    '_token': '{{ csrf_token() }}',
                    'jenis': jenis,
                }
            }
        }
    }

    const formHunian = $('#form-hunian'), formKeluarga = $('#form-keluarga'), formLokasi = $('#form-lokasi')

    const btnLanjutkan = $('#btn-lanjutkan'), btnSimpan = $('#btn-simpan')
    btnLanjutkan.on('click', function ()
    {
        if (halaman === 'hunian')
        {
            formHunian.attr('style', 'display: none')
            formKeluarga.attr('style', 'display: block')
            halaman = 'keluarga'
        } else if (halaman === 'keluarga')
        {
            formKeluarga.attr('style', 'display: none')
            formLokasi.attr('style', 'display: block')
            btnLanjutkan.attr('style', 'display: none')
            btnSimpan.attr('style', 'display: block')
            halaman = 'lokasi'
            window.updateMap()
        }
    })

    btnSimpan.on('click', function (){
        $.ajax({
            method: "POST",
            url: "{{ $action }}",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                desa_id: $('#desa').val(),
                status_kepemilikan_id: $('#status-kepemilikan').val(),
                bentuk_bangunan_id: $('#bentuk-bangunan').val(),
                pendapatan_keluarga_id: $('#pendapatan-keluarga').val(),
                foto_hunian: fotoHunian,
                luas_tanah: $('#luas-tanah').val(),
                luas_bangunan: $('#luas-bangunan').val(),
                layak_huni: 'b',
                tersedia_listrik: $('input[name=tersedia_listrik]').val(),
                dibangun_oleh_pengembang: $('input[name=dibangun_oleh_pengembang]').val(),
                memiliki_imb: $('input[name=memiliki_imb]').val(),
                nama_pengembang: $('#nama-pengembang').val(),
                nomor_imb: $('#nomor-imb').val(),
                foto_pemilik: fotoPemilik,
                nama_pemilik: $('#nama-pemilik').val(),
                nik_pemilik: $('#nik-pemilik').val(),
                no_kk_pemilik: $('#no-kk-pemilik').val(),
                tanggal_lahir_pemilik: $('#tanggal-lahir').val(),
                no_telepon_pemilik: $('#no-telepon-pemilik').val(),
                email_pemilik: $('#email-pemilik').val(),
                jumlah_keluarga: $('#jumlah-keluarga').val(),
                alamat_detail: $('#alamat-detail').val(),
                latitude: latitude,
                longitude: longitude,
                kondisi_atap: fotoAtap,
                kondisi_dinding: fotoDinding,
                kondisi_lantai: fotoLantai,
                kondisi_kamar_mandi: fotoKamarMandi,
                kondisi_mck: fotoMck,
                kondisi_sumber_air_minum: fotoSumberAirMinum,
                septic_tank: $('input[name=septic_tank]').val(),
                luas_bangunan_perkapita: $('#luas-bangunan-perkapita').val(),

            }
        })
            .done(function (msg) {
                window.location.href = '{{ route('backend.hunian.index') }}'
            })
    })
    $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "div",
        transitionEffect: "slideLeft",
        autoFocus: true,
        onFinished: function (event, currentIndex) {

            var form = new FormData();
            form.append("hunian_id", idHunian);
            form.append("sumber_dana_bantuan_id", $("#sumber-dana-bantuan").val());
            form.append("rencana_penanganan", '2021-12-03');

            Swal.fire({
                title: 'Konfirmasi Submit',
                showCloseButton: true,
                confirmButtonText: 'Lanjutkan',
                text: 'Pastikan Seluruh Data Telah Terisi',
                icon: 'info'
                }).
            then(function(result) {
                if (result.isConfirmed == true) {
                    $.ajax({
                        method: "POST",
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        url: "{{ $action }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: form,
                        success: function(result) {
                            window.location.replace("{{route('backend.usulan.index')}}")
                        },
                        error: function(error) {
                            alert("Maaf server sedang sibuk, cobalah beberapa saat lagi");
                        }
                    });
                } else {}
            })
        }
    });
</script>
@include('backend.usulan.sub-form.script-usulan')
@include('backend.hunian.sub-form.script-keluarga')
@include('backend.hunian.sub-form.script-lokasi')
