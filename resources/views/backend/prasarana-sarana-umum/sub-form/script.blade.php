<script>
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

    const wizard = $("#wizard_horizontal").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        next: "Selanjutnya",
        previous: "Sebelumnya",
        finish: "Simpan",
        onInit: function (event, currentIndex) {
            setButtonWavesEffect(event);
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            setButtonWavesEffect(event);
            if (currentIndex === 0)
            {
                window.updateMap()
            }
        },
        onFinished: function (event, currentIndex) {
            const data = {
                kecamatan_id: $('#kecamatan').val(),
                desa_id: $('#desa').val(),
                nama: $('#nama').val(),
                keterangan: $('#keterangan').val(),
                latitude: latitude,
                longitude: longitude,
                fotoPrasaranas: fotoprasaranas,
                fotoSaranas: fotosaranas,
                fotoUtilitases: fotoutilitass,
            }
            Swal.fire({
            title: 'Pastikan data sudah diisi sesuai dengan yang diinginkan',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: `Kembali`,
        }).then( async (result) => {
            if(result.isConfirmed)
            {
                $.ajax({
                method: "POST",
                url: "{{ $action }}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: data
                })
                .done(function (msg) {
                    window.location.href = "{{ route('backend.prasaranaSaranaUmum.index') }}"
                });
            }
        });
        }
    });

    function setButtonWavesEffect(event) {
        $(event.currentTarget).find('[role="menu"] li a').removeClass("waves-effect");
        $(event.currentTarget)
            .find('[role="menu"] li:not(.disabled) a')
            .addClass("waves-effect");
    }
</script>
@include('backend.prasarana-sarana-umum.sub-form.script-lokasi')
@include('backend.prasarana-sarana-umum.sub-form.script-foto', ['jenis' => 'prasarana',  'jenisFotos' => ['Jaringan Jalan','Saluran Pembuangan Air Limbah','Drainase','TPS']])
@include('backend.prasarana-sarana-umum.sub-form.script-foto', ['jenis' => 'sarana', 'jenisFotos' => ['Ibadah', 'Perniagaan', 'Pelayanan Umum dan Pemerintahan', 'Pendidikan', 'Kesehatan', 'Rekreasi dan Olahraga', 'Pemakaman', 'Pertamanan dan RTH', 'Parkir', 'Persampahan']])
@include('backend.prasarana-sarana-umum.sub-form.script-foto', ['jenis' => 'utilitas', 'jenisFotos' => ['Air bersih','Listrik','Telepon','Gas', 'Transportasi', 'Pemadam Kebakaran', 'Sarana Penerangan Jalan Umum']])
