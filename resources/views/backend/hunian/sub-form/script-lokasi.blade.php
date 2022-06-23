<script>
    let latitude = 0, longitude = 0
    
    const kecamatanSelect = $('#kecamatan').select2({
        tags: false,
    })

    const desaSelect = $('#desa').select2({
        tags: false
    })

    function loadDesa(id)
    {
        $.get("{{ route('backend.desa.all', ['kecamatan_id' => ':kecamatan_id']) }}".replace(':kecamatan_id', id))
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
                desaSelect.html('')
                desaSelect.select2({
                    data: options
                })
                @isset($subjudul)
                var subJudul = "{{$subjudul}}"
                @isset($item)
                if(subJudul != 'Tambah')
                {
                var desa_id = "{{$item->desa_id}}"
                desaSelect.val(desa_id)
                desaSelect.trigger('change');
                }
                @endisset
                @endisset
            })
    }

    kecamatanSelect.on('select2:select', function (e) {
        loadDesa(e.params.data.id)
    })
    @isset($subjudul)
    var subJudul = "{{ $subjudul }}"
    @isset($item)
    if(subJudul != 'Tambah')
    {
        var kecamatan_id = "{{$item->desa->kecamatan_id}}"
        kecamatanSelect.val(kecamatan_id)
        kecamatanSelect.trigger('change');
        loadDesa(kecamatanSelect.val());
    }
    else {
        loadDesa(kecamatanSelect.val())
    }
    @endisset
    @endisset
    loadDesa(kecamatanSelect.val())

    window.setLokasi = function (coordinates)
    {
        latitude = coordinates[1]
        longitude = coordinates[0]
        console.log(coordinates)
    }
    
</script>
