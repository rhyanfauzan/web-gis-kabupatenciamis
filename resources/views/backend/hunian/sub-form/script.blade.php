<script>
    let halaman = 'hunian'
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
        var subJudul = "{{ $subjudul }}"
        if(subJudul == 'Tambah')
        {
            try {
            $.ajax({
            method: "POST",
            url: "{{ route('backend.hunian.insert') }}",
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
                tersedia_listrik: $('input[name=tersedia_listrik]:checked').val(),
                dibangun_oleh_pengembang: $('input[name=dibangun_oleh_pengembang]:checked').val(),
                memiliki_imb: $('input[name=memiliki_imb]:checked').val(),
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
                septic_tank: $('input[name=septic_tank]:checked').val(),
                luas_bangunan_perkapita: $('#luas-bangunan-perkapita').val(),

            }
        })
            .done(function (msg) {
                window.location.href = "{{ route('backend.hunian.index') }}"
                // if('{{Auth::user()->role}}' == 'admin')
                // if('{{Auth::user()->role}}' == 'pihak-ketiga')
                // window.location.href = '{{ route('backend.usulan.index') }}'
            })
        } catch (error) {
            console.log(error.toString());
        }
        }
        else
        {
            var updateUrl = "{{ route('backend.hunian.update', ['id' => ':id']) }}"
            var update = updateUrl.replace(':id', "{{ $item->id ?? ':id' }}");

            var body = {
                desa_id: $('#desa').val(),
                status_kepemilikan_id: $('#status-kepemilikan').val(),
                bentuk_bangunan_id: $('#bentuk-bangunan').val(),
                pendapatan_keluarga_id: $('#pendapatan-keluarga').val(),
                // foto_hunian: fotoHunian,
                luas_tanah: $('#luas-tanah').val(),
                luas_bangunan: $('#luas-bangunan').val(),
                tersedia_listrik: $('input[name=tersedia_listrik]').val(),
                dibangun_oleh_pengembang: $('input[name=dibangun_oleh_pengembang]').val(),
                memiliki_imb: $('input[name=memiliki_imb]').val(),
                nama_pengembang: $('#nama-pengembang').val(),
                nomor_imb: $('#nomor-imb').val(),
                // foto_pemilik: fotoPemilik,
                nama_pemilik: $('#nama-pemilik').val(),
                nik_pemilik: $('#nik-pemilik').val(),
                no_kk_pemilik: $('#no-kk-pemilik').val(),
                tanggal_lahir_pemilik: $('#tanggal-lahir').val(),
                no_telepon_pemilik: $('#no-telepon-pemilik').val(),
                email_pemilik: $('#email-pemilik').val(),
                jumlah_keluarga: $('#jumlah-keluarga').val(),
                alamat_detail: $('#alamat-detail').val(),
                // latitude: latitude,
                // longitude: longitude,
                // kondisi_atap: fotoAtap,
                // kondisi_dinding: fotoDinding,
                // kondisi_lantai: fotoLantai,
                // kondisi_kamar_mandi: fotoKamarMandi,
                // kondisi_mck: fotoMck,
                // kondisi_sumber_air_minum: fotoSumberAirMinum,
                septic_tank: $('input[name=septic_tank]').val(),
                luas_bangunan_perkapita: $('#luas-bangunan-perkapita').val(),
            }

            if(fotoHunian != '')
            {
                body.foto_hunian = fotoHunian
            }
            if(fotoPemilik != '')
            {
                body.foto_pemilik = fotoPemilik
            }
            if(latitude != '')
            {
                body.latitude = latitude
            }
            if(longitude != '')
            {
                body.longitude = longitude
            }
            if(fotoAtap != '')
            {
                body.kondisi_atap = fotoAtap
            }
            if(fotoDinding != '')
            {
                body.kondisi_dinding = fotoDinding
            }
            if(fotoKamarMandi != '')
            {
                body.kondisi_kamar_mandi = fotoKamarMandi
            }
            if(fotoLantai != '')
            {
                body.kondisi_lantai = fotoLantai
            }
            if(fotoMck != '')
            {
                body.kondisi_mck = fotoMck
            }
            if(fotoSumberAirMinum != '')
            {
                body.kondisi_sumber_air_minum = fotoSumberAirMinum
            }


            try {
            $.ajax({
            method: "POST",
            url: update,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: body
            })
            .done(function (msg) {
                window.location.href = "{{ route('backend.hunian.index') }}"
                // if('{{Auth::user()->role}}' == 'admin')
                // if('{{Auth::user()->role}}' == 'pihak-ketiga')
                // window.location.href = '{{ route('backend.usulan.index') }}'
            })
        } catch (error) {
            console.log(error.toString());
        }
        }
        
        
    })

    function loadDesa(id, desa_id)
    {
        $.get('{{ route('backend.desa.all', ['kecamatan_id' => ':kecamatan_id']) }}'.replace(':kecamatan_id', id))
            .done(function (response) {
                const options = [];
                let i
                for (i = 0; i < response.length; i++)
                {
                    const item = response[i]
                    options.push({
                        id: item.id,
                        text: item.nama
                    })
                }
                $('#desa').html('')
                $('#desa').select2({
                    data: options
                })
                $('#desa').val(desa_id);
                $('#desa').trigger('change');
            })
    }
</script>
@include('backend.hunian.sub-form.script-hunian')
@include('backend.hunian.sub-form.script-keluarga')
@include('backend.hunian.sub-form.script-lokasi')
