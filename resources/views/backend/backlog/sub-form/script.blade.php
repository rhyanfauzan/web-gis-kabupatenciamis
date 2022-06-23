<script>
    let halaman = 'hunian'
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

    $("#kebutuhan-rumah").on("input", function() {
        $("#backlog").val($("#jumlah-rumah").val() - this.value)
    });

    const btnSimpan = $('#btn-simpan')
    btnSimpan.on('click', function() {
        var form = new FormData();

        form.append("id", $("#id_backlog").val());
        form.append("kecamatan_id", $("#kecamatan").val());
        form.append("jumlah_kk", $("#jumlah-kk").val());
        form.append("jumlah_penduduk", $("#jumlah-penduduk").val());
        form.append("jumlah_rumah", $("#jumlah-rumah").val());
        form.append("kebutuhan_rumah", $("#kebutuhan-rumah").val());
        form.append("tgl", $("#tgl").val());
        form.append("backlog", $("#backlog").val());

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
                        window.location.replace("{{route('backend.backlog.index')}}")
                    },
                    error: function(error) {
                        alert("Maaf server sedang sibuk, cobalah beberapa saat lagi");
                    }
                });
            } else {}
        })
    })
</script>
@include('backend.backlog.sub-form.script-backlog')
