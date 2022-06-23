<script>
    const tableFoto{{ $jenis }} = $('#table-foto-{{ $jenis }}').DataTable({
        'drawCallback': function (settings) {
            $(".gallery .gallery-item").each(function () {
                const me = $(this)

                me.attr("href", me.data("image"))
                me.attr("title", me.data("title"))
                if (me.parent().hasClass("gallery-fw")) {
                    me.css({
                        height: me.parent().data("item-height"),
                    })
                    me.find("div").css({
                        lineHeight: me.parent().data("item-height") + "px",
                    })
                }
                me.css({
                    backgroundImage: 'url("' + me.data("image") + '")'
                })
            })
            $(".gallery").Chocolat({
                className: "gallery",
                imageSelector: ".gallery-item",
            })
        }
    })
    const jenisFoto{{ $jenis }}Select = $('#jenis-foto-{{ $jenis }}').select2({
        tags: false
    })
    let foto{{ $jenis }}s = []

    $("#file-foto-{{ $jenis }}").fileinput(getFileInputOptions('foto-psu'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            const foto = `{{ asset('') }}${previewId.response.filename}`
            const data = $('#jenis-foto-{{ $jenis }}').find(':selected').data()
            const keterangan = $('#keterangan-foto-{{ $jenis }}').val()
            addRow{{ $jenis }}(
                foto{{ $jenis }}s.length,
                data.data.text,
                foto,
                keterangan)
            foto{{ $jenis }}s.push({
                jenis: data.data.id,
                foto: foto,
                keterangan: keterangan
            })
            $('#file-foto-{{ $jenis }}').fileinput('clear');
            $('#keterangan-foto-{{ $jenis }}').val('')
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    })

    function addRow{{ $jenis }}(index, jenis, foto, keterangan)
    {
        const item = [index + 1, `<div class="gallery gallery-fw"><div class="gallery-item" data-image="${foto}" data-title="${keterangan}"></div></div>`,
            jenis, keterangan, `<a href='#' class='btn btn-danger' onclick="del{{ $jenis }}(${index})">Hapus</a>`]
        tableFoto{{ $jenis }}.rows.add([item]).draw()
    }

    function del{{ $jenis }}(index)
    {
        console.log(index)
        if (foto{{ $jenis }}s[index].hasOwnProperty('id'))
        {
            foto{{ $jenis }}s[index].foto = ''
        } else
        {
            foto{{ $jenis }}s.splice(index, 1)
        }

        refreshTable{{ $jenis }}()
    }

    function refreshTable{{ $jenis }}()
    {
        tableFoto{{ $jenis }}.clear().draw()
        let i
        for (i = 0; i < foto{{ $jenis }}s.length; i++)
        {
            const fotoUsulan = foto{{ $jenis }}s[i]
            let valid = true
            if (fotoUsulan.hasOwnProperty('id'))
            {
                valid = fotoUsulan.foto !== ''
            }
            if (valid)
            {
                addRow{{ $jenis }}(
                    i,
                    fotoUsulan.jenis,
                    fotoUsulan.foto,
                    fotoUsulan.keterangan)
            }

        }
    }

    @isset($item)
        @foreach($item->fotoPrasaranaSaranaUmums as $fotoPrasaranaSaranaUmum)
            @if (in_array($fotoPrasaranaSaranaUmum->jenis, $jenisFotos))
    addRow{{ $jenis }}(
        foto{{ $jenis }}s.length,
        "{{ $fotoPrasaranaSaranaUmum->jenis }}",
        "{{ $fotoPrasaranaSaranaUmum->foto }}",
        "{{ $fotoPrasaranaSaranaUmum->keterangan }}",)
    foto{{ $jenis }}s.push({
        id: {{ $fotoPrasaranaSaranaUmum->id }},
        jenis: "{{ $fotoPrasaranaSaranaUmum->jenis }}",
        foto: "{{ $fotoPrasaranaSaranaUmum->foto }}",
        keterangan: "{{ $fotoPrasaranaSaranaUmum->keterangan }}"
    })
            @endif
        @endforeach
    @endisset
</script>
