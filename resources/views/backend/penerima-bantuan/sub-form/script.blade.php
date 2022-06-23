<script>
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
    var edit = editUrl.replace(':id', "{{ $id }}");
    console.log(edit);
    btnEditSimpan.on('click', function() {
        console.log($('#rencana-tahun-penanganan').val());
        console.log($('#nominal').val());
        try {
            $.ajax({
                    method: "POST",
                    url: `${edit}`,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        rencana_tahun_penanganan: $('#rencana-tahun-penanganan').val(),
                        nominal: $('#nominal').val(),
                    }
                })
                .done(function(result) {
                    if (result.success == false) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: `${result.message}`,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            },
                        })
                    }
                    console.log(result);
                    // if('{{Auth::user()->role}}' == 'admin')
                    window.location.href = "{{ route('backend.penerimaBantuan.index') }}"
                    // if('{{Auth::user()->role}}' == 'pihak-ketiga')
                    // window.location.href = "{{ route('backend.penerimaBantuan.index') }}"
                })
        } catch (error) {
            console.log(error.toString());
        }

    })


    const updateUrl = "{{ route('backend.penerimaBantuan.updateFoto', ['id' => ':id']) }}"
    var update = updateUrl.replace(':id', "{{ $id }}");
    const btnSimpan = $('#btn-simpan');

    btnSimpan.on('click', function() {
        console.log(update);
        console.log(fotoHunian);
        console.log(fotoMck);
        try {
            $.ajax({
                    method: "POST",
                    url: `${update}`,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        foto_rumah: fotoHunian,
                        foto_mck: fotoMck,
                    }
                })
                .done(function(result) {
                    console.log(result);
                    if ('{{Auth::user()->role}}' == 'admin')
                        window.location.href = "{{ route('backend.hasilPelaksanaan.index') }}"
                    if ('{{Auth::user()->role}}' == 'pihak-ketiga')
                        window.location.href = "{{ route('backend.hasilPelaksanaan.index') }}"
                })
        } catch (error) {
            console.log(error.toString());
        }

    })
</script>
@include('backend.penerima-bantuan.sub-form.script-detail-foto')