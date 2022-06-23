<script>
    let fotoPemilik = ''
    $("#file-foto-pemilik").fileinput(getFileInputOptions('foto-pemilik'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoPemilik = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-pemilik").fileinput('upload')
    })

    $('#pendapatan-keluarga').select2({
        tags: false
    })

    $('#jumlah-keluarga').on('keyup', function () {
        const luasBangunan = parseFloat($('#luas-bangunan').val())
        const jumlahKeluarga = parseFloat($(this).val())
        const luasBangunanPerkapita = luasBangunan / jumlahKeluarga
        $('#luas-bangunan-perkapita').val(luasBangunanPerkapita)
    })
</script>
