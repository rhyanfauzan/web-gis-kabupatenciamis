<script>
    let halaman = 'bencana'

    function getFileInputOptions(jenis) {
        return {
            'uploadUrl': '{{ route('backend.upload.do') }}',
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

    const formBencana = $('#form-bencana'),
        formLokasi = $('#form-lokasi')

    const btnLanjutkan = $('#btn-lanjutkan'),
        btnSimpan = $('#btn-simpan')
    btnLanjutkan.on('click', function() {
        if (halaman === 'bencana') {
            formBencana.attr('style', 'display: none')
            formLokasi.attr('style', 'display: block')
            halaman = 'lokasi'
            window.updateMap()
            btnLanjutkan.attr('style', 'display: none')
            btnSimpan.attr('style', 'display: block')
        }
    })

    btnSimpan.on('click', function() {
        var form = new FormData();

        form.append("id_kawasan", $("#id_kawasan").val());
        form.append("nama_area", $("#nama_area").val());
        form.append("estimasi_waktu_bencana", $("#estimasi_waktu").val());
        form.append("foto_lokasi", fotoAtap);
        form.append("bencana_id", $("#tipe_bencana").val());
        form.append("kecamatan_id", $("#kecamatan").val());
        form.append("desa_id", $("#desa").val());
        form.append("latitude", latitude);
        form.append("longitude", longitude);
        form.append("luas_area", $("#luas_area").val());
        form.append("jumlah_rumah_terdampak", $("#jumlah_rumah_terdampak").val());

        //Request Post
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
                        window.location.replace("{{route('backend.rawanBencana.index')}}")
                    },
                    error: function(error) {
                        alert("Maaf server sedang sibuk, cobalah beberapa saat lagi");
                    }
                });
            } else {}
        })
    })
</script>
@include('backend.rawan-bencana.sub-form.script-hunian')
@include('backend.rawan-bencana.sub-form.script-keluarga')
@include('backend.rawan-bencana.sub-form.script-lokasi')
