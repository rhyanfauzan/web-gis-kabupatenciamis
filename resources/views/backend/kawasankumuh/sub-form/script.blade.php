<script>
    let halaman = 'hunian'

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

    const btnSimpan = $('#btn-simpan')
    btnSimpan.on('click', function() {
        var form = new FormData();
        // var arr2 = new Array(arr);
        // var jsonstring = JSON.stringify(arr2);

        form.append("id_kawasan_kumuh", $("#id_kawasan_kumuh").val());
        form.append("nama_area", $("#nama_area").val());
        form.append("foto_lokasi", fotoKumuh);
        // form.append("koordinat");
        // form.append("jenis_koordinat", 'Polygon');
        form.append("kecamatan_id", $("#kecamatan").val());
        form.append("desa_id", $("#desa").val());
        form.append("luas_area", $("#luas_area").val());
        // form.append("longitude", longitude);
        // form.append("latitude", longitude);

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
                        window.location.replace("{{route('backend.kawasankumuh.index')}}")
                    },
                    error: function(error) {
                        alert("Maaf server sedang sibuk, cobalah beberapa saat lagi");
                    }
                });
            } else {}
        })
    })
</script>
@include('backend.kawasankumuh.sub-form.script-kawasankumuh')
@include('backend.kawasankumuh.sub-form.script-lokasi')
