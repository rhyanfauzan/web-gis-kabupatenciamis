<script>
    let halaman = 'perumahan'
    function getFileInputOptions(jenis)
    {
        return {
            'uploadUrl': "{{ route('backend.upload.do') }}",
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

    const formPerumahan = $('#form-perumahan'), formLokasi = $('#form-lokasi')

    const btnLanjutkan = $('#btn-lanjutkan'), btnSimpan = $('#btn-simpan'), btnSimpanEdit = $('#btn-simpan-edit');
    btnLanjutkan.on('click', function ()
    {
        if (halaman === 'perumahan')
        {
            formPerumahan.attr('style', 'display: none')
            formLokasi.attr('style', 'display: block')
            btnLanjutkan.attr('style', 'display: none')
            btnSimpan.attr('style', 'display: block')
            btnSimpanEdit.attr('style', 'display: block')
            halaman = 'lokasi'
            window.updateMap()
        } 
    })
    var editUrl = "{{ route('backend.perumahan.update', ['id' => ':id']) }}"
    @isset($item)
    var edit = editUrl.replace(':id', "{{$item->id}}");
    btnSimpanEdit.on('click', function (){
        try {
            $.ajax({
            method: "POST",
            url: edit,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                nama_perum: $('#nama_perum').val(),
                no_imb: $('#no_imb').val(),
                tgl_imb: $('#tgl_imb').val(),
                tahun: $('#tahun').val(),
                pengembang: $('#pengembang').val(),
                perusahaan: $('#perusahaan').val(),
                almt_perusahaan: $('almt_perusahaan').val(),
                jml_rmh_komersil: $('jml_rmh_komersil').val(),
                jml_rmh_mbr: $('jml_rmh_mbr').val(),
                longitude: longitude,
                latitude: latitude,
            }
        })
            .done(function (msg) {
                window.location.href = "{{ route('backend.perumahan.index') }}"
                // if('{{Auth::user()->role}}' == 'admin')
                // if('{{Auth::user()->role}}' == 'pihak-ketiga')
                // window.location.href = '{{ route('backend.usulan.index') }}'
            })
        } catch (error) {
            console.log(error.toString());
        }
        
    })
    @endisset
    btnSimpan.on('click', function (){
        try {
            $.ajax({
            method: "POST",
            url: "{{ route('backend.perumahan.insert') }}",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                nama_perum: $('#nama_perum').val(),
                no_imb: $('#no_imb').val(),
                tgl_imb: $('#tgl_imb').val(),
                tahun: $('#tahun').val(),
                pengembang: $('#pengembang').val(),
                perusahaan: $('#perusahaan').val(),
                almt_perusahaan: $('almt_perusahaan').val(),
                jml_rmh_komersil: $('jml_rmh_komersil').val(),
                jml_rmh_mbr: $('jml_rmh_mbr').val(),
                longitude: longitude,
                latitude: latitude,
            }
        })
            .done(function (msg) {
                window.location.href = "{{ route('backend.perumahan.index') }}"
                // if('{{Auth::user()->role}}' == 'admin')
                // if('{{Auth::user()->role}}' == 'pihak-ketiga')
                // window.location.href = '{{ route('backend.usulan.index') }}'
            })
        } catch (error) {
            console.log(error.toString());
        }
        
    })
</script>
@include('backend.perumahan.sub-form.script-perumahan')
@include('backend.perumahan.sub-form.script-lokasi')
