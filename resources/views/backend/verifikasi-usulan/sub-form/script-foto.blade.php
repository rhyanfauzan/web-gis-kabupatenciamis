<script>
    const tableFoto = $('#table-foto').DataTable({
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
    const jenisFotoUsulanSelect = $('#jenis-foto-usulan').select2({
        tags: false
    })
    let fotoUsulans = []

    $("#file-foto-usulan").fileinput(getFileInputOptions('foto-usulan'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            const foto = `{{ asset('') }}${previewId.response.filename}`
            const data = $('#jenis-foto-usulan').find(':selected').data()
            const keterangan = $('#keterangan-foto-usulan').val()
            addRow(
                fotoUsulans.length,
                data.data.text,
                foto,
                keterangan)
            fotoUsulans.push({
                jenis_foto_usulan_id: data.data.id,
                jenis_foto_usulan_nama: data.data.text,
                foto: foto,
                keterangan: keterangan
            })
            $('#file-foto-usulan').fileinput('clear');
            $('#keterangan-foto-usulan').val('')
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        })

    function addRow(index, jenis_foto_usulan_nama, foto, keterangan)
    {
        const item = [index + 1, `<div class="gallery gallery-fw"><div class="gallery-item" data-image="${foto}" data-title="${keterangan}"></div></div>`,
            jenis_foto_usulan_nama, keterangan, `<a href='#' class='btn btn-danger' onclick="del(${index})">Hapus</a>`]
        tableFoto.rows.add([item]).draw()
    }

    function del(index)
    {
        fotoUsulans.splice(index, 1)
        refreshTable()
    }

    function refreshTable()
    {
        tableFoto.clear().draw()
        let i
        for (i = 0; i < bantuans.length; i++)
        {
            const fotoUsulan = fotoUsulans[i]

            addRow(
                i,
                fotoUsulan.jenis_foto_usulan_nama,
                fotoUsulan.foto,
                fotoUsulan.keterangan)
        }
    }

</script>
