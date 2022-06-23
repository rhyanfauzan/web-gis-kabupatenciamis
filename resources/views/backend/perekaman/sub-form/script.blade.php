<script>
    let halaman = 'hunian'
    var idHunian;

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

    const formHunian = $('#form-hunian'),
        formKeluarga = $('#form-keluarga'),
        formLokasi = $('#form-lokasi')

    const btnLanjutkan = $('#btn-lanjutkan')
    btnLanjutkan.on('click', function() {
        if (halaman === 'hunian') {
            formHunian.attr('style', 'display: none')
            formKeluarga.attr('style', 'display: block')
            halaman = 'keluarga'
        } else if (halaman === 'keluarga') {
            formKeluarga.attr('style', 'display: none')
            formLokasi.attr('style', 'display: block')
            btnLanjutkan.attr('style', 'display: none')
            btnSimpan.attr('style', 'display: block')
            halaman = 'lokasi'
            window.updateMap()
        }
    })

    $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "div",
        transitionEffect: "slideLeft",
        autoFocus: true,
        onFinished: function(event, currentIndex) {
            const luasBangunan = parseFloat($('#luas-bangunan').val())
            const jumlahKeluarga = parseFloat($('#jumlah-keluarga').val())
            const luasBangunanPerkapita = luasBangunan / jumlahKeluarga
            var hunian = {
                desa_id: $('#desa').val(),
                status_kepemilikan_id: $('#status-kepemilikan').val(),
                bentuk_bangunan_id: $('#bentuk-bangunan').val(),
                pendapatan_keluarga_id: $('#pendapatan-keluarga').val(),
                foto_hunian: fotoHunian,
                luas_tanah: $('#luas-tanah').val(),
                luas_bangunan: $('#luas-bangunan').val(),
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
                luas_bangunan_perkapita: luasBangunanPerkapita,
                sumber_dana_bantuan_id: $("#sumber-dana-bantuan").val(),
                rencana_tahun_penanganan: $('#rencana-tahun-penanganan').val(),
                foto_hunian_final: fotoHunianFinal,
                foto_mck_final: fotoMckFinal,
                nominal: $("#nominal").val(),
            }

            var postData = {
                data_hunian: hunian,
                sumber_dana_bantuan_id: $("#sumber-dana-bantuan").val(),
                rencana_tahun_penanganan: $('#rencana-tahun-penanganan').val(),
                foto_hunian: fotoHunianFinal,
                foto_mck: fotoMckFinal,
                nominal: $("#nominal").val(),
            }

            var form = new FormData();
            form.append("hunian", hunian);
            form.append("sumber_dana_bantuan_id", $("#sumber-dana-bantuan").val());
            form.append("rencana_tahun_penanganan", $('#rencana-tahun-penanganan').val());
            form.append("foto_hunian", fotoHunianFinal);
            form.append("foto_mck", fotoMckFinal);
            form.append("nominal", $("#nominal").val())

            console.log(hunian);

            Swal.fire({
                title: 'Konfirmasi Submit',
                showCloseButton: true,
                confirmButtonText: 'Lanjutkan',
                text: 'Pastikan Seluruh Data Telah Terisi',
                icon: 'info'
            }).
            then(function(result) {
                $.ajax({
                    method: "POST",
                    url: "{{ route('backend.hunian.insertFinal') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: hunian,
                    success: function(result) {
                        window.location.href = "{{ route('backend.perekaman.index') }}"
                    },
                    error: function(error) {
                        console.log(JSON.stringify(error))
                        alert(JSON.stringify(error));
                        // alert("Maaf server sedang sibuk, cobalah beberapa saat lagi");
                    }
                });
            })
        }
    });
</script>
@include('backend.perekaman.sub-form.script-perekaman')
@include('backend.perekaman.sub-form.script-keluarga')
@include('backend.perekaman.sub-form.script-lokasi')