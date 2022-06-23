<script>
    let latitude = 0, longitude = 0

    const kecamatanSelect = $('#kecamatan').select2({
        tags: false
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
            })
    }

    kecamatanSelect.on('select2:select', function(e) {
        loadDesa(e.params.data.id)
    })

    loadDesa(kecamatanSelect.val())

    window.setLokasi = function(coordinates) {
        latitude = coordinates[1]
        longitude = coordinates[0]
        console.log(coordinates)
    }
</script>